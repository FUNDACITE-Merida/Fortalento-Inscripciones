<?php

namespace app\controllers;

use Yii;
use app\models\Inscripciones;
use app\models\InscripcionesSearch;
use app\models\MunicipiosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

use app\models\Estudiantes;
use app\models\Procesos;
use app\models\Municipios;
use app\models\Plantel;
use app\models\NseProfesionJefeFamilia;
use app\models\NseNivelDeLaMadre;
use app\models\NseFuenteDeIngreso;
use app\models\NseAlojamientoYVivienda;
use app\models\NseIngresoFamiliar;
use app\models\NseGrupoFamiliar;

use app\filters\ProcesoCerrado;
use app\filters\InscripcionCerrada;


/**
 * InscripcionesController implements the CRUD actions for Inscripciones model.
 */
class InscripcionesController extends Controller
{
	public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'proceso' => [
                'class' => ProcesoCerrado::className(),
                'denyActions' => ['inscripciones/create', 'inscripciones/view'],
                'returnPath' => '/procesos/proceso-cerrado',
            ],
            'inscripcion' => [
                'class' => InscripcionCerrada::className(),
                'denyActions' => ['inscripciones/create'],
                'returnPath' => '/inscripciones/inscripcion-cerrada',
            ],
        ];
    }

    /**
     * Lists all Inscripciones models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InscripcionesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Inscripciones model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Crea o actualiza un modelo Inscripcion
     * Si la creación o actualización es correcta se redirecciona a 
     * la creación o actualización del estudio socio económico.
     * @return mixed
     */
    public function actionCreate()
    {
		/*
		 * Verifica que el usuario actual ya haya llenado sus datos de estudiante, de lo contrario 
		 * lo redirige hacia esa acción 
		 */
		if (!($estudiante = Estudiantes::getEstudianteUser()))
        {
			return $this->redirect(['/estudiantes/create']);
		}
		
		/*
		 * TODO: 1.- se debe cargar la información del estudiante en el proceso actual -> Listo
		 * 2.- se debe restringir el acceso si ya la inscripción fue verificada en FUNDACITE
		 */
		if (!($model = $estudiante->getInscripcion()))
        {
			$model = new Inscripciones();
			$model->id_estudiante = $estudiante->id;
			$model->id_proceso =  Procesos::getIdProcesoAbierto();
			$model->fecha_inscripcion = Yii::$app->formatter->asDate('now');
			
			// Buscar todos los municipios excepto los que están en la claúsula 
			// where, se usó para sacar del listado los municipios que tuvieron
			// inscripciones manuales
			/*
			$municipios = Municipios::find()
									->where(['not',['cod_municipio' => '04']])
									->andWhere(['not',['cod_municipio' => '05']])
									->andWhere(['not',['cod_municipio' => '08']])
									->andWhere(['not',['cod_municipio' => '09']])
									->andWhere(['not',['cod_municipio' => '10']])
									->andWhere(['not',['cod_municipio' => '11']])
									->andWhere(['not',['cod_municipio' => '15']])
									->andWhere(['not',['cod_municipio' => '22']])
									->all();*/
			$municipios = Municipios::find()->all();
			$planteles = array();
			$cod_municipio = null;			
		}else
		{
			// Buscar todos los municipios excepto los que están en la claúsula 
			// where, se usó para sacar del listado los municipios que tuvieron
			// inscripciones manuales
			/*$municipios = Municipios::find()
									->where(['not',['cod_municipio' => '04']])
									->andWhere(['not',['cod_municipio' => '05']])
									->andWhere(['not',['cod_municipio' => '08']])
									->andWhere(['not',['cod_municipio' => '09']])
									->andWhere(['not',['cod_municipio' => '10']])
									->andWhere(['not',['cod_municipio' => '11']])
									->andWhere(['not',['cod_municipio' => '15']])
									->andWhere(['not',['cod_municipio' => '22']])
									->all();*/
			$municipios = Municipios::find()->all();
									
			$plantel = Plantel::findOne(['cod_pla' => $model->codigo_plantel]);
			$cod_municipio = $plantel->cod_municipio;
			$planteles = Plantel::find()
							->where(['cod_municipio' => $cod_municipio])
							->orderBy('cod_pla')
							->all();		
		}
		
		/* 
		 * TODO: 1.- Antes de guardar se debe setear en el modelo el campo fecha_inscripcion
		 * con la fecha actual. (Esto ya está arreglado con la impresión de la fecha en el formulario
		 * usando un campo no relacionado con la base de datos)
		 * 
		 */ 
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			Yii::info("Pimpoyo => ". $model->postulado_para_premio . " -- ". $model->postulado_para_beca);
            return $this->redirect(['/estudio-socio-economico/create']);
        } else {
			$profesionJefeFamilia = NseProfesionJefeFamilia::find()->all();
			$nivelInstruccionMadre = NseNivelDeLaMadre::find()->all();
			$fuenteIngreso = NseFuenteDeIngreso::find()->all();
			$alojamientoVivienda = NseAlojamientoYVivienda::find()->all();
			$ingresoFamiliar = NseIngresoFamiliar::find()
									->where(['cod_proceso' => Procesos::getCodigoProcesoAbierto()]) // Se debe colocar esto Procesos::getCodigoProcesoAbierto()
									->orderBy('cod_ing_fam')
									->all();
			$grupoFamiliar = NseGrupoFamiliar::find()->all();
			
            return $this->render('create', [
                'model' => $model,
                'municipios' => $municipios,
                'planteles' => $planteles,
                'cod_municipio' => $cod_municipio,
                'profesionJefeFamilia' => $profesionJefeFamilia,
                'nivelInstruccionMadre' => $nivelInstruccionMadre,
                'fuenteIngreso' => $fuenteIngreso,
                'alojamientoVivienda' => $alojamientoVivienda,
                'ingresoFamiliar' => $ingresoFamiliar,
                'grupoFamiliar' => $grupoFamiliar,
            ]);
        }
		
		/*
        $model = new Inscripciones();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }*/
    }

    /**
     * Updates an existing Inscripciones model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Inscripciones model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    /**
     * Muestra un reporte consolidado de las inscripciones en general.
     * @return mixed
     */
    public function actionConsolidado()
    {
		$totalModel['tEstudiantesInscritos'] = Inscripciones::find()->count();
        $totalModel['tInscripcionesCerradas'] = Inscripciones::find()
													->where(['cerrada' => true])
													->count();
        $totalModel['tInscripcionesAbiertas'] = Inscripciones::find()
													->where(['cerrada' => false])
													->count();
		$data =  Inscripciones::getConsolidadoMunicipios();

        return $this->render('consolidado', [
            'totalModel' => $totalModel,
            'data' => $data,
        ]);
    }
    
    /**
     * Obtiene una lista de planteles según el municipio.
     * Este es un action usado vía ajax
     * @return mixed
     */
    public function actionGetPlanteles()
    {
        if (Yii::$app->request->isAjax)
		{
            if (Yii::$app->request->isPost)
            {
				
				$jsondata = trim(file_get_contents('php://input'));
				//$jsondata = Yii::$app->request->post();
				$s = json_decode($jsondata);
				$planteles = Plantel::find()
							->where(['cod_municipio' => $s->id_municipio])
							->orderBy('cod_pla')
							->all();
                
                $option = sprintf("<option value=''>-- Seleccione --</option>");
                foreach($planteles as $plantel)
                {
					$option .= sprintf("<option value='%d'>%s</option>", $plantel->cod_pla, $plantel->nom_pla);
					
				}
			}
		}
		echo $option;
    }

    /**
     * Finds the Inscripciones model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Inscripciones the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Inscripciones::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * Cierra la inscripción y redirije hacía la impresión de ésta.
     * @return mixed
     */
    public function actionCerrarEImprimir()
    {
        if (!($estudiante = Estudiantes::getEstudianteUser()))
        {
			return $this->redirect(['/estudiantes/create']);
		}
		
		if (!($inscripcion = $estudiante->getInscripcion()))
        {
			return $this->redirect(['/inscripciones/create']);
		}
		
		if (!($estudioSE = $estudiante->getEstudioSocioEconomico()))
        {
			return $this->redirect(['/estudio-socio-economico/create']);
		}
		
		$id_proceso = Procesos::getIdProcesoAbierto();
		$inscripcion->cerrada = true;
		if ($inscripcion->save()) {
			return $this->render('inscripcionFinalizada', [
                'id_proceso' => $id_proceso,
            ]);
        }		
    }
    
    /**
     * Muestra la página de mensaje de inscripción cerrada.
     * @return mixed
     */
    public function actionInscripcionCerrada()
    {
        if (!($estudiante = Estudiantes::getEstudianteUser()))
        {
			return $this->redirect(['/estudiantes/create']);
		}
		
		if (!($inscripcion = $estudiante->getInscripcion()))
        {
			return $this->redirect(['/inscripciones/create']);
		}
		
		
		if ($inscripcion->estatusInscripcion()) {
			return $this->render('inscripcion_cerrada');
        }		
    }
    
    /**
     * Muestra todas las inscripciones con la opción de abrir o cerrar cualquiera.
     * @return mixed
     */
    public function actionAbrirCerrarLista()
    {
        $searchModel = new InscripcionesSearch();
        $parametros = Yii::$app->request->queryParams;
        $parametros['InscripcionesSearch']['id_proceso'] = Procesos::getidProcesoAbierto();
        $dataProvider = $searchModel->search($parametros);

        return $this->render('abrirCerrarLista', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Abre o cierra una inscripción dependiendo del estatus que tenía.
     * @return mixed
     */
    public function actionAbrirCerrar($id)
    {
		/*print_r(Yii::$app->request->post());
		exit(0);*/
        $model = $this->findModel($id);
        $model->cerrada ? $model->cerrada = false :  $model->cerrada = true;

        if ($model->save()) {
            return $this->redirect(['abrir-cerrar-lista']);
        }
    }
    
    /**
     * Generar un archivo csv de los alumnos inscritos en el municipio
     * pasado como parámetro
     * @param id_municipio
     * @return mixed
     */
    public function actionImprimirCsv($cod_municipio)
    {
		$simbolos = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', '\''=>' ' );
        $model = Municipios::find()
			->with('plantels.inscripciones')
			->where(['cod_municipio'=>$cod_municipio])
			->all();
		$archivo = null;
		foreach ($model[0]->plantels as $plantel)
		{
			foreach ($plantel->inscripciones as $inscripcion)
			{
				// Solo se imprimen inscripciones que estén cerradas
				if ($inscripcion->cerrada)
				{
					$archivo .= str_pad(strval($inscripcion->id), 5, '0', STR_PAD_LEFT);
					$archivo .= $inscripcion->idEstudiante->es_venezolano?'V':'E';
					// Si la cédula es menor a 8 caracteres se completa con espacios a la derecha
					$archivo .= str_pad(trim($inscripcion->idEstudiante->cedula), 8, ' ',  STR_PAD_RIGHT);
					//Si el apellido es menor a 14 caracteres se completa con espacios a la derecha
					$archivo .= substr(str_pad(strtoupper(strtr(trim($inscripcion->idEstudiante->apellido), $simbolos)), 14, ' ',STR_PAD_RIGHT), 0, 14);
					//Si el nombre es menor a 14 caracteres se completa con espacios a la derecha
					$archivo .= substr(str_pad(strtoupper(strtr(trim($inscripcion->idEstudiante->nombre), $simbolos)),14, ' ',STR_PAD_RIGHT), 0, 14);
					
					list($d,$m,$Y) = explode("-",$inscripcion->idEstudiante->fecha_nacimiento);
					$archivo .= $d.$m.substr($Y, 2, 3);
					
					list($d,$m,$Y) = explode("-",$inscripcion->fecha_inscripcion);
					$archivo .= $d.$m.substr($Y, 2, 3);
					
					$archivo .= $model[0]->cod_municipio;
					$archivo .= $plantel->cod_pla;
					
					// En el sistema de FORTALENTO se lee 10=1, 11=2, 12=3
					// por lo tanto se debe cambiar acá el valor a imprimir
					$codigo_ultimo_grado = $inscripcion->codigo_ultimo_grado;
					if ($inscripcion->codigo_ultimo_grado == 10)
					{
						$codigo_ultimo_grado = 1;
					}elseif($inscripcion->codigo_ultimo_grado == 11)
					{
						$codigo_ultimo_grado = 2;
					}elseif($inscripcion->codigo_ultimo_grado == 12)
					{
						$codigo_ultimo_grado = 3;
					}
					/**/
					
					// Se imprimen algunos datos dependiendo de si el estudiante se postuló para beca
					// o para premio
					if ($inscripcion->postulado_para_beca && $inscripcion->postulado_para_premio)
					{
						// Se imprimen las tres notas
						$archivo .= str_pad(str_replace(",", "", strval($inscripcion->nota1)), 5, '0',STR_PAD_RIGHT);
						$archivo .= str_pad(str_replace(",", "", strval($inscripcion->nota2)), 5, '0',STR_PAD_RIGHT);
						$archivo .= str_pad(str_replace(",", "", strval($inscripcion->nota3)), 5, '0',STR_PAD_RIGHT);						
						$archivo .= $codigo_ultimo_grado;
						$archivo .= "*";
					}elseif($inscripcion->postulado_para_beca)
					{
						// Se imprime el promedio ya que el estudiante no habrá cargado nota3 si sólo se postuló por Beca
						$archivo .= str_pad(str_replace(",", "", strval($inscripcion->promedio)), 5, '0',STR_PAD_RIGHT);
						$archivo .= "          ";
						$archivo .= $codigo_ultimo_grado;
						$archivo .= "B";
					}elseif($inscripcion->postulado_para_premio)
					{
						// Se imprimen las tres notas
						$archivo .= str_pad(str_replace(",", "", strval($inscripcion->nota1)), 5, '0',STR_PAD_RIGHT);
						$archivo .= str_pad(str_replace(",", "", strval($inscripcion->nota2)), 5, '0',STR_PAD_RIGHT);
						$archivo .= str_pad(str_replace(",", "", strval($inscripcion->nota3)), 5, '0',STR_PAD_RIGHT);
						$archivo .= $codigo_ultimo_grado;
						$archivo .= "P";
					}
					$archivo .= $plantel->tip_pla;
					$archivo .= $inscripcion->idEstudiante->genero;
					
					$archivo .= $inscripcion->codigo_profesion_jefe_familia;
					$archivo .= $inscripcion->codigo_nivel_instruccion_madre;
					$archivo .= $inscripcion->codigo_fuente_ingreso_familia;
					$archivo .= $inscripcion->codigo_vivienda_familia;
					$archivo .= $inscripcion->codigo_ingreso_familia;
					$archivo .= $inscripcion->codigo_grupo_familiar;
					
					$archivo .= "\n";
				}
			}
		}
        header("Cache-Control: public");
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=".str_replace(" ", "_", $model[0]->municipio).".dat");
		header("Content-Type: application/octet-stream");
		header("Content-Transfer-Encoding: binary");
		if ($archivo)
		{
			print_r($archivo);
		}else
		{
			echo "No hay información para mostrar";
		}
    }
    
    /*
     * Muestra un listado de Municipios con la opción de imprimir todas las
     * inscripciones en un archivo .csv 
     * @param id_municipio
     * @return mixed
     */
    public function actionListadoMunicipiosCsv()
    {
		$model = Municipios::find()->all();

        return $this->render('listadoMunicipioCsv', [
            'model' => $model,
        ]);
		
	}
    
}

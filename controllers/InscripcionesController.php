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
			
			$municipios = Municipios::find()
									->where(['not',['cod_municipio' => '04']])
									->andWhere(['not',['cod_municipio' => '05']])
									->andWhere(['not',['cod_municipio' => '08']])
									->andWhere(['not',['cod_municipio' => '09']])
									->andWhere(['not',['cod_municipio' => '10']])
									->andWhere(['not',['cod_municipio' => '11']])
									->andWhere(['not',['cod_municipio' => '15']])
									->andWhere(['not',['cod_municipio' => '22']])
									->all();
			$planteles = array();
			$cod_municipio = null;			
		}else
		{
			$municipios = Municipios::find()
									->where(['not',['cod_municipio' => '04']])
									->andWhere(['not',['cod_municipio' => '05']])
									->andWhere(['not',['cod_municipio' => '08']])
									->andWhere(['not',['cod_municipio' => '09']])
									->andWhere(['not',['cod_municipio' => '10']])
									->andWhere(['not',['cod_municipio' => '11']])
									->andWhere(['not',['cod_municipio' => '15']])
									->andWhere(['not',['cod_municipio' => '22']])
									->all();
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
     * Obtiene una lista de planteles según el municipio
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
}

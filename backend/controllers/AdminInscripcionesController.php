<?php

namespace backend\controllers;

use Yii;
use common\models\Inscripciones;
use common\models\InscripcionesSearch;
use common\models\Procesos;
use common\models\Municipios;
use backend\models\CargarInscripciones;
use frontend\models\SignupForm;
use common\models\User;
use common\models\Estudiantes;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * AdminInscripcionesController implements the CRUD actions for Inscripciones model.
 */
class AdminInscripcionesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Inscripciones models.
     * @return mixed
     */
    /*public function actionIndex()
    {
        $searchModel = new InscripcionesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }*/

    /**
     * Displays a single Inscripciones model.
     * @param integer $id
     * @return mixed
     */
   /* public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }*/

    /**
     * Creates a new Inscripciones model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
   /* public function actionCreate()
    {
        $model = new Inscripciones();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }*/

    /**
     * Updates an existing Inscripciones model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
   /* public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }*/

    /**
     * Deletes an existing Inscripciones model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
   /* public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }*/

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

    /*
     * Carga un archivo .zip o .xls con información
     * de inscripción para ingresar al sistema
     * @param id_municipio
     * @return mixed
     */
    public function actionCargarInscripciones()
    {
		/*$model = new CargarInscripciones();

        return $this->render('cargarInscripciones', [
            'model' => $model,
        ]);*/
        $pathInscripciones = 'archivos_inscripciones/';
        
        $model = new CargarInscripciones();
        
        if ($model->load(Yii::$app->request->post()))
        {
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->file && $model->validate()) {
                $model->file->saveAs($pathInscripciones . $model->file->baseName . '.' . $model->file->extension);
                /*self::_descromprimirZip($pathInscripciones . $model->file->baseName . '.' . $model->file->extension,
                                    $pathInscripciones);*/
                if (self::_inscribirDesdeXls($pathInscripciones . $model->file->baseName . '.' . $model->file->extension)){
                    Yii::$app->session->setFlash('success', 'El archivo se ha subido con éxito', true);
                }
                else{
                    Yii::$app->session->setFlash('danger', 'Error al subir archivo', true);
                }
            }
        }
        
		return $this->render('cargarInscripciones', [
            'model' => $model,
        ]);
	}

    /**
     * Extrae una archivo zip en la dirección indicada 
     * @param file Direccion del archivo a extraer
     * @param destination Direccion donde se descomprimirá el archivo
     * @return mixed
     */
    private static function _descromprimirZip($file, $destination)
    {
        $ret = FALSE;

        $zip = new ZipArchive();
        if ($zip->open($file) === TRUE) {
            $zip->extractTo($destination);
            $zip->close();
            $ret = TRUE;
        } else {
            $ret = FALSE;
        }

        return $ret;
    }


    /**
     * Inscribe a un estudiante desde una planilla de inscripción .xlsx u .xls 
     * @param file Direccion de la planilla de inscripción
     * @return mixed
     */
    private static function _inscribirDesdeXls($file)
    {
        $ret = FALSE;
        $config = [
                    'setFirstRecordAsKeys' => false,  
                    //'setIndexSheetByName' => true, // set this if your excel data with multiple worksheet, the index of array will be set with the sheet name. If this not set, the index will use numeric. 
                    'getOnlySheet' => 'PLANILLA DE INSCRIPCIÓN', // you can set this property if you want to get the specified sheet from the excel data with multiple worksheet.
        ];

        $data = \moonland\phpexcel\Excel::import($file, $config);
        $planilla['correo'] = $data[26]['F'];
        $planilla['cedula'] = str_replace(',', '', $data[26]['B']);
        $planilla['cedula'] = str_replace('.', '', $data[26]['B']);
        $planilla['cedula'] = trim($data[26]['B']);
        $planilla['nombre_solicitante'] = $data[22]['G'];
        $planilla['apellido_solicitante'] = $data[22]['B'];
        $planilla['fecha_nacimiento_solicitante'] = $data[30]['D'] . '-' . $data[30]['E'] . '-' . $data[30]['F'];
        $planilla['lugar_nacimiento_solicitante'] = $data[31]['D'];
        $planilla['genero'] = ($data[30]['J'] == 'Femenino') ? 'F': 'M';
        $planilla['es_venezolano'] = ($data[25]['D'] == 'V') ? TRUE : FALSE;

        // Registra el usuario en el sistema
        $model = new SignupForm();
        $model->scenario = SignupForm::SCENARIO_OFFLINE;
        $model->username = $planilla['correo'];
        $model->email = $planilla['correo'];
        $model->password = $planilla['cedula'];
        if ($user = $model->signup()) {
            $ret = TRUE;
        }else{
            $ret = FALSE;
        }
        // -----

        // Registra el Estudiante
        if($ret){
            $model = new Estudiantes();
            $model->id_user = $user->id;
            
            $model->cedula = $planilla['cedula'];
            $model->nombre = $planilla['nombre_solicitante'];
            $model->apellido = $planilla['apellido_solicitante'];
            $model->fecha_nacimiento = $planilla['fecha_nacimiento_solicitante'];
            $model->lugar_nacimiento = $planilla['lugar_nacimiento_solicitante'];
            $model->genero = $planilla['genero'];
            $model->es_venezolano = $planilla['es_venezolano'];

            if ($estudiante = $model->save()) {
                $ret = TRUE;
            }else{
                $ret = FALSE;
                print_r($model);
                exit(0);
            }
        }
        // -----


        // Si ret es FALSE al final de todo entonces se debe hacer un rollback de 
        // lo registrado
        if (!$ret){
            $estudiante_id = (isset($estudiante->id)) ? $estudiante->id : null;
            if (($model = Estudiantes::findOne($estudiante_id)) !== null) {
                return $model->delete();
            }

            $user_id = (isset($user->id)) ? $user->id : null;
            if (($model = User::findOne($user_id)) !== null) {
                return $model->delete();
            }
        }

        return $ret;
    }
}

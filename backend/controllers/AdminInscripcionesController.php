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
use common\models\EstudioSocioEconomico;
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
                    Yii::$app->session->setFlash('success', 'El archivo '. $model->file->baseName . '.' . $model->file->extension . ' se ha subido con éxito', true);
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
                    'setIndexSheetByName' => false, // set this if your excel data with multiple worksheet, the index of array will be set with the sheet name. If this not set, the index will use numeric. 
                    'getOnlySheet' => 'PLANILLA DE INSCRIPCIÓN', // you can set this property if you want to get the specified sheet from the excel data with multiple worksheet.
        ];

        // Grados se amarró a código ya que en la tabla hay grados que no 
		// están participando en este proceso. Es necesario adecuar el código
		// en este sistema para excluir esos grados y lograr eliminar este código
		// amarrado
		$grados = array(
			'6TO GRADO' => '6',
			'1ER AÑO' => '7',
			'2DO AÑO' => '8',
			'3ER AÑO' => '9',
			'4TO AÑO' => '10',
			'5TO AÑO' => '11',
			'6TO AÑO (TÉCNICA)' => '12',
		);

        $nivelInstruccion = array(
			'PRIMARIA' => '1',
			'SECUNDARIA' => '2',
			'SUPERIOR' => '3',
		);

        $es_representante_data = array(
			'OTRO' => EstudioSocioEconomico::REP_ES_OTRO,
            'MADRE' => EstudioSocioEconomico::REP_ES_MADRE,
            'PADRE' => EstudioSocioEconomico::REP_ES_PADRE,
		);

        $filaBase = -1; // Para controlar el índice de las filas

        $data = \moonland\phpexcel\Excel::import($file, $config);
        $planilla['correo'] = trim($data[$filaBase+26]['F']);
        $planilla['cedula'] = trim(str_replace('.', '',str_replace(',', '', $data[$filaBase+26]['B'])));
        $planilla['nombre_solicitante'] = trim($data[$filaBase+22]['G']);
        $planilla['apellido_solicitante'] = trim($data[$filaBase+22]['B']);
        $planilla['fecha_nacimiento_solicitante'] = trim($data[$filaBase+30]['D'] . '-' . $data[$filaBase+30]['E'] . '-' . $data[$filaBase+30]['F']);
        $planilla['lugar_nacimiento_solicitante'] = isset($data[$filaBase+31]['D']) ? trim($data[$filaBase+31]['D']) : 'Mérida';
        $planilla['genero'] = (strtoupper($data[$filaBase+30]['J']) == 'FEMENINO') ? 'F': 'M';
        $planilla['es_venezolano'] = ($data[$filaBase+25]['D'] == 'V') ? TRUE : FALSE;

        $planilla['codigo_plantel'] = trim($data[$filaBase+68]['K']);
        $planilla['localidad_plantel'] = trim($data[$filaBase+16]['B']);
        $planilla['codigo_ultimo_grado'] = $grados[mb_strtoupper(trim(str_replace('é', 'É',str_replace('ñ', 'Ñ', $data[$filaBase+35]['D']))))];
        $planilla['postulado_para_beca'] = (isset($data[$filaBase+43]['K'])) ? 'B': '0';
        $planilla['postulado_para_premio'] = (isset($data[$filaBase+41]['K'])) ? 'P': '0';
        if ($planilla['postulado_para_beca'] == 'B')
		{
			$planilla['promedio'] = str_replace('.',',',$data[$filaBase+46]['J']);
		}else{
			$planilla['promedio'] = 0;
		}

		if ($planilla['postulado_para_premio'] == 'P')
		{
            if ($planilla['codigo_ultimo_grado'] == 6){ //6to Grado
                $planilla['nota1'] = str_replace('.',',',$data[$filaBase+57]['D']);			
                $planilla['nota2'] = str_replace('.',',',$data[$filaBase+58]['D']);                
                $planilla['nota3'] = str_replace('.',',',$data[$filaBase+59]['D']);
            }elseif ($planilla['codigo_ultimo_grado'] == 9){
                $planilla['nota1'] = str_replace('.',',',$data[$filaBase+57]['G']);			
                $planilla['nota2'] = str_replace('.',',',$data[$filaBase+58]['G']);                
                $planilla['nota3'] = str_replace('.',',',$data[$filaBase+59]['G']);
            }else{
                $planilla['nota1'] = str_replace('.',',',$data[$filaBase+57]['J']);			
                $planilla['nota2'] = str_replace('.',',',$data[$filaBase+58]['J']);                
                $planilla['nota3'] = str_replace('.',',',$data[$filaBase+59]['J']);
            }
			
		}else{
			$planilla['nota1'] = 0;
			$planilla['nota2'] = 0;
			$planilla['nota3'] = 0;
		}

        $planilla['codigo_profesion_jefe_familia'] = substr(trim($data[$filaBase+83]['B']), 0, 1);
        $planilla['codigo_nivel_instruccion_madre'] = substr(trim($data[$filaBase+87]['B']), 0, 1);
        $planilla['codigo_fuente_ingreso_familia'] = substr(trim($data[$filaBase+91]['B']), 0, 1);
        $planilla['codigo_vivienda_familia'] = substr(trim($data[$filaBase+95]['B']), 0, 1);
        $planilla['codigo_ingreso_familia'] = substr(trim($data[$filaBase+99]['B']), 0, 1);
        $planilla['codigo_grupo_familiar'] = substr(trim($data[$filaBase+103]['B']), 0, 1);
        
        $planilla['vive_con_padres_solicitante'] = ($data[$filaBase+109]['H'] == 'Si') ? 1 : 0;
        $planilla['telefono_fijo_solicitante'] = str_pad(str_replace('-', '', (string)$data[$filaBase+109]['B']), 11, '0', STR_PAD_LEFT);
        $planilla['telefono_celular_solicitante'] = str_pad(str_replace('-', '', (string)$data[$filaBase+109]['E']), 11, '0', STR_PAD_LEFT);

        $planilla['apellidos_padre'] = $data[$filaBase+118]['B'];
        $planilla['nombres_padre'] = $data[$filaBase+118]['H'];
        $planilla['cedula_padre'] = trim(str_replace('.', '',str_replace(',', '', $data[$filaBase+122]['B'])));
        $planilla['grado_instruccion_padre'] = array_key_exists (strtoupper(trim($data[$filaBase+122]['F'])), $nivelInstruccion) ? $nivelInstruccion[strtoupper(trim($data[$filaBase+122]['F']))] : null;
        $planilla['telefono_fijo_padre'] = str_pad(str_replace('-', '', (string)$data[$filaBase+121]['K']), 11, '0', STR_PAD_LEFT);
        $planilla['telefono_celular_padre'] = str_pad(str_replace('-', '', (string)$data[$filaBase+122]['K']), 11, '0', STR_PAD_LEFT);
        $planilla['profesion_padre'] = $data[$filaBase+126]['B'];
        $planilla['ocupacion_padre'] = $data[$filaBase+126]['E'];
        $planilla['lugar_trabajo_padre'] = $data[$filaBase+126]['H'];
        $planilla['ingreso_mensual_padre'] = trim(str_replace('.', '',str_replace(',', '.', $data[$filaBase+126]['K'])));
        $planilla['direccion_trabajo_padre'] = $data[$filaBase+131]['B'];
        $planilla['correo_e_padre'] = trim($data[$filaBase+131]['I']);
        $planilla['direccion_habitacion_padre'] = $data[$filaBase+136]['B'];

        $planilla['apellidos_madre'] = $data[$filaBase+142]['B'];
        $planilla['nombres_madre'] = $data[$filaBase+142]['H'];
        $planilla['cedula_madre'] = trim(str_replace('.', '',str_replace(',', '', $data[$filaBase+147]['B'])));
        $planilla['grado_instruccion_madre'] = array_key_exists (strtoupper(trim($data[$filaBase+147]['F'])), $nivelInstruccion) ? $nivelInstruccion[strtoupper(trim($data[$filaBase+147]['F']))] : null;
        $planilla['telefono_fijo_madre'] = str_pad(str_replace('-', '', (string)$data[$filaBase+146]['K']), 11, '0', STR_PAD_LEFT);
        $planilla['telefono_celular_madre'] = str_pad(str_replace('-', '', (string)$data[$filaBase+147]['K']), 11, '0', STR_PAD_LEFT);
        $planilla['profesion_madre'] = $data[$filaBase+151]['B'];
        $planilla['ocupacion_madre'] = $data[$filaBase+151]['E'];
        $planilla['lugar_trabajo_madre'] = $data[$filaBase+151]['H'];
        $planilla['ingreso_mensual_madre'] = trim(str_replace('.', '',str_replace(',', '.', $data[$filaBase+151]['K'])));
        $planilla['direccion_trabajo_madre'] = $data[$filaBase+156]['B'];
        $planilla['correo_e_madre'] = trim($data[$filaBase+156]['I']);
        $planilla['direccion_habitacion_madre'] = $data[$filaBase+161]['B'];

        $planilla['apellidos_representante'] = $data[$filaBase+174]['B'];
        $planilla['nombres_representante'] = $data[$filaBase+174]['H'];
        $planilla['cedula_representante'] = trim(str_replace('.', '',str_replace(',', '', $data[$filaBase+178]['B'])));
        $planilla['grado_instruccion_representante'] = array_key_exists (strtoupper(trim($data[$filaBase+178]['F'])), $nivelInstruccion) ? $nivelInstruccion[strtoupper(trim($data[$filaBase+178]['F']))] : null;
        $planilla['telefono_fijo_representante'] = str_pad(str_replace('-', '', (string)$data[$filaBase+177]['K']), 11, '0', STR_PAD_LEFT);
        $planilla['telefono_celular_representante'] = str_pad(str_replace('-', '', (string)$data[$filaBase+178]['K']), 11, '0', STR_PAD_LEFT);
        $planilla['profesion_representante'] = $data[$filaBase+182]['B'];
        $planilla['ocupacion_representante'] = $data[$filaBase+182]['E'];
        $planilla['lugar_trabajo_representante'] = $data[$filaBase+182]['H'];
        $planilla['ingreso_mensual_representante'] = trim(str_replace('.', '',str_replace(',', '.', $data[$filaBase+182]['K'])));
        $planilla['direccion_trabajo_representante'] = $data[$filaBase+187]['B'];
        $planilla['correo_e_representante'] = trim($data[$filaBase+187]['I']);
        $planilla['direccion_habitacion_representante'] = $data[$filaBase+192]['B'];

        $planilla['representante'] = mb_strtoupper(trim($data[$filaBase+168]['C']));

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
        print_r($model);

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

            if ($model->save()) {
                $ret = TRUE;
                $estudiante = $model;
            }else{
                $ret = FALSE;
            }
        }
        // -----
        print_r($model->getErrors());

        // Registra la Inscripción
        if($ret){
            $model = new Inscripciones();
            $model->id_estudiante = $estudiante->id;
            $model->id_proceso =  Procesos::getIdProcesoAbierto();
			$model->fecha_inscripcion = Yii::$app->formatter->asDate('now');
            $model->fecha_inscripcion = Yii::$app->formatter->asTimeStamp($model->fecha_inscripcion);

            $model->codigo_plantel = $planilla['codigo_plantel'];
            $model->localidad_plantel = $planilla['localidad_plantel'];
            $model->codigo_ultimo_grado = $planilla['codigo_ultimo_grado'];
            $model->postulado_para_beca = $planilla['postulado_para_beca'];
            $model->postulado_para_premio = $planilla['postulado_para_premio'];
            $model->promedio = $planilla['promedio'];
            $model->nota1 = $planilla['nota1'];
            $model->nota2 = $planilla['nota2'];
            $model->nota3 = $planilla['nota3'];
            $model->codigo_profesion_jefe_familia = $planilla['codigo_profesion_jefe_familia'];
            $model->codigo_nivel_instruccion_madre = $planilla['codigo_nivel_instruccion_madre'];
            $model->codigo_fuente_ingreso_familia = $planilla['codigo_fuente_ingreso_familia'];
            $model->codigo_vivienda_familia = $planilla['codigo_vivienda_familia'];
            $model->codigo_ingreso_familia = $planilla['codigo_ingreso_familia'];
            $model->codigo_grupo_familiar = $planilla['codigo_grupo_familiar'];
            $model->cerrada = true;
  
            if ($model->save()) {
                $ret = TRUE;
                $inscripcion = $model;
            }else{
                $ret = FALSE;
            }
        }
        // -----
        print_r($model->getErrors());

        // Registra los Datos Socioeconomicos
        if($ret){
            $model = new EstudioSocioEconomico();
            $model->id_estudiante = $estudiante->id;
            $model->id_proceso =  Procesos::getIdProcesoAbierto();
            $model->n_planilla_inscripcion = $inscripcion->id;
            $model->codigo_ultimo_grado = $planilla['codigo_ultimo_grado'];


			$model->vive_con_padres_solicitante = $planilla['vive_con_padres_solicitante'];
            $model->telefono_fijo_solicitante = $planilla['telefono_fijo_solicitante'];
            $model->telefono_celular_solicitante = $planilla['telefono_celular_solicitante'];

            $model->apellidos_padre = $planilla['apellidos_padre'];
            $model->nombres_padre = $planilla['nombres_padre'];
            $model->cedula_padre = $planilla['cedula_padre'];
            $model->grado_instruccion_padre = $planilla['grado_instruccion_padre'];
            $model->telefono_fijo_padre = $planilla['telefono_fijo_padre'];
            $model->telefono_celular_padre = $planilla['telefono_celular_padre'];
            $model->profesion_padre = !empty($planilla['profesion_padre']) ? $planilla['profesion_padre'] : 'No suministrado';
            $model->ocupacion_padre = !empty($planilla['ocupacion_padre']) ? $planilla['ocupacion_padre'] : 'No suministrado';
            $model->lugar_trabajo_padre = !empty($planilla['lugar_trabajo_padre']) ? $planilla['lugar_trabajo_padre'] : 'No suministrado';
            $model->ingreso_mensual_padre = !empty($planilla['ingreso_mensual_padre']) ? $planilla['ingreso_mensual_padre'] : 0;
            $model->direccion_trabajo_padre = !empty($planilla['direccion_trabajo_padre']) ? $planilla['direccion_trabajo_padre'] : 'No suministrado';
            $model->correo_e_padre = !empty($planilla['correo_e_padre']) ? $planilla['correo_e_padre'] : $planilla['correo'];
            $model->direccion_habitacion_padre = !empty($planilla['direccion_habitacion_padre']) ? $planilla['direccion_habitacion_padre'] : 'No suministrado';

            $model->apellidos_madre = $planilla['apellidos_madre'];
            $model->nombres_madre = $planilla['nombres_madre'];
            $model->cedula_madre = $planilla['cedula_madre'];
            $model->grado_instruccion_madre = $planilla['grado_instruccion_madre'];
            $model->telefono_fijo_madre = $planilla['telefono_fijo_madre'];
            $model->telefono_celular_madre = $planilla['telefono_celular_madre'];
            $model->profesion_madre = empty($planilla['profesion_madre']) ? 'No suministrado' : $planilla['profesion_madre'];
            $model->ocupacion_madre = empty($planilla['ocupacion_madre']) ? 'No suministrado' : $planilla['ocupacion_madre'];
            $model->lugar_trabajo_madre = empty($planilla['lugar_trabajo_madre']) ? 'No suministrado' : $planilla['lugar_trabajo_madre'];
            $model->ingreso_mensual_madre = empty($planilla['ingreso_mensual_madre']) ? 0 : $planilla['ingreso_mensual_madre'];
            $model->direccion_trabajo_madre = empty($planilla['direccion_trabajo_madre']) ? 'No suministrado' : $planilla['direccion_trabajo_madre'];
            $model->correo_e_madre = empty($planilla['correo_e_madre']) ? $planilla['correo'] : $planilla['correo_e_madre'];
            $model->direccion_habitacion_madre = empty($planilla['direccion_habitacion_madre']) ? 'No suministrado' : $planilla['direccion_habitacion_madre'];

            $model->es_representante = $es_representante_data[$planilla['representante']];
            
            $model->apellidos_representante = !empty($planilla['apellidos_representante']) ? $planilla['apellidos_representante'] : 'No suministrado';
            $model->nombres_representante = !empty($planilla['nombres_representante']) ? $planilla['nombres_representante'] : 'No suministrado';
            $model->cedula_representante = $planilla['cedula_representante'];
            $model->grado_instruccion_representante = $planilla['grado_instruccion_representante'];
            $model->telefono_fijo_representante = $planilla['telefono_fijo_representante'];
            $model->telefono_celular_representante = $planilla['telefono_celular_representante'];
            $model->profesion_representante = !empty($planilla['profesion_representante']) ? $planilla['profesion_representante'] : 'No suministrado';
            $model->ocupacion_representante = !empty($planilla['ocupacion_representante']) ? $planilla['ocupacion_representante'] : 'No suministrado';
            $model->lugar_trabajo_representante = !empty($planilla['lugar_trabajo_representante']) ? $planilla['lugar_trabajo_representante'] : 'No suministrado';
            $model->ingreso_mensual_representante = !empty($planilla['ingreso_mensual_representante']) ? $planilla['ingreso_mensual_representante'] : 0;
            $model->direccion_trabajo_representante = !empty($planilla['direccion_trabajo_representante']) ? $planilla['direccion_trabajo_representante'] : 'No suministrado';
            $model->correo_e_representante = !empty($planilla['correo_e_representante']) ? $planilla['correo_e_representante'] : $planilla['correo'];;
            $model->direccion_habitacion_representante = !empty($planilla['direccion_habitacion_representante']) ? $planilla['direccion_habitacion_representante'] : 'No suministrado';
            
            if ($model->save()) {
                $ret = TRUE;
                $estudioSocioEconomico = $model;
            }else{
                $ret = FALSE;
            }
        }
        // -----
        print_r($model->getErrors());

        // Si ret es FALSE al final de todo entonces se debe hacer un rollback de 
        // lo registrado
        /*echo "Valor de ret: " . $ret;
        exit(0);*/
        if (!$ret){
            $estudiante_id = (isset($estudiante->id)) ? $estudiante->id : null;
            if (($model = Estudiantes::findOne($estudiante_id)) !== null) {
                $model->delete();
            }

            $inscripcion_id = (isset($inscripcion->id)) ? $inscripcion->id : null;
            if (($model = Inscripciones::findOne($inscripcion_id)) !== null) {
                $model->delete();
            }

            $estudioSocioEconomico_id = (isset($estudioSocioEconomico->id)) ? $estudioSocioEconomico->id : null;
            if (($model = Inscripciones::findOne($estudioSocioEconomico_id)) !== null) {
                $model->delete();
            }
            
            $user_id = (isset($user->id)) ? $user->id : null;
            if (($model = User::findOne($user_id)) !== null) {
                $model->delete();
            }
        }
        //exit(0);
        return $ret;
    }
}

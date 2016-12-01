<?php

namespace backend\controllers;

use Yii;
use common\models\EstudioSocioEconomico;
use common\models\EstudioSocioEconomicoSearch;
use common\models\Estudiantes;
use common\models\Inscripciones;
use common\models\InscripcionesSearch;
use common\models\Plantel;
use common\models\Municipios;
use common\models\User;
use common\models\Procesos;
use common\models\NseProfesionJefeFamilia;
use common\models\NseNivelDeLaMadre;
use common\models\NseFuenteDeIngreso;
use common\models\NseAlojamientoYVivienda;
use common\models\NseIngresoFamiliar;
use common\models\NseGrupoFamiliar;

use yii\web\NotFoundHttpException;
use yii\helpers\ArrayHelper;

use kartik\mpdf\Pdf;

class AdminReportesController extends \yii\web\Controller
{
    public function actionDatosSocioEconomicos()
    {
        return $this->render('datos-socio-economicos');
    }
/*
    public function actionIndex()
    {
		if (!($estudiante = Estudiantes::getEstudianteUser()))
        {
			Yii::$app->session->setFlash('info', 'No hay reportes para mostrar, debes realizar la inscripción', true);
			return $this->redirect(['/estudiantes/create']);
		}
		//$estudiante = Estudiantes::getEstudianteUser();
		$searchModel = new EstudioSocioEconomicoSearch();
        $dataProvider = $searchModel->search(['EstudioSocioEconomicoSearch' => ['id_estudiante' => $estudiante->id]]);
        $searchModelInscripciones = new InscripcionesSearch();
		$dataProviderInscripciones = $searchModelInscripciones->search(['InscripcionesSearch' => ['id_estudiante' => $estudiante->id, 'cerrada' => true]]);
		Yii::$app->session->setFlash('info', 'Debes tomar en cuenta que sólo se mostrarán las inscripciones que ya estén cerradas', true);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchModelInscripciones' => $searchModelInscripciones,
            'dataProviderInscripciones' => $dataProviderInscripciones,
        ]);
        //return $this->render('index');
    }*/

    public function actionInscripcion($id_estudiante = NULL)
    {
		
		if (Yii::$app->user->can('admin'))
		{
			$estudiante = Estudiantes::findOne($id_estudiante);
			if ($estudiante === null)
			{
				throw new NotFoundHttpException('La página solicitada no existe.');
			}
		}else
		{
			if (!($estudiante = Estudiantes::getEstudianteUser()))
			{
				return $this->redirect(['/estudiantes/create']);
			}
		}
		
		if (!($inscripcion = Inscripciones::find()
							->where(['id_estudiante' => $estudiante->id,
									'cerrada' => true])
							->one()))
		{
			return $this->render('errorReporte');
		}
							
		if (!($estudio = EstudioSocioEconomico::find()
							->where(['id_estudiante' => $estudiante->id])
							->one()))
		{
			return $this->render('errorReporte');
		}
		
		$plantel = Plantel::find()
						->where(['cod_pla' => $inscripcion->codigo_plantel])
						->one();
		$profesionJefeFamilia = ArrayHelper::map(NseProfesionJefeFamilia::find()->all(), 
									'cod_prof_jf', 'descripcion');
		$nivelInstruccionMadre = ArrayHelper::map(NseNivelDeLaMadre::find()->all(), 'cod_nivel_mad', 'descripcion');
		$fuenteIngreso = ArrayHelper::map(NseFuenteDeIngreso::find()->all(), 'cod_fuente_ing', 'descripcion');
		$alojamientoVivienda = ArrayHelper::map(NseAlojamientoYVivienda::find()->all(), 'cod_vivienda', 'descripcion');
		$ingresoFamiliar = ArrayHelper::map(NseIngresoFamiliar::find()
									->where(['cod_proceso' => Procesos::getCodigoProcesoAbierto()]) // Se debe colocar esto Procesos::getCodigoProcesoAbierto()
									->orderBy('cod_ing_fam')
									->all(), 'cod_ing_fam', 'descripcion');
		// Se aplica array_reverse para cumplir requerimiento de Ing. Ingrid Vivas
		$grupoFamiliar = array_reverse(ArrayHelper::map(NseGrupoFamiliar::find()->all(), 'cod_grupo_fam', 'descripcion'), true);

        $content = $this->renderPartial('inscripcion', [
			'inscripcion' => $inscripcion,
			'plantel' => $plantel,
			'estudianteCorreo' => $estudiante->user->email,
			'estudio' => $estudio,
			'profesionJefeFamilia' => $profesionJefeFamilia,
			'nivelInstruccionMadre' => $nivelInstruccionMadre,
			'fuenteIngreso' => $fuenteIngreso,
			'alojamientoVivienda' => $alojamientoVivienda,
			'ingresoFamiliar' => $ingresoFamiliar,
			'grupoFamiliar' => $grupoFamiliar,
		]);
		$style = '@page {  }
	table { border-collapse:collapse; border-spacing:0; empty-cells:show }
	td, th { vertical-align:top; font-size:10pt;}
	h1, h2, h3, h4, h5, h6 { clear:both }
	ol, ul { margin:0; padding:0;}
	li { list-style: none; margin:0; padding:0;}
	<!-- "li span.odfLiEnd" - IE 7 issue-->
	li span. { clear: both; line-height:0; width:0; height:0; margin:0; padding:0; }
	span.footnodeNumber { padding-right:1em; }
	span.annotation_style_by_filter { font-size:95%; font-family:Arial; background-color:#fff000;  margin:0; border:0; padding:0;  }
	* { margin:0;}
	.gr1 { font-size:12pt; writing-mode:page; padding-top:0.025cm; padding-bottom:0.025cm; padding-left:0.025cm; padding-right:0.025cm; }
	.gr2 { font-size:12pt; writing-mode:page; padding-top:0.025cm; padding-bottom:0.025cm; padding-left:0.025cm; padding-right:0.025cm; }
	.gr3 { font-size:12pt; writing-mode:page; }
	.P1 { text-align:center ! important; }
	.ta1 { writing-mode:lr-tb; }
	.Default { font-family:Liberation Sans; }
	.ce1 { font-family:Nimbus Sans L; vertical-align:middle; text-align:center ! important; font-size:10pt; font-weight:bold; }
	.ce10 { font-family:Nimbus Sans L; border-style:none; vertical-align:middle; text-align:center ! important; font-size:10pt; }
	.ce110 { font-family:Nimbus Sans L; font-weight:bold; }
	.ce11 { font-family:Nimbus Sans L; vertical-align:top; font-size:10pt; font-style:normal; font-weight:bold; }
	.ce12 { font-family:Nimbus Sans L; vertical-align:middle; text-align:left ! important; margin-left:0cm; font-size:10pt; font-weight:bold; }
	.ce13 { font-family:Nimbus Sans L; vertical-align:top; text-align:left ! important; margin-left:0cm; font-size:10pt; font-weight:normal; }
	.ce14 { font-family:Nimbus Sans L; vertical-align:middle; text-align:justify ! important; margin-left:0cm; font-size:8pt; font-style:normal; text-shadow:none; text-decoration:none ! important; font-weight:normal; }
	.ce114 { font-family:Nimbus Sans L; background-color:transparent; border-width:0.01,0261cm; border-style:solid; border-color:#000000; vertical-align:top; text-align:left ! important; margin-left:0cm; font-size:8pt; font-weight:bold; }
	.ce15 { font-family:Nimbus Sans L; border-width:0.01; border-style:solid; border-color:#000000; vertical-align:middle; text-align:center ! important; font-size:10pt; font-weight:bold; }
	.ce16 { font-family:Nimbus Sans L; border-width:0.01; border-style:solid; border-color:#000000; vertical-align:top; text-align:left ! important; margin-left:0cm; font-size:8pt; font-weight:normal; }
	.ce116 { font-family:Nimbus Sans L; border-style:none; vertical-align:middle; text-align:center ! important; margin-left:0cm; font-size:8pt; font-weight:bold; }
	.ce17 { font-family:Nimbus Sans L; vertical-align:middle; text-align:center ! important; font-size:8pt; font-weight:normal; }
	.ce117 { font-family:Nimbus Sans L; border-width:0.01,0261cm; border-style:solid; border-color:#000000; vertical-align:middle; text-align:left ! important; margin-left:0cm; font-size:8pt; }
	.ce18 { font-family:Nimbus Sans L; vertical-align:top; text-align:left ! important; margin-left:0cm; font-size:10pt; font-weight:bold; }
	.ce19 { font-family:Nimbus Sans L; vertical-align:middle; text-align:left ! important; margin-left:0cm; font-size:10pt; font-weight:bold; }
	.ce102 { font-family:Nimbus Sans L; vertical-align:middle; text-align:center ! important; font-size:10pt; font-weight:bold; }
	.ce2 { font-family:Nimbus Sans L; vertical-align:top; font-size:10pt; }
	.ce20 { font-family:Nimbus Sans L; vertical-align:top; text-align:left ! important; margin-left:0cm; font-size:10pt; font-style:normal; text-shadow:none; text-decoration:none ! important; font-weight:normal; }
	.ce21 { font-family:Nimbus Sans L; font-size:10pt; }
	.ce22 { font-family:Nimbus Sans L; vertical-align:middle; text-align:left ! important; margin-left:0cm; font-size:10pt; font-style:normal; text-shadow:none; text-decoration:none ! important; font-weight:normal; }
	.ce23 { font-family:Nimbus Sans L; vertical-align:middle; text-align:left ! important; margin-left:0cm; font-size:10pt; font-weight:bold; }
	.ce24 { font-family:Liberation Sans; border-bottom-width:0,0349cm; border-bottom-style:solid; border-bottom-color:#000000; border-left-style:none; border-right-style:none; border-top-style:none; vertical-align:middle; text-align:center ! important; }
	.ce25 { font-family:Nimbus Sans L; vertical-align:middle; text-align:center ! important; margin-left:0cm; }
	.ce125 { font-family:Nimbus Sans L; border-width:0.01,0261cm; border-style:solid; border-color:#000000; vertical-align:top; text-align:left ! important; margin-left:0cm; font-size:8pt; }
	.ce26 { font-family:Nimbus Sans L; border-width:0.01,0261cm; border-style:solid; border-color:#000000; vertical-align:top; font-size:10pt; }
	.ce126 { font-family:Nimbus Sans L; text-align:justify ! important; margin-left:0cm; font-size:8pt; font-weight:bold; }
	.ce27 { font-family:Nimbus Sans L; vertical-align:top; font-size:10pt; }
	.ce28 { font-family:Nimbus Sans L; vertical-align:top; text-align:left ! important; margin-left:0cm; font-size:10pt; }
	.ce29 { font-family:Nimbus Sans L; }
	.ce3 { font-family:Nimbus Sans L; vertical-align:top; text-align:right ! important; margin-left:0cm; font-size:10pt; font-weight:bold; }
	.ce30 { font-family:Nimbus Sans L; border-style:none; vertical-align:middle; text-align:left ! important; margin-left:0cm; font-size:10pt; }
	.ce31 { font-family:Nimbus Sans L; border-style:none; vertical-align:top; text-align:left ! important; margin-left:0cm; font-size:10pt; }
	.ce32 { font-family:Nimbus Sans L; background-color:transparent; border-style:none; vertical-align:top; text-align:left ! important; margin-left:0cm; font-size:10pt; }
	.ce33 { font-family:Nimbus Sans L; vertical-align:top; text-align:left ! important; margin-left:0cm; font-size:10pt; }
	.ce34 { font-family:Nimbus Sans L; border-style:none; vertical-align:top; font-size:10pt; }
	.ce35 { font-family:Nimbus Sans L; background-color:transparent; border-style:none; vertical-align:top; text-align:left ! important; margin-left:0cm; font-size:10pt; }
	.ce36 { font-family:Nimbus Sans L; vertical-align:bottom; text-align:left ! important; margin-left:0cm; font-size:10pt; font-weight:bold; }
	.ce37 { font-family:Liberation Sans; border-width:0.01,0261cm; border-style:solid; border-color:#000000; vertical-align:middle; text-align:center ! important; }
	.ce137 { font-family:Nimbus Sans L; border-width:0.01,0261cm; border-style:solid; border-color:#000000; vertical-align:middle; text-align:left ! important; margin-left:0cm; font-size:8pt; font-weight:bold; }
	.ce38 { font-family:Nimbus Sans L; border-width:0.01,0261cm; border-style:solid; border-color:#000000; vertical-align:top; text-align:left ! important; margin-left:0cm; font-size:10pt; }
	.ce39 { font-family:Nimbus Sans L; border-width:0,0021cm; border-style:solid; border-color:#000000; vertical-align:middle; text-align:center ! important; font-size:10pt; }
	.ce4 { font-family:Nimbus Sans L; vertical-align:top; font-size:10pt; font-weight:bold; }
	.ce104 { font-family:Nimbus Sans L; border-width:0.01,0261cm; border-style:solid; border-color:#000000; vertical-align:top; text-align:left ! important; margin-left:0cm; font-size:8pt; font-weight:bold; }
	.ce40 { font-family:Nimbus Sans L; background-color:transparent; border-style:none; vertical-align:top; font-size:10pt; }
	.ce41 { font-family:Nimbus Sans L; vertical-align:middle; text-align:center ! important; }
	.ce42 { font-family:Nimbus Sans L; border-width:0.01; border-style:solid; border-color:#000000; vertical-align:top; text-align:right ! important; margin-left:0cm; font-size:10pt; font-weight:normal; }
	.ce43 { font-family:Nimbus Sans L; border-width:0,0021cm; border-style:solid; border-color:#000000; vertical-align:top; font-size:10pt; }
	.ce44 { font-family:Nimbus Sans L; vertical-align:middle; font-size:8pt; }
	.ce45 { font-family:Liberation Sans; vertical-align:top; }
	.ce5 { font-family:Nimbus Sans L; border-width:0.01; border-style:solid; border-color:#000000; vertical-align:top; text-align:left ! important; margin-left:0cm; font-size:10pt; font-weight:normal; }
	.ce6 { font-family:Nimbus Sans L; vertical-align:top; text-align:left ! important; margin-left:0cm; font-size:8pt; font-style:normal; text-shadow:none; text-decoration:none ! important; font-weight:normal; }
	.ce7 { font-family:Nimbus Sans L; vertical-align:top; text-align:center ! important; font-size:10pt; font-weight:bold; }
    .ce107 { font-family:Nimbus Sans L; border-width:0,0261cm; border-style:solid; border-color:#000000; vertical-align:top; text-align:left ! important; margin-left:0cm; color:#000000; font-size:8pt; font-weight:bold; }
	.ce8 { font-family:Nimbus Sans L; vertical-align:top; text-align:left ! important; margin-left:0cm; font-size:10pt; font-weight:bold; }
	.ce9 { font-family:Nimbus Sans L; border-width:0.01; border-style:solid; border-color:#000000; vertical-align:middle; text-align:center ! important; font-size:10pt; }
	.ce109 { font-family:Nimbus Sans L; vertical-align:middle; text-align:center ! important; font-weight:bold; }
	.co1 { width:2.831cm; }
	.co2 { width:2.258cm; }
	.co3 { width:3.54cm; }
	.ro1 { height:0.452cm; }
	.ro10 { height:1.473cm; }
	.ro11 { height:0.452cm; }
	.ro12 { height:0.6cm; }
	.ro13 { height:0.473cm; }
	.ro2 { height:0.801cm; }
	.ro3 { height:1cm; }
	.ro4 { height:0.815cm; }
	.ro5 { height:1.252cm; }
	.ro6 { height:1.737cm; }
	.ro7 { height:1.184cm; }
	.ro8 { height:0.841cm; }
	.ro9 { height:0.499cm; }
	.T1 { font-family:Nimbus Sans L; font-size:8pt; }
	.T2 { font-family:Nimbus Sans L; font-size:8pt; font-weight:normal; }
	.T3 { font-weight:bold; }
	.T4 { font-size:9pt; font-weight:bold; font-style:normal; }
	.T5 { font-size:9pt; font-style:normal; font-weight:normal; }
	.T6 { font-size:10pt; font-weight:bold; font-style:normal; }
	.T7 { font-size:10pt; font-style:normal; font-weight:normal; }
	<!-- ODF styles with no properties representable as CSS -->
	.T8  { }
	.textoNormal{font-size:10pt; font-style: normal; font-weight:normal;}';
	
		$pdf = new Pdf([
			// set to use core fonts only
			'mode' => Pdf::MODE_UTF8, 
			// A4 paper format
			'format' => Pdf::FORMAT_LETTER, 
			// portrait orientation
			'orientation' => Pdf::ORIENT_PORTRAIT,
			'filename' => 'inscripcionFORTALENTO.pdf',
			// stream to browser inline
			//'destination' => Pdf::DEST_BROWSER,
			'destination' => Pdf::DEST_DOWNLOAD, 
			// your html content input
			'content' => $content,  
			// format content from your own css file if needed or use the
			// enhanced bootstrap css built by Krajee for mPDF formatting 
			//'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
			// any css to be embedded if required
			'cssInline' =>  $style,//'.kv-heading-1{font-size:18px}', 
			 // set mPDF properties on the fly
			//'options' => ['title' => 'Krajee Report Title'],
			 // call mPDF methods on the fly
			//'methods' => [ 
			//	'SetHeader'=>['Krajee Report Header'], 
			//	'SetFooter'=>['{PAGENO}'],
			//]
		]);

		// return the pdf output as per the destination setting
		return $pdf->render(); 
		//return $content;
    }
    
    /*
     * Imprime los estudiantes inscritos por municipio en un .pdf
     * 
    **/
    public function actionMunicipioEstudiantes($cod_municipio)
    {
		/* Está consulta se realizó por partes dado que el sistema maneja dos
		 * bases de datos separadas y no permite hacer filtros, como ordenamiento,  
		 * en tablas que se encuentran en bases de datos separadas.*/
		$municipio = Municipios::find()
			->where(['cod_municipio'=>$cod_municipio])
			->one();
		$planteles = yii\helpers\ArrayHelper::getColumn(Plantel::find()
				->select('cod_pla')
				->where(['cod_municipio'=>$cod_municipio])
				->all(), 'cod_pla');
				
		// Se retornan los datos en un array ya que reduce el consumo de memoria
		// http://www.yiiframework.com/doc-2.0/guide-db-active-record.html#data-in-arrays
		$model = Inscripciones::find()
			->asArray()
			->joinWith(['idEstudiante', 'idEstudiante.user'])
			->where(['in', 'codigo_plantel',$planteles])
			->orderBy(['id' => SORT_ASC])
			->all();
		/***/
	    $content = $this->renderPartial('municipioEstudiantes', [
			'municipio' => $municipio,
			'model' => $model,
		]);
	
		$pdf = new Pdf([
			// set to use core fonts only
			'mode' => Pdf::MODE_UTF8, 
			// A4 paper format
			'format' => Pdf::FORMAT_LETTER, 
			// portrait orientation
			'orientation' => Pdf::ORIENT_PORTRAIT,
			'filename' => $municipio->municipio.'.pdf',
			// stream to browser inline
			//'destination' => Pdf::DEST_BROWSER,
			'destination' => Pdf::DEST_DOWNLOAD, 
			// your html content input
			'content' => $content,  
			// format content from your own css file if needed or use the
			// enhanced bootstrap css built by Krajee for mPDF formatting 
			'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
			// any css to be embedded if required
			//'cssInline' =>  $style,//'.kv-heading-1{font-size:18px}', 
			 // set mPDF properties on the fly
			//'options' => ['title' => 'Krajee Report Title'],
			 // call mPDF methods on the fly
			//'methods' => [ 
			//	'SetHeader'=>['Krajee Report Header'], 
			//	'SetFooter'=>['{PAGENO}'],
			//]
		]);

		// return the pdf output as per the destination setting
		return $pdf->render(); 
		//return $content;
    }

	/**
     * Generar un archivo xls de los alumnos inscritos en el municipio
     * pasado como parámetro. Este reporte es esxigido por la Zona Educativa
     * @param id_municipio
     * @return mixed
     */
    public function actionZonaEducativaXls($cod_municipio)
    {
		// Grados se amarró a código ya que en la tabla hay grados que no 
		// están participando en este proceso. Es necesario adecuar el código
		// en este sistema para excluir esos grados y lograr eliminar este código
		// amarrado
		$grados = array(
			'6' => '6to. Grado',
			'7' => '1er. Año',
			'8' => '2do. Año',
			'9' => '3er. Año',
			'10' => '4to. Año',
			'11' => '5to. Año',
			'12' => '6to. Año (Técnica)',
		  );

        $model = Municipios::find()
			->with('plantels.inscripciones')
			->where(['cod_municipio'=>$cod_municipio])
			->all();
		$archivo = null;
		$archivo = "MUNICIPIO, NOMBRES, APELLIDOS, CÉDULA DE IDENTIDAD, AÑO CULMINADO, UNIDAD EDUCATIVA\n";
		foreach ($model[0]->plantels as $plantel)
		{
			foreach ($plantel->inscripciones as $inscripcion)
			{
				// Solo se imprimen inscripciones que estén cerradas
				if ($inscripcion->cerrada)
				{
					$archivo .= $model[0]->municipio . ",";					
					$archivo .= $inscripcion->idEstudiante->nombre . ",";					
					$archivo .= $inscripcion->idEstudiante->apellido . ",";					
					$archivo .= $inscripcion->idEstudiante->cedula . ",";
					$archivo .= $grados[$inscripcion->codigo_ultimo_grado] . ",";
					$archivo .= $plantel->nom_pla;					
					$archivo .= "\n";
				}
			}
		}
        header("Cache-Control: public");
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=".str_replace(" ", "_", $model[0]->municipio).".csv");
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
     * Generar un archivo xls de los alumnos inscritos en el municipio
     * pasado como parámetro
     * @param id_municipio
     * @return mixed
     */
    public function actionInscripcionesXls($cod_municipio)
    {
        $model = Municipios::find()
			->with('plantels.inscripciones')
			->where(['cod_municipio'=>$cod_municipio])
			->all();
		$archivo = null;
		$archivo = "MUNICIPIO, NOMBRES, APELLIDOS, CÉDULA DE IDENTIDAD, CORREO, TELÉFONO SOLICITANTE, CELULAR SOLICITANTE, TELÉFONO REPRESENTANTE, CELULAR REPRESENTANTE, ESTATUS\n";
		foreach ($model[0]->plantels as $plantel)
		{
			foreach ($plantel->inscripciones as $inscripcion)
			{
					/*print_r($inscripcion);
					exit(0);*/
					$archivo .= $model[0]->municipio . ",";
					$archivo .= isset($inscripcion->idEstudiante->nombre) ? $inscripcion->idEstudiante->nombre . ",": "No disponible" . ",";					
					$archivo .= isset($inscripcion->idEstudiante->apellido) ? $inscripcion->idEstudiante->apellido . "," : "No disponible" . ",";					
					$archivo .= isset($inscripcion->idEstudiante->cedula) ? $inscripcion->idEstudiante->cedula . "," :  "No disponible" . ",";
					$archivo .= isset($inscripcion->idEstudiante->user->email) ? $inscripcion->idEstudiante->user->email . "," : "No disponible" . ",";
					$archivo .= isset($inscripcion->idEstudiante->estudioSocioEconomico->telefono_fijo_solicitante) ? $inscripcion->idEstudiante->estudioSocioEconomico->telefono_fijo_solicitante . "," : "No disponible" . ",";
					$archivo .= isset($inscripcion->idEstudiante->estudioSocioEconomico->telefono_celular_solicitante) ? $inscripcion->idEstudiante->estudioSocioEconomico->telefono_celular_solicitante . "," : "No disponible" . ",";
					$archivo .= isset($inscripcion->idEstudiante->estudioSocioEconomico->telefono_fijo_representante) ? $inscripcion->idEstudiante->estudioSocioEconomico->telefono_fijo_representante . "," : "No disponible" . ",";
					$archivo .= isset($inscripcion->idEstudiante->estudioSocioEconomico->telefono_celular_representante) ? $inscripcion->idEstudiante->estudioSocioEconomico->telefono_celular_representante . "," : "No disponible" . ",";
					$archivo .= isset($inscripcion->cerrada) ? $inscripcion->cerrada ? 'Cerrada': 'Abierta' : "No disponible" . ",";
					$archivo .= "\n";
			}
		}
        header("Cache-Control: public");
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=".str_replace(" ", "_", $model[0]->municipio).".csv");
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

}

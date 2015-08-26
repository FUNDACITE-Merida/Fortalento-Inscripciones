<?php

namespace app\controllers;

use Yii;
use app\models\EstudioSocioEconomico;
use app\models\EstudioSocioEconomicoSearch;
use app\models\Estudiantes;
use app\models\Inscripciones;
use app\models\InscripcionesSearch;
use app\models\Plantel;
use app\models\Municipios;
use app\models\User;

use kartik\mpdf\Pdf;

class ReportesController extends \yii\web\Controller
{
    public function actionDatosSocioEconomicos()
    {
        return $this->render('datos-socio-economicos');
    }

    public function actionIndex()
    {
		$estudiante = Estudiantes::getEstudianteUser();
		$searchModel = new EstudioSocioEconomicoSearch();
        $dataProvider = $searchModel->search(['id_estudiante' => $estudiante->id]);
        
        $searchModelInscripciones = new InscripcionesSearch();
        $dataProviderInscripciones = $searchModelInscripciones->search(['id_estudiante' => $estudiante->id]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchModelInscripciones' => $searchModelInscripciones,
            'dataProviderInscripciones' => $dataProviderInscripciones,
        ]);
        //return $this->render('index');
    }

    public function actionInscripcion($id_proceso)
    {
		$estudiante = Estudiantes::getEstudianteUser();
		$inscripcion =  Inscripciones::find()
							->where(['id_proceso' => $id_proceso, 
									'id_estudiante' => $estudiante->id])
							->one();
		$plantel = Plantel::find()
						->where(['cod_pla' => $inscripcion->codigo_plantel])
						->one();
		
        $content = $this->renderPartial('inscripcion', [
			'inscripcion' => $inscripcion,
			'plantel' => $plantel,
			'estudianteCorreo' => User::find()
										->select(['email'])
										->where(['id' => Yii::$app->user->id])
										->one(),
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
	.ce11 { font-family:Nimbus Sans L; vertical-align:top; font-size:10pt; font-style:normal; font-weight:bold; }
	.ce12 { font-family:Nimbus Sans L; vertical-align:middle; text-align:left ! important; margin-left:0cm; font-size:10pt; font-weight:bold; }
	.ce13 { font-family:Nimbus Sans L; vertical-align:top; text-align:left ! important; margin-left:0cm; font-size:10pt; font-weight:normal; }
	.ce14 { font-family:Nimbus Sans L; vertical-align:middle; text-align:justify ! important; margin-left:0cm; font-size:8pt; font-style:normal; text-shadow:none; text-decoration:none ! important; font-weight:normal; }
	.ce15 { font-family:Nimbus Sans L; border-width:0,0261cm; border-style:solid; border-color:#000000; vertical-align:middle; text-align:center ! important; font-size:10pt; font-weight:bold; }
	.ce16 { font-family:Nimbus Sans L; border-width:0,0261cm; border-style:solid; border-color:#000000; vertical-align:top; text-align:left ! important; margin-left:0cm; font-size:8pt; font-weight:normal; }
	.ce17 { font-family:Nimbus Sans L; vertical-align:middle; text-align:center ! important; font-size:8pt; font-weight:normal; }
	.ce18 { font-family:Nimbus Sans L; vertical-align:top; text-align:left ! important; margin-left:0cm; font-size:10pt; font-weight:bold; }
	.ce19 { font-family:Nimbus Sans L; vertical-align:middle; text-align:left ! important; margin-left:0cm; font-size:10pt; font-weight:bold; }
	.ce2 { font-family:Nimbus Sans L; vertical-align:top; font-size:10pt; }
	.ce20 { font-family:Nimbus Sans L; vertical-align:top; text-align:left ! important; margin-left:0cm; font-size:10pt; font-style:normal; text-shadow:none; text-decoration:none ! important; font-weight:normal; }
	.ce21 { font-family:Nimbus Sans L; font-size:10pt; }
	.ce22 { font-family:Nimbus Sans L; vertical-align:middle; text-align:left ! important; margin-left:0cm; font-size:10pt; font-style:normal; text-shadow:none; text-decoration:none ! important; font-weight:normal; }
	.ce23 { font-family:Nimbus Sans L; vertical-align:middle; text-align:left ! important; margin-left:0cm; font-size:10pt; font-weight:bold; }
	.ce24 { font-family:Liberation Sans; border-bottom-width:0,0349cm; border-bottom-style:solid; border-bottom-color:#000000; border-left-style:none; border-right-style:none; border-top-style:none; vertical-align:middle; text-align:center ! important; }
	.ce25 { font-family:Nimbus Sans L; vertical-align:middle; text-align:center ! important; margin-left:0cm; }
	.ce26 { font-family:Nimbus Sans L; border-width:0,0261cm; border-style:solid; border-color:#000000; vertical-align:top; font-size:10pt; }
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
	.ce37 { font-family:Liberation Sans; border-width:0,0261cm; border-style:solid; border-color:#000000; vertical-align:middle; text-align:center ! important; }
	.ce38 { font-family:Nimbus Sans L; border-width:0,0261cm; border-style:solid; border-color:#000000; vertical-align:top; text-align:left ! important; margin-left:0cm; font-size:10pt; }
	.ce39 { font-family:Nimbus Sans L; border-width:0,0021cm; border-style:solid; border-color:#000000; vertical-align:middle; text-align:center ! important; font-size:10pt; }
	.ce4 { font-family:Nimbus Sans L; vertical-align:top; font-size:10pt; font-weight:bold; }
	.ce40 { font-family:Nimbus Sans L; background-color:transparent; border-style:none; vertical-align:top; font-size:10pt; }
	.ce41 { font-family:Nimbus Sans L; vertical-align:middle; text-align:center ! important; }
	.ce42 { font-family:Nimbus Sans L; border-style:none; vertical-align:top; text-align:right ! important; margin-left:0cm; font-size:10pt; font-weight:normal; }
	.ce43 { font-family:Nimbus Sans L; border-width:0,0021cm; border-style:solid; border-color:#000000; vertical-align:top; font-size:10pt; }
	.ce44 { font-family:Nimbus Sans L; vertical-align:middle; font-size:8pt; }
	.ce45 { font-family:Liberation Sans; vertical-align:top; }
	.ce5 { font-family:Nimbus Sans L; border-width:0,0261cm; border-style:solid; border-color:#000000; vertical-align:top; text-align:left ! important; margin-left:0cm; font-size:10pt; font-weight:normal; }
	.ce6 { font-family:Nimbus Sans L; vertical-align:top; text-align:left ! important; margin-left:0cm; font-size:8pt; font-style:normal; text-shadow:none; text-decoration:none ! important; font-weight:normal; }
	.ce7 { font-family:Nimbus Sans L; vertical-align:top; text-align:center ! important; font-size:10pt; font-weight:bold; }
	.ce8 { font-family:Nimbus Sans L; vertical-align:top; text-align:left ! important; margin-left:0cm; font-size:10pt; font-weight:bold; }
	.ce9 { font-family:Nimbus Sans L; border-width:0,0261cm; border-style:solid; border-color:#000000; vertical-align:middle; text-align:center ! important; font-size:10pt; }
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
	.T8  { }';
	
		$pdf = new Pdf([
			// set to use core fonts only
			'mode' => Pdf::MODE_CORE, 
			// A4 paper format
			'format' => Pdf::FORMAT_LETTER, 
			// portrait orientation
			'orientation' => Pdf::ORIENT_PORTRAIT, 
			// stream to browser inline
			'destination' => Pdf::DEST_BROWSER, 
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

}

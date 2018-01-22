<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProviderInscripciones app\models\InscripcionesSearch */
/* @var $searchModelInscripciones yii\data\ActiveDataProvider */
/* @var $searchModel app\models\EstudioSocioEconomicoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reportes';
//$this->params['breadcrumbs'][] = $this->title;
//print_r($dataProviderInscripciones);
?>
<div class="estudio-socio-economico-index">

	<h1><?= $this->title?></h1>
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="row">
  <div class="col-lg-12 col-md-10">		
	<div class="form-group">
	  <h3>Inscripciones</h3>
	  <?= GridView::widget([
        'dataProvider' => $dataProviderInscripciones,
        //'filterModel' => $searchModelInscripciones,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
			[
				'attribute' => 'idProceso.codigo',
				'format' => 'text',
				'label' => 'Proceso',
			],	
            /*'id_proceso',
            'id_estudiante',
            'n_planilla_inscripcion',
            'codigo_ultimo_grado',*/
            //'Proceso',
            // 'vive_con_padres_solicitante:boolean',
            // 'telefono_fijo_solicitante',
            // 'telefono_celular_solicitante',
            // 'apellidos_padre',
            // 'nombres_padre',
            // 'cedula_padre',
            // 'grado_instruccion_padre',
            // 'telefono_fijo_padre',
            // 'telefono_celular_padre',
            // 'profesion_padre',
            // 'ocupacion_padre',
            // 'lugar_trabajo_padre',
            // 'ingreso_mensual_padre',
            // 'direccion_trabajo_padre',
            // 'correo_e_padre',
            // 'direccion_habitacion_padre',
            // 'apellidos_madre',
            // 'nombres_madre',
            // 'cedula_madre',
            // 'grado_instruccion_madre',
            // 'telefono_fijo_madre',
            // 'telefono_celular_madre',
            // 'profesion_madre',
            // 'ocupacion_madre',
            // 'lugar_trabajo_madre',
            // 'ingreso_mensual_madre',
            // 'direccion_trabajo_madre',
            // 'correo_e_madre',
            // 'direccion_habitacion_madre',
            // 'apellidos_representante',
            // 'nombres_representante',
            // 'cedula_representante',
            // 'grado_instruccion_representante',
            // 'telefono_fijo_representante',
            // 'telefono_celular_representante',
            // 'profesion_representante',
            // 'ocupacion_representante',
            // 'lugar_trabajo_representante',
            // 'ingreso_mensual_representante',
            // 'direccion_trabajo_representante',
            // 'correo_e_representante',

            //['class' => 'yii\grid\ActionColumn'],
            [
			  'class' => 'yii\grid\ActionColumn',
			  'template' => '{Imprimir}',
			  'buttons' => [
				'Imprimir' => function ($url, $model) {
					return Html::a('<span class="glyphicon glyphicon-print"></span>', $url, [
								'title' => Yii::t('app', 'Imprimir'),
					]);
				}
			  ],
			  'urlCreator' => function ($action, $model, $key, $index) {
				if ($action === 'Imprimir') {
					$mark = date("H-i-s");
					$url =Yii::$app->urlManager->createUrl(['reportes/inscripcion', 'mark'=>$mark]);
					return $url;
				}
			  }
			],
        ],
    ]); ?>
	</div>
  </div>
 
<!--  
  <div class="col-lg-6 col-md-10">
	<h3>Estudios socio económicos</h3>
	<?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
			[
				'attribute' => 'idProceso.codigo',
				'format' => 'text',
				'label' => 'Proceso',
			],	
            /*'id_proceso',
            'id_estudiante',
            'n_planilla_inscripcion',
            'codigo_ultimo_grado',*/
            //'Proceso',
            // 'vive_con_padres_solicitante:boolean',
            // 'telefono_fijo_solicitante',
            // 'telefono_celular_solicitante',
            // 'apellidos_padre',
            // 'nombres_padre',
            // 'cedula_padre',
            // 'grado_instruccion_padre',
            // 'telefono_fijo_padre',
            // 'telefono_celular_padre',
            // 'profesion_padre',
            // 'ocupacion_padre',
            // 'lugar_trabajo_padre',
            // 'ingreso_mensual_padre',
            // 'direccion_trabajo_padre',
            // 'correo_e_padre',
            // 'direccion_habitacion_padre',
            // 'apellidos_madre',
            // 'nombres_madre',
            // 'cedula_madre',
            // 'grado_instruccion_madre',
            // 'telefono_fijo_madre',
            // 'telefono_celular_madre',
            // 'profesion_madre',
            // 'ocupacion_madre',
            // 'lugar_trabajo_madre',
            // 'ingreso_mensual_madre',
            // 'direccion_trabajo_madre',
            // 'correo_e_madre',
            // 'direccion_habitacion_madre',
            // 'apellidos_representante',
            // 'nombres_representante',
            // 'cedula_representante',
            // 'grado_instruccion_representante',
            // 'telefono_fijo_representante',
            // 'telefono_celular_representante',
            // 'profesion_representante',
            // 'ocupacion_representante',
            // 'lugar_trabajo_representante',
            // 'ingreso_mensual_representante',
            // 'direccion_trabajo_representante',
            // 'correo_e_representante',

            //['class' => 'yii\grid\ActionColumn'],
            [
			  'class' => 'yii\grid\ActionColumn',
			  'template' => '{Imprimir}',
			  'buttons' => [
				'Imprimir' => function ($url, $model) {
					return Html::a('<span class="glyphicon glyphicon-print"></span>', $url, [
								'title' => Yii::t('app', 'Imprimir'),
					]);
				}
			  ],
			  'urlCreator' => function ($action, $model, $key, $index) {
				if ($action === 'Imprimir') {
					$url =Yii::$app->urlManager->createUrl(['reportes/datos-socio-economicos', 'codigo_proceso' => $model->idProceso->codigo]);
					//Yii::$app->urlManager->createUrl(['inscripciones/get-planteles'])
					return $url;
				}
			  }
			],
        ],
    ]); ?>  
  </div> -->
  
  	  
</div>
    

</div>

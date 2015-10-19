<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Procesos;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InscripcionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Abrir / Cerrar inscripción';
//$this->params['breadcrumbs'][] = $this->title;

?>
<div class="inscripciones-index">

    <h1><?= Html::encode($this->title) . " " . Html::encode(Procesos::getProcesoAbierto()->nombre)?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>
        <?= Html::a('Create Inscripciones', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
				'header' => 'Nº Planilla',
				'attribute' => 'id',
			],
			'codPlantel.codMunicipio.municipio',
			[
				'attribute' => 'cedula',
				'value' => 'idEstudiante.cedula'
			],
            //'id_proceso',
            //'idEstudiante.nombre',
            //'idEstudiante.apellido',
            [
				'header' => 'Nombre',
				'attribute' => 'idEstudiante.nombre',
			],
			[
				'header' => 'Apellido',
				'attribute' => 'idEstudiante.apellido',
			],
			'estudioSocioEconomico.telefono_fijo_solicitante',
            //'fecha_inscripcion',
            //'codigo_plantel',
            // 'localidad_plantel',
            // 'codigo_ultimo_grado',
            // 'postulado_para',
            // 'promedio',
            // 'nota1',
            // 'nota2',
            // 'nota3',
            // 'codigo_profesion_jefe_familia',
            // 'codigo_nivel_instruccion_madre',
            // 'codigo_fuente_ingreso_familia',
            // 'codigo_vivienda_familia',
            // 'codigo_ingreso_familia',
            // 'codigo_grupo_familiar',
            /*[
				'header' => 'Estatus',
				'attribute' => function($model) {
									return $model->cerrada ? "Abierta": "Cerrada";
								}
			],*/
			/*[
				'header' => 'Teléfono celular',
				'attribute' => 'EstudioSocioEconomicos',
			],*/

            [
				'class' => 'yii\grid\ActionColumn',
				'template' => '{view}',
				'buttons' => [
					'view' => function ($url, $model) {
						$label = $model->cerrada ? 'Abrir' : 'Cerrar';
						$boton = $model->cerrada ? 'btn-warning' : 'btn-primary';
						return Html::a($label, $url, [
                                        'title' => $label,
                                        'class' => 'btn '.$boton,
                                        'data-confirm' => '¿Está seguro de '.$label.' la inscripción?',
                                        //'data-method' => 'post',
                                        //'data' => ['id'=>$model->id],
                                ]);
					},					
				],
				'urlCreator' => function ($action, $model, $key) {
					if ($action === 'view') {
						return Yii::$app->urlManager->createUrl(['/inscripciones/abrir-cerrar', 'id'=>$model->id]);
					}
				}
			],
        ],
    ]); ?>

</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Procesos;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InscripcionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Abrir / Cerrar inscripción';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inscripciones-index">

    <h1><?= Html::encode($this->title)?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>
        <?= Html::a('Create Inscripciones', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

<?php \yii\widgets\Pjax::begin([
						'id' => 'pjax-a-c',
						'timeout' => false,
						'enablePushState' => false,
					]); ?>
    <?= GridView::widget([
		'id' => 'a-c',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
				'header' => 'Nº Planilla',
				'attribute' => 'id',
			],
			[
				'header' => 'Municipio',
				'attribute' => 'codPlantel.codMunicipio.municipio',
			],
			[
				'header' => 'Cédula',
				'attribute' => 'cedula',
				'value' => 'idEstudiante.cedula'
			],
            [
				'header' => 'Nombre',
				'attribute' => 'idEstudiante.nombre',
			],
			[
				'header' => 'Apellido',
				'attribute' => 'idEstudiante.apellido',
			],
			[
				'header' => 'Teléfono representante',
				'attribute' => 'estudioSocioEconomico.telefono_fijo_representante',
			],
			[
				'header' => 'Celular representante',
				'attribute' => 'estudioSocioEconomico.telefono_celular_representante',
			],
			[
				'header' => 'Correo electrónico',
				'attribute' => 'idEstudiante.user.email',
			],
			[
				'header' => 'Cerrada/Abierta',
				'attribute' => 'cerrada',
				'value' => function ($model){
								return $model->cerrada ? 'Cerrada': 'Abierta';
							},
				'filter' => Html::activeDropDownList($searchModel, 'cerrada', array('0' => 'Abierta', '1' => 'Cerrada'),['class'=>'form-control','prompt' => 'Seleccione']),
			],
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
				'template' => '{view} {imprimir}',
				'buttons' => [
					'view' => function ($url, $model) {
						$label = $model->cerrada ? '<strong>A</strong>' : '<strong>C</strong>';
						$title = $model->cerrada ? 'Abrir la inscripción' : 'Cerrar la inscripción';
						$boton = $model->cerrada ? 'btn-warning' : 'btn-primary';
						return Html::a($label, $url, [
                                        'title' => $title,
                                        'class' => 'btn '.$boton,
                                        'data-confirm' => '¿Está seguro de '.$title.'?',
                                        'data-pjax-container' => '#pjax-a-c',
                                        //'data-method' => 'post',
                                        //'data' => ['id'=>$model->id],
                                ]);
					},
					'imprimir' => function ($url, $model) {
						return Html::a('<span class="glyphicon glyphicon-print"></span>', $url, [
                                        'title' => 'Imprimir Inscripción',
                                        'data-pjax' => 0,
                                ]);
					},					
				],
				'urlCreator' => function ($action, $model, $key) {
					if ($action === 'view') {
						return Yii::$app->urlManager->createUrl(['/admin-inscripciones/abrir-cerrar', 'id'=>$model->id]);
					}
					
					if ($action === 'imprimir') {
						return Yii::$app->urlManager->createUrl(['/admin-reportes/inscripcion', 'id_estudiante'=>$model->id_estudiante]);
					}
				}
			],
        ],
    ]); ?>
<?php \yii\widgets\Pjax::end(); ?>
</div>

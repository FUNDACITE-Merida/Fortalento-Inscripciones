<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\EstudioSocioEconomicoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Estudio Socio Economicos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estudio-socio-economico-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Estudio Socio Economico'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_proceso',
            'id_estudiante',
            'n_planilla_inscripcion',
            'codigo_ultimo_grado',
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
            // 'direccion_habitacion_representante',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>

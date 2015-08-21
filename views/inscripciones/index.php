<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InscripcionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inscripciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inscripciones-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Inscripciones', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_proceso',
            'id_estudiante',
            'fecha_inscripcion',
            'codigo_plantel',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

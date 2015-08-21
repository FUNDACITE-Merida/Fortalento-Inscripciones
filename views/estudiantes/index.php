<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EstudiantesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estudiantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estudiantes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Estudiantes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cedula',
            'nombre',
            'apellido',
            'fecha_nacimiento',
            // 'lugar_nacimiento',
            // 'genero',
            // 'es_venezolano:boolean',
            // 'id_user',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProcesosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Procesos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="procesos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Procesos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'codigo',
            'nombre',
            'fecha_inicio',
            'fecha_fin',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

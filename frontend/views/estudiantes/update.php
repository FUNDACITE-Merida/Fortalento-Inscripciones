<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Estudiantes */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Estudiantes',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estudiantes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="estudiantes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

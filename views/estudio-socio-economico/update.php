<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstudioSocioEconomico */

$this->title = 'Update Estudio Socio Economico: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Estudio Socio Economicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estudio-socio-economico-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

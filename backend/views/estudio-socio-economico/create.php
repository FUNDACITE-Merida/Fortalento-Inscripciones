<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\EstudioSocioEconomico */

$this->title = Yii::t('app', 'Create Estudio Socio Economico');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estudio Socio Economicos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estudio-socio-economico-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

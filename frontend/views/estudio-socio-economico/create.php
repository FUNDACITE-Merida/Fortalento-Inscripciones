<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\EstudioSocioEconomico */

$this->title = Yii::t('app', 'Datos de estudio socio económico');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estudio Socio Economicos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estudio-socio-economico-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'estudiante' => $estudiante,
        'estudianteInscripcion' => $estudianteInscripcion,
        'estudianteCorreo' => $estudianteCorreo,
    ]) ?>

</div>

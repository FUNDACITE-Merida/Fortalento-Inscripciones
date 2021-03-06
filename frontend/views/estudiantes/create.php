<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Estudiantes */

$this->title = Yii::t('app', 'Datos del Estudiante');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estudiantes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estudiantes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

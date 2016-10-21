<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Procesos */

$this->title = Yii::t('app', 'Create Procesos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Procesos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="procesos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

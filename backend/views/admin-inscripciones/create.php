<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Inscripciones */

$this->title = Yii::t('app', 'Create Inscripciones');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inscripciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inscripciones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

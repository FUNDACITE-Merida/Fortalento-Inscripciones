<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<h1>Cargar inscripciones</h1>

<?php $form = ActiveForm::begin([
     "method" => "post",
     "enableClientValidation" => true,
     "options" => ["enctype" => "multipart/form-data"],
     ]);
?>

<?= $form->field($model, "file")->fileInput() ?>

<?= Html::submitButton("Cargar", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>
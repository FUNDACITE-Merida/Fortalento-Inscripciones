<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model common\models\Estudiantes */
/* @var $form yii\widgets\ActiveForm */

$this->registerJs("
$('#estudiantes-no_cedula').change(function() {
			if ($(this).is(':checked')) 
			{
				$('#estudiantes-cedula').prop('readonly', true);
				$('#estudiantes-repetir_cedula').prop('readonly', true);
			}
			else
			{
				$('#estudiantes-cedula').prop('readonly', false);
				$('#estudiantes-repetir_cedula').prop('readonly', false);
			}			
		});
", 
View::POS_READY, 
'my-options');

$sincedula = false;
if ($model->no_cedula == true)
	$sincedula = true;
?>

<div class="estudiantes-form">

    <?php $form = ActiveForm::begin(); ?>

	<div class="row">
	  <div class="col-lg-5 col-md-10">
		<?= $form->field($model, 'apellido')->textInput(['maxlength' => true])->hint('Escriba el primer apellido e inicial del segundo') ?>
	  </div>
	  <div class="col-lg-5 col-md-10">
		<?= $form->field($model, 'nombre')->textInput(['maxlength' => true])->hint('Escriba el primer nombre e inicial del segundo') ?>
	  </div>	  
	</div>
    
    <div class="row">
	  <div class="col-lg-5 col-md-10">
		  <?= $form->field($model, 'cedula')->textInput(['maxlength' => true, 'readonly' => $sincedula]) ?>
		  
		  <?= $form->field($model, 'repetir_cedula')->textInput(['value'=>$model->cedula,'maxlength' => true, 'readonly' => $sincedula]) ?>
		 		
		  <?= $form->field($model, 'no_cedula')->checkbox() ?>
	  </div>
	  <div class="col-lg-5 col-md-10">
		<?= $form->field($model, 'es_venezolano')->radioList(['1' => 'Venezolana', '0' => 'Extranjera']) ?>
	  </div>	  
	</div>
    
	<div class="row">
	  <div class="col-lg-5 col-md-10">
		<?= $form->field($model, 'fecha_nacimiento')->textInput()->hint('Ejemplo: 16-07-1980') ?>
	  </div>
	  <div class="col-lg-5 col-md-10">
		<?= $form->field($model, 'lugar_nacimiento')->textInput(['maxlength' => true])?>
	  </div>	  
	</div>
	
    <div class="row">
	  <div class="col-lg-5 col-md-10">
		<?= $form->field($model, 'genero')->radioList(['F' => 'Femenino', 'M' => 'Masculino']) ?>
	  </div>
	</div>

  <div class="form-group">
      <?= Html::submitButton('Siguiente <span class="glyphicon glyphicon-arrow-right"></span>', ['class' => 'btn btn-primary']) ?>
  </div>
  <?php ActiveForm::end(); ?>
</div>

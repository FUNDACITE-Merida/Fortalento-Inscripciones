<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstudioSocioEconomico */
/* @var $form yii\widgets\ActiveForm */

// Grados se amarró a código ya que en la tabla hay grados que no 
// están participando en este proceso. Es necesario adecuar el código
// en este sistema para excluir esos grados y lograr eliminar este código
// amarrado
$grados = array(
			'6' => '6to. Grado',
			'7' => '1er. Año',
			'8' => '2do. Año',
			'9' => '3er. Año',
			'10' => '4to. Año',
			'11' => '5to. Año',
			'12' => '6to. Año',
		  );
$nivelInstruccion = array(
			'1' => 'Primaria',
			'2' => 'Secundaria',
			'3' => 'Superior',
		  );
?>

<div class="estudio-socio-economico-form">

    <?php $form = ActiveForm::begin(); ?>

    <fieldset>
	  <legend>Datos del solicitante</legend>
	  <div class="row">
	  <div class="col-lg-6 col-md-10">
		  <?= $form->field($estudiante, 'apellido')->textInput(['readonly' => true]); ?>
	  </div>
	  <div class="col-lg-6 col-md-10">
		  <?= $form->field($estudiante, 'nombre')->textInput(['readonly' => true]); ?>
	  </div>	  
	</div>
	<div class="row">
	  <div class="col-lg-3 col-md-10">
		<?= $form->field($estudiante, 'cedula')->textInput(['readonly' => true]) ?>
	  </div>
	  <div class="col-lg-3 col-md-10">
		<?= $form->field($model, 'telefono_fijo_solicitante')
						->textInput(['maxlength' => true])
						->hint('Ejemplo: 02742447111'); ?>
	  </div>
	  <div class="col-lg-3 col-md-10">
		<?= $form->field($model, 'telefono_celular_solicitante')
						->textInput(['maxlength' => true])
						->hint('Ejemplo: 04161115555'); ?>
	  </div>
	  <div class="col-lg-3 col-md-10">
		  <?= $form->field($model, 'vive_con_padres_solicitante')->radioList(['1' => 'Si', '0' => 'No']) ?>
	  </div>
	</div>
	<div class="row">
	  <div class="col-lg-3 col-md-10">
		<?= $form->field($estudianteInscripcion, 'id')->textInput(['readonly' => true]) ?>
	  </div>
	  <div class="col-lg-3 col-md-10">
		<?= Html::label('Último año/grado culminado', 'gradoCulminado', ['class' => 'control-label']) ?>
		<?= Html::input('text', 'gradoCulminado', $grados[$estudianteInscripcion->codigo_ultimo_grado],
						['class' => 'form-control',
						 'readonly' => true,
						]) ?>
	  </div>
	  <div class="col-lg-6 col-md-10">
		<?= Html::label('Correo electrónico', 'correo-e', ['class' => 'control-label']) ?>
		<?= Html::input('text', 'correo-e', $estudianteCorreo->email,
						['class' => 'form-control',
						 'readonly' => true,
						]) ?>
	  </div>
	</div>
    <?//= $form->field($model, 'id_proceso')->textInput() ?>

    <?//= $form->field($model, 'id_estudiante')->textInput() ?>
    </fieldset>

	</br></br>
	<fieldset>
	  <legend>Datos del padre</legend>
		<div class="row">
		  <div class="col-lg-6 col-md-10">
			  <?= $form->field($model, 'apellidos_padre')->textInput(['maxlength' => true]) ?>
		  </div>
		  <div class="col-lg-6 col-md-10">		
			<div class="form-group">
			  <?= $form->field($model, 'nombres_padre')->textInput(['maxlength' => true]) ?>
			</div>
		  </div>	  
		</div>
		
		<div class="row">
		  <div class="col-lg-3 col-md-10">
			  <?= $form->field($model, 'cedula_padre')->textInput(['maxlength' => true]) ?>
		  </div>
		  <div class="col-lg-3 col-md-10">
			  <?= $form->field($model, 'grado_instruccion_padre')->dropdownList(
					$nivelInstruccion
					); ?>
		  </div>	  
		  <div class="col-lg-3 col-md-10">
			  <!-- TODO: FALTAN VALIDACIONES DE TODOS LOS TELEFONOS -->
			  <?= $form->field($model, 'telefono_fijo_padre')
							->textInput(['maxlength' => true])
							->hint('Ejemplo: 02742447111'); ?>
		  </div>
		  <div class="col-lg-3 col-md-10">		
			  <?= $form->field($model, 'telefono_celular_padre')
							->textInput(['maxlength' => true])
							->hint('Ejemplo: 04161115555'); ?>
		  </div>
		</div>
		
		<div class="row">
		  <div class="col-lg-3 col-md-10">
			  <?= $form->field($model, 'profesion_padre')->textInput(['maxlength' => true]) ?>
		  </div>
		  <div class="col-lg-3 col-md-10">
			  <?= $form->field($model, 'ocupacion_padre')->textInput(['maxlength' => true]) ?>
		  </div>	  
		  <div class="col-lg-3 col-md-10">
			  <?= $form->field($model, 'lugar_trabajo_padre')->textInput(['maxlength' => true]) ?>
		  </div>
		  <div class="col-lg-3 col-md-10">		
			  <?= $form->field($model, 'ingreso_mensual_padre')->textInput() ?>
		  </div>
		</div>
		
		<div class="row">
		  <div class="col-lg-6 col-md-10">
			  <?= $form->field($model, 'direccion_trabajo_padre')->textInput(['maxlength' => true]) ?>
		  </div>
		  <div class="col-lg-6 col-md-10">
			  <!-- TODO: FALTAN VALIDACIONES DE TODOS LOS CORREOS -->
			  <?= $form->field($model, 'correo_e_padre')->textInput(['maxlength' => true]) ?>
		  </div>
		</div>
		

		<div class="row">
		  <div class="col-lg-12 col-md-10">
			  <?= $form->field($model, 'direccion_habitacion_padre')->textInput(['maxlength' => true]) ?>
		  </div>
		</div>
    </fieldset>
	
	
	</br></br>
    <fieldset>
	  <legend>Datos de la madre</legend>
	  <div class="row">
		  <div class="col-lg-6 col-md-10">
			  <?= $form->field($model, 'apellidos_madre')->textInput(['maxlength' => true]) ?>
		  </div>
		  <div class="col-lg-6 col-md-10">		
			<div class="form-group">
			  <?= $form->field($model, 'nombres_madre')->textInput(['maxlength' => true]) ?>
			</div>
		  </div>	  
		</div>
		
		<div class="row">
		  <div class="col-lg-3 col-md-10">
			   <?= $form->field($model, 'cedula_madre')->textInput(['maxlength' => true]) ?>
		  </div>
		  <div class="col-lg-3 col-md-10">
			  <?= $form->field($model, 'grado_instruccion_madre')->dropdownList(
					$nivelInstruccion
					); ?>
		  </div>	  
		  <div class="col-lg-3 col-md-10">
			  <!-- TODO: FALTAN VALIDACIONES DE TODOS LOS TELEFONOS -->
			  <?= $form->field($model, 'telefono_fijo_madre')
							->textInput(['maxlength' => true])
							->hint('Ejemplo: 02742447111'); ?>
		  </div>
		  <div class="col-lg-3 col-md-10">		
			  <?= $form->field($model, 'telefono_celular_madre')
							->textInput(['maxlength' => true])
							->hint('Ejemplo: 04161115555');?>
		  </div>
		</div>
		
		<div class="row">
		  <div class="col-lg-3 col-md-10">
			  <?= $form->field($model, 'profesion_madre')->textInput(['maxlength' => true]) ?>
		  </div>
		  <div class="col-lg-3 col-md-10">
			  <?= $form->field($model, 'ocupacion_madre')->textInput(['maxlength' => true]) ?>
		  </div>	  
		  <div class="col-lg-3 col-md-10">
			  <?= $form->field($model, 'lugar_trabajo_madre')->textInput(['maxlength' => true]) ?>
		  </div>
		  <div class="col-lg-3 col-md-10">		
			  <?= $form->field($model, 'ingreso_mensual_madre')->textInput() ?>
		  </div>
		</div>
		
		<div class="row">
		  <div class="col-lg-6 col-md-10">
			  <?= $form->field($model, 'direccion_trabajo_madre')->textInput(['maxlength' => true]) ?>
		  </div>
		  <div class="col-lg-6 col-md-10">
			  <!-- TODO: FALTAN VALIDACIONES DE TODOS LOS CORREOS -->
			  <?= $form->field($model, 'correo_e_madre')->textInput(['maxlength' => true]) ?>
		  </div>
		</div>

		<div class="row">
		  <div class="col-lg-12 col-md-10">
			  <?= $form->field($model, 'direccion_habitacion_madre')->textInput(['maxlength' => true]) ?>
		  </div>
		</div>
	</fieldset>

    
	</br></br>
    <fieldset>
	  <legend>Datos del representante</legend>
	  <div class="row">
		  <div class="col-lg-6 col-md-10">
			  <?= $form->field($model, 'apellidos_representante')->textInput(['maxlength' => true]) ?>
		  </div>
		  <div class="col-lg-6 col-md-10">		
			<div class="form-group">
			  <?= $form->field($model, 'nombres_representante')->textInput(['maxlength' => true]) ?>
			</div>
		  </div>	  
		</div>
		
		<div class="row">
		  <div class="col-lg-3 col-md-10">
			   <?= $form->field($model, 'cedula_representante')->textInput(['maxlength' => true]) ?>
		  </div>
		  <div class="col-lg-3 col-md-10">
			  <?= $form->field($model, 'grado_instruccion_representante')->dropdownList(
					$nivelInstruccion
					); ?>
		  </div>	  
		  <div class="col-lg-3 col-md-10">
			  <!-- TODO: FALTAN VALIDACIONES DE TODOS LOS TELEFONOS -->
			  <?= $form->field($model, 'telefono_fijo_representante')
							->textInput(['maxlength' => true])
							->hint('Ejemplo: 02742447111');?>
		  </div>
		  <div class="col-lg-3 col-md-10">		
			  <?= $form->field($model, 'telefono_celular_representante')
							->textInput(['maxlength' => true])
							->hint('Ejemplo: 04161115555'); ?>
		  </div>
		</div>
		
		<div class="row">
		  <div class="col-lg-3 col-md-10">
			  <?= $form->field($model, 'profesion_representante')->textInput(['maxlength' => true]) ?>
		  </div>
		  <div class="col-lg-3 col-md-10">
			  <?= $form->field($model, 'ocupacion_representante')->textInput(['maxlength' => true]) ?>
		  </div>	  
		  <div class="col-lg-3 col-md-10">
			  <?= $form->field($model, 'lugar_trabajo_representante')->textInput(['maxlength' => true]) ?>
		  </div>
		  <div class="col-lg-3 col-md-10">		
			  <?= $form->field($model, 'ingreso_mensual_representante')->textInput() ?>
		  </div>
		</div>
		
		<div class="row">
		  <div class="col-lg-6 col-md-10">
			  <?= $form->field($model, 'direccion_trabajo_representante')->textInput(['maxlength' => true]) ?>
		  </div>
		  <div class="col-lg-6 col-md-10">
			  <!-- TODO: FALTAN VALIDACIONES DE TODOS LOS CORREOS -->
			   <?= $form->field($model, 'correo_e_representante')->textInput(['maxlength' => true]) ?>
		  </div>
		</div>
	</fieldset>
    
    <div class="form-group">
        <?//= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::submitButton('Finalizar inscripción', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

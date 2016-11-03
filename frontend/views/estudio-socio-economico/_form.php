<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Alert;

use common\models\EstudioSocioEconomico;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model common\models\EstudioSocioEconomico */
/* @var $form yii\widgets\ActiveForm */

$this->registerJs("
	$('#".Html::getInputId($model, 'es_representante')."').change(function() {
			// Representante es OTRO
			if ($(this).val() == 0){
				$('#datos-representante').show();
			}
			
			if ($(this).val() == 1){
				$('#datos-representante').hide();
			}

			if ($(this).val() == 2){
				$('#datos-representante').hide();
			}
		});
", 
View::POS_READY, 
'my-options');

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
			'' => '-- Seleccione --',
			'1' => 'Primaria',
			'2' => 'Secundaria',
			'3' => 'Superior',
		  );
?>

<div class="estudio-socio-economico-form">
	<?php if (Yii::$app->session->hasFlash('guardado')):?>
		<?= Alert::widget([
				'options' => [
					'class' => 'alert-info',
				],
				'body' => 'La inscripción se ha guardado exitosamente. Por favor cierre la página haciendo click en el siguiente enlace. El sistema generará una planilla para su respaldo ' . Html::a('Cerrar', ['inscripciones/cerrar-e-imprimir'], ['class' => 'btn btn-danger', 'role' => 'button']),
				'closeButton' => false,
			]);?>
	<?php endif; ?>
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
			  <?= $form->field($model, 'profesion_padre')->textInput(['maxlength' => true])->hint('Ejemplo: bachiller,  técnico en electrónica, licenciado, ingeniero o afines.'); ?>
		  </div>
		  <div class="col-lg-3 col-md-10">
			  <?= $form->field($model, 'ocupacion_padre')->textInput(['maxlength' => true])->hint('Ejemplo: analista, mecánico, chofer, obrero, trabajador de la agrícultura, maestro, entre otras.'); ?>
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
			  <?= $form->field($model, 'profesion_madre')->textInput(['maxlength' => true])->hint('Ejemplo: bachiller,  técnico en informática, licenciada, ingeniero o afines.'); ?>
		  </div>
		  <div class="col-lg-3 col-md-10">
			  <?= $form->field($model, 'ocupacion_madre')->textInput(['maxlength' => true])->hint('Ejemplo: analista, obrera, trabajadora de la agrícultura, maestra, ama de casa, entre otras.'); ?>
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
		  <div class="col-lg-12 col-md-10">
			  <?= $form->field($model, 'es_representante')->dropdownList(
					$model->es_representante_data)
					->hint('Si el representante no es la madre o el padre deberás ingresar la información del representante'); ?>
		  </div>
		</div>
		<div id="datos-representante">
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
			  <?= $form->field($model, 'profesion_representante')->textInput(['maxlength' => true])->hint('Ejemplo: bachiller,  técnico en electrónica, licenciado, ingeniero o afines.'); ?>
		  </div>
		  <div class="col-lg-3 col-md-10">
			  <?= $form->field($model, 'ocupacion_representante')->textInput(['maxlength' => true])->hint('Ejemplo: analista, mecánico, chofer, obrero, trabajador de la agrícultura, maestro, entre otras.'); ?>
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
		<div class="row">
		  <div class="col-lg-12 col-md-10">
			  <?= $form->field($model, 'direccion_habitacion_representante')->textInput(['maxlength' => true]) ?>
		  </div>
		</div>
	</div> <!-- Datos del representante --> 
	</fieldset>
    
    <div class="form-group">
		<?= Html::a('<span class="glyphicon glyphicon-arrow-left"></span> Datos de inscripción', ['inscripciones/create'], ['class' => 'btn btn-default', 'role' => 'button']) ?>
        <?= Html::submitButton('Guardar inscripción', ['class' => 'btn btn-primary']) ?>        
    </div>

    <?php ActiveForm::end(); ?>

</div>

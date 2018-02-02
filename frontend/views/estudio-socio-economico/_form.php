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
			'3' => 'Universitario',
		  );
		  
$tipoCuentaBancaria = array(
			'' => '-- Seleccione --',
			'Ahorro' => 'Ahorro',
			'Corriente' => 'Corriente',
		  );		  
		
$bancos = array(
			'' => '-- Seleccione --',
			'Banco de Venezuela' => 'Banco de Venezuela',
			'Banco Venezolano de Crédito' => 'Banco Venezolano de Crédito',
			'Banco Mercantil' => 'Banco Mercantil',
			'Banco Provincial' => 'Banco Provincial',
			'Bancaribe' => 'Bancaribe',
			'Banco Exterior' => 'Banco Exterior',
			'Banco Occidental de Descuento' => 'Banco Occidental de Descuento',
			'Banco Caroní' => 'Banco Caroní',
			'Banesco' => 'Banesco',
			'Banco Sofitasa' => 'Banco Sofitasa',
			'Banco Plaza' => 'Banco Plaza',
			'Bangente' => 'Bangente',
			'Banco Fondo Común' => 'Banco Fondo Común',
			'100% Banco' => '100% Banco',
			'Banco del Sur' => 'Banco del Sur',
			'Banco del Tesoro' => 'Banco del Tesoro',
			'Banco Agrícola de Venezuela' => 'Banco Agrícola de Venezuela',
			'Bancrecer' => 'Bancrecer',
			'Mi Banco' => 'Mi Banco',
			'Banco Activo' => 'Banco Activo',
			'Bancamiga' => 'Bancamiga',
			'Banco Internacional de Desarrollo' => 'Banco Internacional de Desarrollo',
			'Banplus' => 'Banplus',
			'Banco Bicentenario' => 'Banco Bicentenario',
			'Banco de la Fuerza Armada Nacional Bolivariana' => 'Banco de la Fuerza Armada Nacional Bolivariana',
			'Citibank' => 'Citibank',
			'Banco Nacional de Crédito' => 'Banco Nacional de Crédito',
			'Instituto Municipal de Crédito Popular' => 'Instituto Municipal de Crédito Popular',
			'ITALCAMBIO Casa de Cambio' => 'ITALCAMBIO Casa de Cambio',
		);		  		  
?>

<div class="estudio-socio-economico-form">
	<?php if (Yii::$app->session->hasFlash('guardado')):?>
		<?= Alert::widget([
				'options' => [
					'class' => 'alert-info',
				],
				'body' => 'La inscripción se ha guardado exitosamente. Recuerda consignar solo la copia del boletín de acuerdo a la modalidad que este aspirando (Incentivo al Alto Rendimiento Estudiantil o Premio de Reconocimiento a la Excelencia), o enviarla al siguiente correo: programafortalento.fundacite@gmail.com. Por favor cierre la página haciendo click en el siguiente enlace. El sistema generará una planilla para su respaldo ' . Html::a('Cerrar inscripción', ['inscripciones/cerrar-e-imprimir'], ['class' => 'btn btn-danger', 'role' => 'button']),
				'closeButton' => false,
			]);?>
	<?php endif; ?>
    <?php $form = ActiveForm::begin(); ?>
<!--No se visualizan los datos del solicitante para el proceso 2017-2018-->

    <fieldset>
	  <legend>Datos de contacto del solicitante</legend>
	  <div class="row">
<!--	  <div class="col-lg-6 col-md-10">
		  <?//= $form->field($estudiante, 'apellido')->textInput(['readonly' => true]); ?>
	  </div>
	  <div class="col-lg-6 col-md-10">
		  <?//= $form->field($estudiante, 'nombre')->textInput(['readonly' => true]); ?>
	  </div>	  
	</div>
	<div class="row">
	  <div class="col-lg-3 col-md-10">
		<?//= $form->field($estudiante, 'cedula')->textInput(['readonly' => true]) ?>
	  </div>-->
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
	  <!--
	  <div class="col-lg-3 col-md-10">
		  <?//= $form->field($model, 'vive_con_padres_solicitante')->radioList(['1' => 'Si', '0' => 'No']) ?>
	  </div>-->
	</div>
	<!--<div class="row">
	  <div class="col-lg-3 col-md-10">
		<?//= $form->field($estudianteInscripcion, 'id')->textInput(['readonly' => true]) ?>
	  </div>
	  <div class="col-lg-3 col-md-10">
		<?//= Html::label('Último año/grado culminado', 'gradoCulminado', ['class' => 'control-label']) ?>
		<?/*= Html::input('text', 'gradoCulminado', $grados[$estudianteInscripcion->codigo_ultimo_grado],
						['class' => 'form-control',
						 'readonly' => true,
						]) */?>
	  </div>
	  <div class="col-lg-6 col-md-10">
		<?//= Html::label('Correo electrónico', 'correo-e', ['class' => 'control-label']) ?>
		<?/*= Html::input('text', 'correo-e', $estudianteCorreo->email,
						['class' => 'form-control',
						 'readonly' => true,
						])*/ ?>
	  </div>
-->
    </fieldset>

	</br></br>
	
<!-- No se solicitan los datos del padre para el proceso 2017-2018 -->
<!--
	<fieldset>
	  <legend>Datos del padre</legend>
		<div class="row">
		  <div class="col-lg-6 col-md-10">
			  <?//= $form->field($model, 'apellidos_padre')->textInput(['maxlength' => true]) ?>
		  </div>
		  <div class="col-lg-6 col-md-10">		
			<div class="form-group">
			  <?//= $form->field($model, 'nombres_padre')->textInput(['maxlength' => true]) ?>
			</div>
		  </div>	  
		</div>
		
		<div class="row">
		  <div class="col-lg-3 col-md-10">
			  <?//= $form->field($model, 'cedula_padre')->textInput(['maxlength' => true]) ?>
		  </div>
		  <div class="col-lg-3 col-md-10">
			  <?/*= $form->field($model, 'grado_instruccion_padre')->dropdownList(
					$nivelInstruccion
					); */ ?>
		  </div>	  
		  <div class="col-lg-3 col-md-10">  -->
			  <!-- TODO: FALTAN VALIDACIONES DE TODOS LOS TELEFONOS -->
<!--
			  <?/*= $form->field($model, 'telefono_fijo_padre')
							->textInput(['maxlength' => true])
							->hint('Ejemplo: 02742447111');*/ ?>
		  </div>
		  <div class="col-lg-3 col-md-10">		
			  <?/*= $form->field($model, 'telefono_celular_padre')
							->textInput(['maxlength' => true])
							->hint('Ejemplo: 04161115555');*/ ?>
		  </div>
		</div>
		
		<div class="row">
		  <div class="col-lg-3 col-md-10">
			  <?//= $form->field($model, 'profesion_padre')->textInput(['maxlength' => true])->hint('Ejemplo: bachiller,  técnico en electrónica, licenciado, ingeniero o afines.'); ?>
		  </div>
		  <div class="col-lg-3 col-md-10">
			  <?//= $form->field($model, 'ocupacion_padre')->textInput(['maxlength' => true])->hint('Ejemplo: analista, mecánico, chofer, obrero, trabajador de la agrícultura, maestro, entre otras.'); ?>
		  </div>	  
		  <div class="col-lg-3 col-md-10">
			  <?//= $form->field($model, 'lugar_trabajo_padre')->textInput(['maxlength' => true]) ?>
		  </div>
		  <div class="col-lg-3 col-md-10">		
			  <?//= $form->field($model, 'ingreso_mensual_padre')->textInput() ?>
		  </div>
		</div>
		
		<div class="row">
		  <div class="col-lg-6 col-md-10">
			  <?//= $form->field($model, 'direccion_trabajo_padre')->textInput(['maxlength' => true]) ?>
		  </div>
		  <div class="col-lg-6 col-md-10">
-->		  
			  <!-- TODO: FALTAN VALIDACIONES DE TODOS LOS CORREOS -->
<!--			  
			  <?//= $form->field($model, 'correo_e_padre')->textInput(['maxlength' => true]) ?>
		  </div>
		</div>
		

		<div class="row">
		  <div class="col-lg-12 col-md-10">
			  <?//= $form->field($model, 'direccion_habitacion_padre')->textInput(['maxlength' => true]) ?>
		  </div>
		</div>
    </fieldset>
-->	
<!-- No se solicitan los datos de la madre para el proceso 2017-2018 -->
<!--
	</br></br>
    <fieldset>
	  <legend>Datos de la madre</legend>
	  <div class="row">
		  <div class="col-lg-6 col-md-10">
			  <?//= $form->field($model, 'apellidos_madre')->textInput(['maxlength' => true]) ?>
		  </div>
		  <div class="col-lg-6 col-md-10">		
			<div class="form-group">
			  <?//= $form->field($model, 'nombres_madre')->textInput(['maxlength' => true]) ?>
			</div>
		  </div>	  
		</div>
		
		<div class="row">
		  <div class="col-lg-3 col-md-10">
			   <?//= $form->field($model, 'cedula_madre')->textInput(['maxlength' => true]) ?>
		  </div>
		  <div class="col-lg-3 col-md-10">
			  <?/*= $form->field($model, 'grado_instruccion_madre')->dropdownList(
					$nivelInstruccion
					);*/ ?>
		  </div>	  
		  <div class="col-lg-3 col-md-10">
-->		  
			  <!-- TODO: FALTAN VALIDACIONES DE TODOS LOS TELEFONOS -->
<!--			  
			  <?/*= $form->field($model, 'telefono_fijo_madre')
							->textInput(['maxlength' => true])
							->hint('Ejemplo: 02742447111');*/ ?>
		  </div>
		  <div class="col-lg-3 col-md-10">		
			  <?/*= $form->field($model, 'telefono_celular_madre')
							->textInput(['maxlength' => true])
							->hint('Ejemplo: 04161115555');*/?>
		  </div>
		</div>
		
		<div class="row">
		  <div class="col-lg-3 col-md-10">
			  <?//= $form->field($model, 'profesion_madre')->textInput(['maxlength' => true])->hint('Ejemplo: bachiller,  técnico en informática, licenciada, ingeniero o afines.'); ?>
		  </div>
		  <div class="col-lg-3 col-md-10">
			  <?//= $form->field($model, 'ocupacion_madre')->textInput(['maxlength' => true])->hint('Ejemplo: analista, obrera, trabajadora de la agrícultura, maestra, ama de casa, entre otras.'); ?>
		  </div>	  
		  <div class="col-lg-3 col-md-10">
			  <?//= $form->field($model, 'lugar_trabajo_madre')->textInput(['maxlength' => true]) ?>
		  </div>
		  <div class="col-lg-3 col-md-10">		
			  <?//= $form->field($model, 'ingreso_mensual_madre')->textInput() ?>
		  </div>
		</div>
		
		<div class="row">
		  <div class="col-lg-6 col-md-10">
			  <?//= $form->field($model, 'direccion_trabajo_madre')->textInput(['maxlength' => true]) ?>
		  </div>
		  <div class="col-lg-6 col-md-10">
-->		  
			  <!-- TODO: FALTAN VALIDACIONES DE TODOS LOS CORREOS -->
<!--			  
			  <?//= $form->field($model, 'correo_e_madre')->textInput(['maxlength' => true]) ?>
		  </div>
		</div>

		<div class="row">
		  <div class="col-lg-12 col-md-10">
			  <?//= $form->field($model, 'direccion_habitacion_madre')->textInput(['maxlength' => true]) ?>
		  </div>
		</div>
	</fieldset>

    
	</br></br>
-->	
    <fieldset>
	  <legend>Datos del representante</legend>
		<!--<div class="row">
		  <div class="col-lg-12 col-md-10">
			  <?/*= $form->field($model, 'es_representante')->dropdownList(
					$model->es_representante_data)
					->hint('Si el representante no es la madre o el padre deberás ingresar la información del representante'); */?>
		  </div>
		</div>-->
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
			   <?= $form->field($model, 'repetir_cedula_representante')->textInput(['value'=>$model->cedula_representante,'maxlength' => true]) ?>
		  </div>
		  <div class="col-lg-6 col-md-10">
			  <?= $form->field($model, 'grado_instruccion_representante')->dropdownList(
					$nivelInstruccion
					); ?>
		  </div>
		</div>
		  <div class="row">	  
			  <div class="col-lg-6 col-md-10">
				  <!-- TODO: FALTAN VALIDACIONES DE TODOS LOS TELEFONOS -->
				  <?= $form->field($model, 'telefono_fijo_representante')
								->textInput(['maxlength' => true])
								->hint('Ejemplo: 02742447111');?>
			  </div>
			  <div class="col-lg-6 col-md-10">		
				  <?= $form->field($model, 'telefono_celular_representante')
								->textInput(['maxlength' => true])
								->hint('Ejemplo: 04161115555'); ?>
			  </div>
			
		</div>
		<div class="row">
		  <div class="col-lg-6 col-md-10">
			  <!--<?/*= $form->field($model, 'profesion_representante')->textInput(['maxlength' => true])->hint('Ejemplo: bachiller,  técnico en electrónica, licenciado, ingeniero o afines.'); */?>-->
			  <?= $form->field($model, 'profesion_representante')->textInput(['maxlength' => true]); ?>
		  </div>
		  <!--<div class="col-lg-3 col-md-10">
			  <?/*= $form->field($model, 'ocupacion_representante')->textInput(['maxlength' => true])->hint('Ejemplo: analista, mecánico, chofer, obrero, trabajador de la agrícultura, maestro, entre otras.');*/ ?>
		  </div>-->	  
		  <div class="col-lg-6 col-md-10">
			  <?= $form->field($model, 'lugar_trabajo_representante')->textInput(['maxlength' => true]) ?>
		  </div>
		  <!--<div class="col-lg-3 col-md-10">		
			  <?/*= $form->field($model, 'ingreso_mensual_representante')->textInput() */?>
		  </div>-->
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
    
    <!-- Datos bancarios del representante -->
    <fieldset>
	  <legend>Datos bancarios del representante <h5>(El representante debe ser el titular de la cuenta bancaria)</h5></legend>
		<div class="row">
		    <div class="col-lg-3 col-md-10">
			  <?= $form->field($model, 'tipo_cuenta_bancaria_representante')->dropdownList(
					$tipoCuentaBancaria
					); ?>
		  </div>
		    <div class="col-lg-3 col-md-10">
			  <?= $form->field($model, 'banco_representante')->dropdownList(
					$bancos
					); ?>
		  </div>
		  <div class="col-lg-3 col-md-10">
			   <?= $form->field($model, 'cuenta_bancaria_representante')->textInput(['maxlength' => true]) ?>
		  </div>
		  <div class="col-lg-3 col-md-10">
			   <?= $form->field($model, 'repetir_cuenta_bancaria_representante')->textInput(['value'=>$model->cuenta_bancaria_representante,'maxlength' => true]) ?>

		  </div>
		</div>
	</fieldset>	
    
    <div class="form-group">
		<?= Html::a('<span class="glyphicon glyphicon-arrow-left"></span> Datos de inscripción', ['inscripciones/create'], ['class' => 'btn btn-default', 'role' => 'button']) ?>
        <?= Html::submitButton('Guardar inscripción', ['class' => 'btn btn-primary']) ?>        
    </div>

    <?php ActiveForm::end(); ?>

</div>

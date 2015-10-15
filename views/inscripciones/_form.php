<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\bootstrap\Alert;
use yii\web\View;
//use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Inscripciones */
/* @var $form yii\widgets\ActiveForm */
?>

<?php


$labelNota1 = 'Promedio Global 4to Grado';
$labelNota2 = 'Promedio Global 5to Grado';
$labelNota3 = 'Promedio Global 6to Grado';
if ($model->codigo_ultimo_grado == 9)
{
	$labelNota1 = 'Promedio Global 1er Año';
	$labelNota2 = 'Promedio Global 2do Año';
	$labelNota3 = 'Promedio Global 3er Año';
}

if ($model->codigo_ultimo_grado == 11 || $model->codigo_ultimo_grado == 12)
{
	$labelNota1 = 'Promedio Global 4to Año';
	$labelNota2 = 'Promedio Global 5to Año';
	$labelNota3 = 'Promedio Global 6to Año';
}


$urlEscuelas = Yii::$app->urlManager->createUrl(['inscripciones/get-planteles']);
$this->registerJs("

		function verificaGrado(valor)
		{
			var grados = ['6','9','11','12'];
			if ($.inArray(valor, grados) != -1)
				return true;
		}
		
		function cambiaLabelNotas(valor)
		{
			if (valor == '6')
			{
				$('#nota1').text('Promedio Global 4to Grado');
				$('#nota2').text('Promedio Global 5to Grado');
				$('#nota3').text('Promedio Global 6to Grado');
			}
			if (valor == '9')
			{
				$('#nota1').text('Promedio Global 1er Año');
				$('#nota2').text('Promedio Global 2do Año');
				$('#nota3').text('Promedio Global 3er Año');
			}
			if ((valor == '11'))
			{
				$('#nota1').text('Promedio Global 4to Año');
				$('#nota2').text('Promedio Global 5to Año');
				$('#nota3').text('Promedio Global 6to Año');
			}
			
			if ((valor == '12'))
			{
				
				$('#nota1').text('Promedio Global 4to Año');
				$('#nota2').text('Promedio Global 5to Año');
				$('#nota3').text('Promedio Global 6to Año');
			}
		}
		
		$('#inscripciones-codigo_ultimo_grado').data('lastValue', $('#inscripciones-codigo_ultimo_grado').val() ).change(function() {
			
			if ($('#inscripciones-postulado_para_premio').is(':checked'))
			{
				if (verificaGrado($(this).val()))
				{
					//alert('Esta dentro'+ this.value);
					cambiaLabelNotas($('#inscripciones-codigo_ultimo_grado').val());
				}else
				{
					alert('Optan por el Premio de reconocimiento a la excelencia los alumnos que hayan finalizado 6to. Grado '
								+'de Educación Bolivariana, 3er. Año de Educación Secundaria Bolivariana, 5to. Año de Educación Secundaria Bolivariana o '
								+'6to. Año de Educación Secundaria Bolivariana');
					
					//alert('Valor anterior'+ $(this).data('lastValue'));					
					
					$('#inscripciones-codigo_ultimo_grado').val($(this).data('lastValue'));
					$('option[value='+$(this).data('lastValue')+']', this).attr('selected',true);
					
					//alert('Valor select'+ $('#inscripciones-codigo_ultimo_grado').val()	);					
				}
			}
			$(this).data('lastValue', $(this).val());
		});
		
		$('#inscripciones-postulado_para_beca').change(function() {
			if ($(this).is(':checked')) 
			{
				$('#promedio').css('display', 'block');
			}
			else
			{
				$('#promedio').css('display', 'none');
			}			
		});
		
		$('#inscripciones-postulado_para_premio').change(function() {
			if ($(this).is(':checked')) 
			{
				if (verificaGrado($('#inscripciones-codigo_ultimo_grado').val()))
				{
					$('#notas').css('display', 'block');
					cambiaLabelNotas($('#inscripciones-codigo_ultimo_grado').val());
				}else
				{
					alert('Optan por el Premio de reconocimiento a la excelencia los alumnos que hayan finalizado 6to. Grado '
							+'de Educación Bolivariana, 3er. Año de Educación Secundaria Bolivariana, 5to. Año de Educación Secundaria Bolivariana o '
							+'6to. Año de Educación Secundaria Bolivariana');
					$(this).prop('checked', false);
				}
				
			}
			else
			{
				$('#notas').css('display', 'none');
			}			
		});
		
		/*
			En este bloque se valida si el alumno seleccionó en Último grado/año culminado la opción: 5to año 
			y además está seleccionada la opción: Premio de reconocimiento a la excelencia.
			Si ambas están seleccionadas entonces no se debe solicitar notas de 6to año. esto tiene una validación
			adicional en las reglas del modelo.
		*/
		
		$('#inscripciones-postulado_para_premio').change(function() {
			if ($(this).is(':checked')) 
			{
				if ($('#inscripciones-codigo_ultimo_grado').val() == 11)
				{
					$('.field-inscripciones-nota3').css('display', 'none');
				}else
				{
					$('.field-inscripciones-nota3').css('display', 'block');
				}
				
			}			
		});
		
		
		$('#inscripciones-codigo_ultimo_grado').change(function() {
			if ($('#inscripciones-postulado_para_premio').is(':checked')) 
			{
				if ($(this).val() == 11)
				{
					$('.field-inscripciones-nota3').css('display', 'none');
				}else
				{
					$('.field-inscripciones-nota3').css('display', 'block');
				}
				
			}			
		});
		/********/
		// Carga de Escuelas según Municipio
		$('#municipios').bind('change',function(){
			var datos='{'
					+'\"id_municipio\": \"'+$('#municipios').val()+'\"'
					+'}';
			jQuery.ajax({
				url: '".$urlEscuelas."',
				type: 'post',
				async: true,
				contentType: 'application/json',
				data: datos,
				success: function(resp){
					$('#inscripciones-codigo_plantel').html(resp);
					$('#inscripciones-codigo_plantel').trigger('chosen:updated');
				}
			});

		});
		", 
		View::POS_READY, 
		'my-options');		
/*
 * Cuando es llamado por el action Update se precargan
 * valores según lo que el usuario tenga ya guardado
 * en base de datos
 */
 		
$mostrarPromedio = "style='display: none;'";
if ($model->postulado_para_beca)
{
	$mostrarPromedio = "style='display: block;'";
}

$mostrarNotas = "style='display: none;'";
if ($model->postulado_para_premio)
{
	$mostrarNotas = "style='display: block;'";
}


$mostrar6to = 'display: block;';
if (isset($model->postulado_para_premio) && isset($model->codigo_ultimo_grado) && ($model->codigo_ultimo_grado == 11))
{
	$this->registerJs("
		$('.field-inscripciones-nota3').css('display', 'none');
	", 
	View::POS_LOAD, 
	'my-options');
}
/****************/

// Variables que sólo deben ser de lectura
$fechaInscripcion =  $model->fecha_inscripcion;

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
?>
<div class="inscripciones-form">

    <?php $form = ActiveForm::begin(); ?>

    <?//= $form->field($model, 'id_proceso')->textInput() ?>

    <?//= $form->field($model, 'id_estudiante')->textInput() ?>
	<div class="row">
	  <div class="col-lg-6 col-md-10">
		<div class="form-group field-inscripciones-fecha_inscripcion required">
			<?= Html::activeLabel($model, 'fecha_inscripcion', ['class' => 'control-label', 'for' => 'fechaInscripcion' ]) ?>
			<?= Html::input('text', 'fechaInscripcion', $fechaInscripcion, ['class' => 'form-control', 
																			'id' => 'fechaInscripcion',
																			'readonly' => true]) ?>
		<div class="help-block"></div>
		</div>	
		<?//= $form->field($model, 'fecha_inscripcion')->textInput() ?>
	  </div>
	  <div class="col-lg-6 col-md-10">
		 <?= Alert::widget([
				'options' => [
					'class' => 'alert-danger',
				],
				'body' => '<strong>¡Importante!</strong> Para el caso de 4to, 5to y 6to grado de Educación Básica Bolivariana 
							se deben hacer las siguientes equivalencias según el literal de calificación obtenido: 
							A: entre 19 y 20 / B: entre 17 y 18 / C: entre 15 y 16 / D: entre 10 y 14',
				'closeButton' => false,
			]);
		 ?>
	  </div>	  
	</div>    
    
	<div class="row">
	  <div class="col-lg-6 col-md-10">
		<?= $form->field($model, 'localidad_plantel')->textInput(['maxlength' => true]) ?>
	  </div>
	  <div class="col-lg-6 col-md-10">
		<div class="form-group">
			<?= Html::label('Municipio del plantel', 'municipio', ['class' => 'control-label', 'for' => 'municipios']) ?>
			<?= Html::dropDownList('municipios', $cod_municipio,
								ArrayHelper::map($municipios, 'cod_municipio', 'municipio'), 
								['class' => 'form-control',
								 'id' => 'municipios',
								 'prompt' => '-- Seleccione --']) ?>
		</div>
	  </div>	  
	</div>
	
	<div class="row">
	  <div class="col-lg-6 col-md-10">
		<?= $form->field($model, 'codigo_plantel')->dropdownList(
			ArrayHelper::map($planteles, 'cod_pla', 'nom_pla')
			);
		?>
	  </div>
	  <div class="col-lg-6 col-md-10">
		  <?= Html::label('Postulado para', 'postuladoPara', ['class' => 'control-label']) ?>
		  <?= $form->field($model, 'postulado_para_premio')->checkbox(['value' => 'P']) ?>	  
		  <?= $form->field($model, 'postulado_para_beca')->checkbox(['value' => 'B']) ?>	  
		<!-- <div class="form-group field-inscripciones-postulado_para_premio field-inscripciones-postulado_para_beca">
			
			<div class="checkbox">
				<?= Html::activeCheckbox($model, 'postulado_para_premio', ['value' => 'P']) ?>
				<?//= Html::error($model, 'postulado_para_premio') ?>
				<?= Html::activeCheckbox($model, 'postulado_para_beca', ['value' => 'B']) ?>
				<?//= Html::error($model, 'postulado_para_beca') ?>
			</div> -->
			<div class="help-block"></div>
		</div>
	  </div>	  
	</div>
	
    <div class="row">
	  <div class="col-lg-6 col-md-10">
		<?= $form->field($model, 'codigo_ultimo_grado')->dropdownList(
			$grados
			); ?>
	  </div>
	  <div class="col-lg-6 col-md-10">
		 <?= Alert::widget([
				'options' => [
					'class' => 'alert-info',
				],
				'body' => 'Optan por el Premio Beca-Estímulo los estudiantes que han culminado el 6to. Grado de 
		Educación Bolivariana hasta los que han culminado el 5to. Año de Educación
		Secundaria Bolivariana y/o el 6to. Año de Educación Bolivariana (Escuelas Técnicas)',
				'closeButton' => false,
			]);
		 ?>
	  </div>	  
	</div>

	<div id="promedio" class="row" <?= $mostrarPromedio; ?>>
	  <div class="col-lg-6 col-md-10">
		<?= $form->field($model, 'promedio')->textInput()->hint('Ejemplo: 19,457'); ?>
	  </div>
	  <div class="col-lg-6 col-md-10">
		  <?= Alert::widget([
				'options' => [
					'class' => 'alert-info',
				],
				'body' => 'Si está optando por el <strong>Premio beca-estímulo</strong>, indique el promedio de notas obtenido
				en el grado/año culminado',
				'closeButton' => false,
			]);
		 ?>
	  </div>
	</div>
    
	<div id="mensajePremio" class="row">
	  <div class="col-lg-12 col-md-10">
		<?= Alert::widget([
				'options' => [
					'class' => 'alert-warning',
				],
				'body' => 'Optan por el <strong>Premio de reconocimiento a la excelencia</strong> los alumnos que hayan finalizado 6to. Grado
							de Educación Bolivariana, 3er. Año de Educación Secundaria Bolivariana, 5to. Año de Educación Secundaria Bolivariana o
							6to. Año de Educación Secundaria Bolivariana',
				'closeButton' => false,
			]);
		 ?>
	  </div>
	</div>


	<div id="notas" class="row" <?= $mostrarNotas; ?>>
	  <?= Alert::widget([
				'options' => [
					'class' => 'alert-info',
				],
				'body' => 'Si está optando por el <strong>Premio de reconocimiento a la excelencia</strong>, debe indicar el promedio de notas de los tres últimos años.',
				'closeButton' => false,
			]);
		 ?>
	  <div class="col-lg-4 col-md-10">
		<?= $form->field($model, 'nota1')->textInput()->hint('Ejemplo: 19,457')->label($labelNota1,['id'=>'nota1']); ?>
	  </div>
	  <div class="col-lg-4 col-md-10">		
		<?= $form->field($model, 'nota2')->textInput()->hint('Ejemplo: 19,457')->label($labelNota2,['id'=>'nota2']); ?>
	  </div>	  
	  <div class="col-lg-4 col-md-10">		
		<?= $form->field($model, 'nota3')->textInput(['style' => $mostrar6to])->hint('Ejemplo: 19,457')->label($labelNota3,['id'=>'nota3']); ?>
	  </div>
	</div>
	</br></br>
    
    <div class="row">
	  <div class="col-lg-6 col-md-10">
		<?= $form->field($model, 'codigo_profesion_jefe_familia')->dropdownList(
			ArrayHelper::map($profesionJefeFamilia, 'cod_prof_jf', 'descripcion')
			); ?>
			
	  </div>
	  <div class="col-lg-6 col-md-10">		
		<?= $form->field($model, 'codigo_nivel_instruccion_madre')->dropdownList(
			ArrayHelper::map($nivelInstruccionMadre, 'cod_nivel_mad', 'descripcion')
			); ?>
	  </div>	  
	</div>
	<div class="row">
	  <div class="col-lg-6 col-md-10">
		<?= $form->field($model, 'codigo_fuente_ingreso_familia')->dropdownList(
			ArrayHelper::map($fuenteIngreso, 'cod_fuente_ing', 'descripcion')
			)->hint('Si su familia depende de indemnizaciones tales como jubilaciones 
			o pensiones, elija la categoría que tenía cuando trabajaba'); ?>
	  </div>
	  <div class="col-lg-6 col-md-10">		
		<?= $form->field($model, 'codigo_vivienda_familia')->dropdownList(
			ArrayHelper::map($alojamientoVivienda, 'cod_vivienda', 'descripcion')
			); ?>
	  </div>	  
	</div>
    <div class="row">
	  <div class="col-lg-6 col-md-10">
		<?= $form->field($model, 'codigo_ingreso_familia')->dropdownList(
			ArrayHelper::map($ingresoFamiliar, 'cod_ing_fam', 'descripcion')
			); ?>
	  </div>
	  <div class="col-lg-6 col-md-10">		
		<?= $form->field($model, 'codigo_grupo_familiar')->dropdownList(
			array_reverse(ArrayHelper::map($grupoFamiliar, 'cod_grupo_fam', 'descripcion'), true)
			); ?>
	  </div>	  
	</div>

    <div class="form-group">
        <?= Html::a('<span class="glyphicon glyphicon-arrow-left"></span> Datos del estudiante', ['estudiantes/create'], ['class' => 'btn btn-default', 'role' => 'button']) ?>
        <?= Html::submitButton('Siguiente <span class="glyphicon glyphicon-arrow-right"></span>', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

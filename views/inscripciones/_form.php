<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\bootstrap\Alert;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Inscripciones */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$this->registerJs("
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
		", 
		View::POS_READY, 
		'my-options');
		
// Se visualizan los elemento del formulario si las variables son verdaderas
$mostrarPromedio = "style='display: none;'";
if ($model->postulado_para_beca)
{
	$mostrarPromedio = "style='display: block;'";
}
//$model->postulado_para_premio

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
								 'id' => 'municipios']) ?>
		</div>
	  </div>	  
	</div>
	
	<div class="row">
	  <div class="col-lg-6 col-md-10">
		  <!-- TODO: Con el municipio se carga el plantel, se debe hacer consulta Ajax-->
		<?= $form->field($model, 'codigo_plantel')->dropdownList(
			ArrayHelper::map($planteles, 'cod_pla', 'nom_pla')
			);
		?>
	  </div>
	  <div class="col-lg-6 col-md-10">		
		<div class="form-group">
			<?= Html::label('Postulado para', 'postuladoPara', ['class' => 'control-label']) ?>
			<div class="checkbox">
				<?= Html::activeCheckbox($model, 'postulado_para_premio', ['value' => 'P']) ?>
				<?= Html::activeCheckbox($model, 'postulado_para_beca', ['value' => 'B']) ?>
			</div>
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
		<?= $form->field($model, 'promedio')->textInput()->hint('Escriba el promedio con 3 decimales'); ?>
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
    

	<div class="row">
	  <?= Alert::widget([
				'options' => [
					'class' => 'alert-info',
				],
				'body' => 'Si está optando por el <strong>Premio de reconocimiento a la excelencia</strong>, debe indicar el promedio de notas de los tres últimos años.',
				'closeButton' => false,
			]);
		 ?>
	  <div class="col-lg-4 col-md-10">
		<?= $form->field($model, 'nota1')->textInput()->hint('Escriba el promedio con 3 decimales'); ?>
	  </div>
	  <div class="col-lg-4 col-md-10">		
		<?= $form->field($model, 'nota2')->textInput()->hint('Escriba el promedio con 3 decimales'); ?>
	  </div>	  
	  <div class="col-lg-4 col-md-10">		
		<?= $form->field($model, 'nota3')->textInput()->hint('Escriba el promedio con 3 decimales. Sólo debe llenarlo si cursó sexto año'); ?>
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
			ArrayHelper::map($grupoFamiliar, 'cod_grupo_fam', 'descripcion')
			); ?>
	  </div>	  
	</div>

    <div class="form-group">
        <?//= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::submitButton('Siguiente <span class="glyphicon glyphicon-arrow-right"></span>', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

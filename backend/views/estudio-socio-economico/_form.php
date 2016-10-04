<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EstudioSocioEconomico */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estudio-socio-economico-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_proceso')->textInput() ?>

    <?= $form->field($model, 'id_estudiante')->textInput() ?>

    <?= $form->field($model, 'n_planilla_inscripcion')->textInput() ?>

    <?= $form->field($model, 'codigo_ultimo_grado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vive_con_padres_solicitante')->checkbox() ?>

    <?= $form->field($model, 'telefono_fijo_solicitante')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono_celular_solicitante')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellidos_padre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombres_padre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cedula_padre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'grado_instruccion_padre')->textInput() ?>

    <?= $form->field($model, 'telefono_fijo_padre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono_celular_padre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profesion_padre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ocupacion_padre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lugar_trabajo_padre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ingreso_mensual_padre')->textInput() ?>

    <?= $form->field($model, 'direccion_trabajo_padre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correo_e_padre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion_habitacion_padre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellidos_madre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombres_madre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cedula_madre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'grado_instruccion_madre')->textInput() ?>

    <?= $form->field($model, 'telefono_fijo_madre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono_celular_madre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profesion_madre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ocupacion_madre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lugar_trabajo_madre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ingreso_mensual_madre')->textInput() ?>

    <?= $form->field($model, 'direccion_trabajo_madre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correo_e_madre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion_habitacion_madre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellidos_representante')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombres_representante')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cedula_representante')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'grado_instruccion_representante')->textInput() ?>

    <?= $form->field($model, 'telefono_fijo_representante')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono_celular_representante')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profesion_representante')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ocupacion_representante')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lugar_trabajo_representante')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ingreso_mensual_representante')->textInput() ?>

    <?= $form->field($model, 'direccion_trabajo_representante')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correo_e_representante')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion_habitacion_representante')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

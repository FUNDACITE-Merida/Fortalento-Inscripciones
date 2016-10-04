<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EstudioSocioEconomicoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estudio-socio-economico-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_proceso') ?>

    <?= $form->field($model, 'id_estudiante') ?>

    <?= $form->field($model, 'n_planilla_inscripcion') ?>

    <?= $form->field($model, 'codigo_ultimo_grado') ?>

    <?php // echo $form->field($model, 'vive_con_padres_solicitante')->checkbox() ?>

    <?php // echo $form->field($model, 'telefono_fijo_solicitante') ?>

    <?php // echo $form->field($model, 'telefono_celular_solicitante') ?>

    <?php // echo $form->field($model, 'apellidos_padre') ?>

    <?php // echo $form->field($model, 'nombres_padre') ?>

    <?php // echo $form->field($model, 'cedula_padre') ?>

    <?php // echo $form->field($model, 'grado_instruccion_padre') ?>

    <?php // echo $form->field($model, 'telefono_fijo_padre') ?>

    <?php // echo $form->field($model, 'telefono_celular_padre') ?>

    <?php // echo $form->field($model, 'profesion_padre') ?>

    <?php // echo $form->field($model, 'ocupacion_padre') ?>

    <?php // echo $form->field($model, 'lugar_trabajo_padre') ?>

    <?php // echo $form->field($model, 'ingreso_mensual_padre') ?>

    <?php // echo $form->field($model, 'direccion_trabajo_padre') ?>

    <?php // echo $form->field($model, 'correo_e_padre') ?>

    <?php // echo $form->field($model, 'direccion_habitacion_padre') ?>

    <?php // echo $form->field($model, 'apellidos_madre') ?>

    <?php // echo $form->field($model, 'nombres_madre') ?>

    <?php // echo $form->field($model, 'cedula_madre') ?>

    <?php // echo $form->field($model, 'grado_instruccion_madre') ?>

    <?php // echo $form->field($model, 'telefono_fijo_madre') ?>

    <?php // echo $form->field($model, 'telefono_celular_madre') ?>

    <?php // echo $form->field($model, 'profesion_madre') ?>

    <?php // echo $form->field($model, 'ocupacion_madre') ?>

    <?php // echo $form->field($model, 'lugar_trabajo_madre') ?>

    <?php // echo $form->field($model, 'ingreso_mensual_madre') ?>

    <?php // echo $form->field($model, 'direccion_trabajo_madre') ?>

    <?php // echo $form->field($model, 'correo_e_madre') ?>

    <?php // echo $form->field($model, 'direccion_habitacion_madre') ?>

    <?php // echo $form->field($model, 'apellidos_representante') ?>

    <?php // echo $form->field($model, 'nombres_representante') ?>

    <?php // echo $form->field($model, 'cedula_representante') ?>

    <?php // echo $form->field($model, 'grado_instruccion_representante') ?>

    <?php // echo $form->field($model, 'telefono_fijo_representante') ?>

    <?php // echo $form->field($model, 'telefono_celular_representante') ?>

    <?php // echo $form->field($model, 'profesion_representante') ?>

    <?php // echo $form->field($model, 'ocupacion_representante') ?>

    <?php // echo $form->field($model, 'lugar_trabajo_representante') ?>

    <?php // echo $form->field($model, 'ingreso_mensual_representante') ?>

    <?php // echo $form->field($model, 'direccion_trabajo_representante') ?>

    <?php // echo $form->field($model, 'correo_e_representante') ?>

    <?php // echo $form->field($model, 'direccion_habitacion_representante') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

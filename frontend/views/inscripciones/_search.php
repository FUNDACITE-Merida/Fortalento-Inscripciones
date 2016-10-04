<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\InscripcionesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inscripciones-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_proceso') ?>

    <?= $form->field($model, 'id_estudiante') ?>

    <?= $form->field($model, 'fecha_inscripcion') ?>

    <?= $form->field($model, 'codigo_plantel') ?>

    <?php // echo $form->field($model, 'localidad_plantel') ?>

    <?php // echo $form->field($model, 'codigo_ultimo_grado') ?>

    <?php // echo $form->field($model, 'postulado_para_beca') ?>

    <?php // echo $form->field($model, 'postulado_para_premio') ?>

    <?php // echo $form->field($model, 'promedio') ?>

    <?php // echo $form->field($model, 'nota1') ?>

    <?php // echo $form->field($model, 'nota2') ?>

    <?php // echo $form->field($model, 'nota3') ?>

    <?php // echo $form->field($model, 'codigo_profesion_jefe_familia') ?>

    <?php // echo $form->field($model, 'codigo_nivel_instruccion_madre') ?>

    <?php // echo $form->field($model, 'codigo_fuente_ingreso_familia') ?>

    <?php // echo $form->field($model, 'codigo_vivienda_familia') ?>

    <?php // echo $form->field($model, 'codigo_ingreso_familia') ?>

    <?php // echo $form->field($model, 'codigo_grupo_familiar') ?>

    <?php // echo $form->field($model, 'cerrada')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

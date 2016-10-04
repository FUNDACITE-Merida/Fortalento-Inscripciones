<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Inscripciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inscripciones-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_proceso')->textInput() ?>

    <?= $form->field($model, 'id_estudiante')->textInput() ?>

    <?= $form->field($model, 'fecha_inscripcion')->textInput() ?>

    <?= $form->field($model, 'codigo_plantel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'localidad_plantel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codigo_ultimo_grado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'postulado_para_beca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'postulado_para_premio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'promedio')->textInput() ?>

    <?= $form->field($model, 'nota1')->textInput() ?>

    <?= $form->field($model, 'nota2')->textInput() ?>

    <?= $form->field($model, 'nota3')->textInput() ?>

    <?= $form->field($model, 'codigo_profesion_jefe_familia')->textInput() ?>

    <?= $form->field($model, 'codigo_nivel_instruccion_madre')->textInput() ?>

    <?= $form->field($model, 'codigo_fuente_ingreso_familia')->textInput() ?>

    <?= $form->field($model, 'codigo_vivienda_familia')->textInput() ?>

    <?= $form->field($model, 'codigo_ingreso_familia')->textInput() ?>

    <?= $form->field($model, 'codigo_grupo_familiar')->textInput() ?>

    <?= $form->field($model, 'cerrada')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model models\PasswordResetRequestForm */

$this->title = 'Recuperar contraseña';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-request-password-reset">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Por favor ingresa tu correo electrónico. Se enviará un mensaje a tu correo electrónico con instrucciones para recuperar tu contraseña.</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
                <?= $form->field($model, 'email')->label('Correo electrónico'); ?>
                <div class="form-group">
                    <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

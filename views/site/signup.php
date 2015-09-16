<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model models\SignupForm */

$this->title = 'Registro';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Por favor llene los siguientes campos para registrarse:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <? //=$form->field($model, 'username') ?>
                <?= $form->field($model, 'email')->label('Correo electrónico') ?>
                <?= $form->field($model, 'password')->passwordInput()->label('Contraseña') ?>
                <?= $form->field($model, 'captcha')->widget(Captcha::className())->hint('Escriba los caracteres que se muestran en la imagen'); ?>
                <div class="form-group">
                    <?= Html::submitButton('Registrarse', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

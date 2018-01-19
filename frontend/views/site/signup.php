<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Registro';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <!--<p>Por favor llene los siguientes campos para registrarse:</p>-->
    <div class="row">
		<div class="col-lg-5">
			<div style="color: red;margin:1em 0">
			Para realizar el registro debes usar un correo electrónico de uso frecuente ya que FUNDACITE Mérida informa sobre las etapas del Programa FORTALENTO por esta vía.
			</div> 
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true])->label('Correo electrónico') ?>
				<?= $form->field($model, 'captcha')->widget(Captcha::className())->hint('Escriba los caracteres que se muestran en la imagen'); ?>
                <div class="form-group">
                    <?= Html::submitButton('Registrarse', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-lg-2">
		</div>	 
        <div class="col-lg-5">
			<div style="margin:1em 0">
				<p><strong>Lapso de inscripción Del 22 de enero al 02 de marzo de 2018</strong></p>
			</div> 
			<div><?= Html::img('@web/images/Banner_FORTALENTO_Convocatoria_2017-2018_pagina web.png',['width' => '80%'])?></div>
		</div>	
    </div>
</div>

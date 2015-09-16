<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model models\LoginForm */

$this->title = 'Ingresar';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php if (Yii::$app->session->hasFlash('successMail')):?>
		<?= Alert::widget([
				'options' => [
					'class' => 'alert-success',
				],
				'body' => Yii::$app->session->getFlash('successMail'),
				'closeButton' => false,
			]);?>
	<?php endif; ?>
	<?php if (Yii::$app->session->hasFlash('errorMail')):?>
		<?= Alert::widget([
				'options' => [
					'class' => 'alert-danger',
				],
				'body' => Yii::$app->session->getFlash('errorMail'),
				'closeButton' => false,
			]);?>
	<?php endif; ?>	
    <p>Por favor llene los siguientes campos para ingresar:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <? //= $form->field($model, 'rememberMe')->checkbox() ?>
                <div style="color:#999;margin:1em 0">
                    Si aún no tienes una cuenta <?= Html::a('regístrate', ['site/signup']) ?>.
                </div>
                <div style="color:#999;margin:1em 0">
                    Si perdiste tu contraseña puedes <?= Html::a('recuperar tu contraseña', ['site/request-password-reset']) ?>.
                </div>
                <div class="form-group">
                    <?= Html::submitButton('Ingresar', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

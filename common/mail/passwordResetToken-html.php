<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p>Hola <?= Html::encode($user->username) ?>,</p>

    <p>Por favor haz click en el siguiente enlace para restablecer tu contraseña:</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
    
    <p><strong>Nota:</strong> Ha recibido este correo electrónico porque usted está registrado en 
    <?= Yii::$app->urlManager->createAbsoluteUrl(['/']);?> </p>
    <p>Si ha recibido este correo electrónico por error por favor escriba a <?= \Yii::$app->params['supportEmail']?>
     reportando la novedad</p>
    <p><strong>FUNDACITE Mérida</strong></p>
    <p><?= Html::a('https://www.fundacite-merida.gob.ve', 'https://www.fundacite-merida.gob.ve') ?></p>
</div>

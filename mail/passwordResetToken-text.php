<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);?>
Hola <?= Html::encode($user->username) ?>,

Por favor haz click en el siguiente enlace para restablecer tu contraseña:

<?= $resetLink ?>


Nota: Ha recibido este correo electrónico porque usted está registrado en

<?= Yii::$app->urlManager->createAbsoluteUrl(['/']);?>


Si ha recibido este correo electrónico por error por favor escriba a <?= \Yii::$app->params['supportEmail']?> reportando la novedad.


FUNDACITE Mérida
http://www.fundacite-merida.gob.ve

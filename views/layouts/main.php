<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
	<div style="text-align: center;"><?= Html::img('@web/images/cabecera.png',['width' => '100%'])?></div>
    <div class="wrap">
        <?php
            NavBar::begin([
                //'brandLabel' => Yii::$app->name,
                'brandLabel' => Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    //'class' => 'navbar-inverse navbar-fixed-top my-nav',
                    'class' => 'navbar-inverse my-nav',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Reportes', 'url' => ['/reportes/index'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Inscripción', 'url' => ['/estudiantes/create'], 'visible' => !Yii::$app->user->isGuest],
                    //['label' => 'Contact', 'url' => ['/site/contact']],
                        ['label' => 'Ingresar', 'url' => ['/site/login'], 'visible' => Yii::$app->user->isGuest],
                    Yii::$app->user->isGuest ?
                        ['label' => 'Registrarse', 'url' => ['/site/signup']]:
                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; FUNDACITE Mérida <?= date('Y') ?></p>
            <p class="pull-right"><?//= Html::img('@web/images/logo.png')?><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

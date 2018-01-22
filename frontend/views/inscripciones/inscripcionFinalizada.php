<?php
use yii\helpers\Html;
use yii\web\View;

$this->title="Inscripción Finalizada";
$mark = date("H-i-s");
$urlImprimir = Yii::$app->urlManager->createUrl(['/reportes/inscripcion', 'mark'=>$mark]);
$this->registerJS("
	var url = '".$urlImprimir."';
    window.location.href = url;
",View::POS_LOAD);
?>
<h2>Ha finalizado su inscripción con éxito.</h2>
<p>En breves momentos podrá descargar las planillas de inscripción.</p>
<?= Html::a('<span class=".glyphicon .glyphicon-log-out"></span> Salir del sistema', 
			['/site/logout'], 
			['class' => 'btn btn-primary', 'role' => 'button',
			'data' => [
                //'confirm' => "Are you sure you want to delete profile?",
                'method' => 'post',
				],
            ]) ?>

<?php
use yii\helpers\Html;
use yii\web\View;

$this->title="No hay proceso abierto";
?>
<h2>No hay proceso abierto</h2>
<p>En estos momentos no se encuentra abierto ningún proceso de inscripción.</p>
<p>Si lo desea puede imprimir las planillas de procesos anteriores.</p>
<?= Html::a('<span class="glyphicon glyphicon-arrow-left"></span> Ir a listado de reportes', ['/reportes'], ['class' => 'btn btn-primary', 'role' => 'button']) ?>

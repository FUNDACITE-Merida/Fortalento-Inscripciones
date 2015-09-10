<?php
use yii\helpers\Html;
use yii\web\View;

$this->title="Inscripción cerrada";
?>
<h2>La inscripción ya fue cerrada</h2>
<p>La inscripción al proceso actual ya fue cerrada.</p>
<p>Si lo desea puede imprimir las planillas de inscripción.</p>
<?= Html::a('<span class="glyphicon glyphicon-arrow-left"></span> Ir a listado de reportes', ['/reportes'], ['class' => 'btn btn-primary', 'role' => 'button']) ?>

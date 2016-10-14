<?php
use yii\helpers\Html;
?>
<h2>Ha ocurrido un error en la impresión del reporte. </h2>
<p>Compruebe que los datos suministrados son los correctos</p>
<?= Html::a('<span class="glyphicon glyphicon-arrow-left"></span> Ir a listado de reportes', ['/reportes'], ['class' => 'btn btn-primary', 'role' => 'button']) ?>

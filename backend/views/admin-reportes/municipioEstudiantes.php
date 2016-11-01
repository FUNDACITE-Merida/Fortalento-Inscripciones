<?php
use yii\helpers\Html;
?>
<h1><?= Html::encode($municipio->municipio) ?></h1>
<table class="table table-striped table-bordered table-condensed" width="100%">
<thead>
<tr>
	<th>#</th>
	<th>Nº Planilla</th>
	<th>Cédula</th>
	<th>Nombre</th>
	<th>Apellido</th>
	<th>Correo electrónico</th>
	<th>Cerrada/Abierta</th>
</thead>
<tbody>
<?php $i = 0;?>
<?php foreach ($model as $inscripcion): ?>

<tr>
	<td><?= $i += 1;?></td>
	<td><?= $inscripcion['id']?></td>
	<td><?= $inscripcion['idEstudiante']['cedula']?></td>
	<td><?= $inscripcion['idEstudiante']['nombre']?></td>
	<td><?= $inscripcion['idEstudiante']['apellido']?></td>
	<td><?= $inscripcion['idEstudiante']['user']['email']?></td>
	<td><?= $inscripcion['cerrada']? 'Cerrada': 'Abierta'?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

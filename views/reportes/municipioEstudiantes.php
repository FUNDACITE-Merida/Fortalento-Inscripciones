<?php
use yii\helpers\Html;
?>
<h1><?= Html::encode($model[0]->municipio) ?></h1>
<table border="1" cellspacing="0" cellpadding="0"width="100%">
<thead>
<tr>
	<th>Nº Planilla</th>
	<th>Cédula</th>
	<th>Nombre</th>
	<th>Apellido</th>
	<th>Correo electrónico</th>
	<th>Cerrada/Abierta</th>
</thead>
<tbody>
<?php foreach ($model[0]->plantels as $plantel): ?>
	<?php foreach ($plantel->inscripciones as $inscripcion): ?>
<tr>
	<td><?= $inscripcion->id?></td>
	<td><?= $inscripcion->idEstudiante->cedula?></td>
	<td><?= $inscripcion->idEstudiante->nombre?></td>
	<td><?= $inscripcion->idEstudiante->apellido?></td>
	<td><?= $inscripcion->idEstudiante->user->email?></td>
	<td><?= $inscripcion->cerrada? 'Abierta': 'Cerrada'?></td>
</tr>
	<?php endforeach; ?>
<?php endforeach; ?>
</tbody>
</table>

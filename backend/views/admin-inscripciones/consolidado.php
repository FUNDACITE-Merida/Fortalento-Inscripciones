<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InscripcionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consolidado de inscripciones Fortalento';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inscripciones-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
<!--
    <p>
        <?= Html::a('Create Inscripciones', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
-->

<p>
<div><strong>Total de estudiantes inscritos: </strong><?php print_r($totalModel['tEstudiantesInscritos'])?></div>
<div><strong>Total de inscripciones cerradas: </strong><?php print_r($totalModel['tInscripcionesCerradas'])?></div>
<div><strong>Total de inscripciones abiertas: </strong><?= $totalModel['tInscripcionesAbiertas']?></div>
</p>
   
<table class="table table-striped table-bordered"><thead>
<tr><th>Municipio</th><th>Inscripciones Cerradas</th><th>Inscripciones Abiertas</th></tr>
</thead>
<tbody>
<?php foreach($data as $municipio): ?>
		<tr data-key="3">
			<td><?= $municipio['nombre']?></td>
			<td><?= $municipio['cerradas']?></td>
			<td><?= $municipio['abiertas']?></td>
		</tr>
<?php endforeach; ?>
</tbody></table>

</div>

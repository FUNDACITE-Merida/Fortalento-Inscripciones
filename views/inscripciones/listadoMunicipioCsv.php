<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InscripcionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Imprimir archivo .csv de inscripciones Fortalento';
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
   
<table class="table table-striped table-bordered"><thead>
<tr><th>Municipio</th><th>Acción</th></tr>
</thead>
<tbody>
<?php foreach($model as $municipio): ?>
		<tr data-key="3">
			<td><?= $municipio->municipio?></td>
			<td><?= Html::a('Imprimir .dat', ['inscripciones/imprimir-csv','cod_municipio'=>$municipio->cod_municipio], [
                                        'title' => '',
                                        'class' => 'btn btn-warning',
                                        //'data-confirm' => '¿Está seguro de '.$label.' la inscripción?',
                                        //'data-method' => 'post',
                                        //'data' => ['id'=>$model->id],
                                ]);?>
                 <?= Html::a('Imprimir Estudiantes', ['reportes/municipio-estudiantes','cod_municipio'=>$municipio->cod_municipio], [
                                        'title' => '',
                                        'class' => 'btn btn-success',
                                        //'data-confirm' => '¿Está seguro de '.$label.' la inscripción?',
                                        //'data-method' => 'post',
                                        //'data' => ['id'=>$model->id],
                                ]);?>
            </td>
		</tr>
<?php endforeach; ?>
</tbody></table>

</div>

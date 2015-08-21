<?php

namespace app\controllers;

use Yii;
use app\models\EstudioSocioEconomico;
use app\models\EstudioSocioEconomicoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Estudiantes;
use app\models\Procesos;
use app\models\User;

/**
 * EstudioSocioEconomicoController implements the CRUD actions for EstudioSocioEconomico model.
 */
class EstudioSocioEconomicoController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all EstudioSocioEconomico models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EstudioSocioEconomicoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EstudioSocioEconomico model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new EstudioSocioEconomico model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		/*
		 * Verifica que el usuario actual ya haya llenado sus datos de estudiante, de lo contrario 
		 * lo redirige hacia esa acción 
		 */
		if (!($estudiante = Estudiantes::getEstudianteUser()))
        {
			return $this->redirect(['/estudiantes/create']);
		}
		
		if (!($estudianteInscripcion = $estudiante->getInscripcion()))
        {
			return $this->redirect(['/inscripciones/create']);
		}
		
		if (!($model = $estudiante->getEstudioSocioEconomico()))
        {
			$model = new EstudioSocioEconomico();
			$model->id_estudiante = $estudiante->id;
			$model->id_proceso =  Procesos::getIdProcesoAbierto();
			$model->n_planilla_inscripcion = $estudianteInscripcion->id;
			$model->codigo_ultimo_grado = $estudianteInscripcion->codigo_ultimo_grado;
		}

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'estudiante' => $estudiante,
                'estudianteInscripcion' => $estudianteInscripcion,
                'estudianteCorreo' => User::find()
										->select(['email'])
										->where(['id' => Yii::$app->user->id])
										->one(),									 
            ]);
        }
    }

    /**
     * Updates an existing EstudioSocioEconomico model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EstudioSocioEconomico model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EstudioSocioEconomico model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EstudioSocioEconomico the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EstudioSocioEconomico::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

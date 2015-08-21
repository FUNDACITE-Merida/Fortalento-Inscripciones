<?php

namespace app\controllers;

use Yii;
use app\models\Inscripciones;
use app\models\InscripcionesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Estudiantes;
use app\models\Procesos;
use app\models\Municipios;
use app\models\Plantel;
use app\models\NseProfesionJefeFamilia;
use app\models\NseNivelDeLaMadre;
use app\models\NseFuenteDeIngreso;
use app\models\NseAlojamientoYVivienda;
use app\models\NseIngresoFamiliar;
use app\models\NseGrupoFamiliar;

use app\filters\ProcesoAbierto;

/**
 * InscripcionesController implements the CRUD actions for Inscripciones model.
 */
class InscripcionesController extends Controller
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
            'proceso' => [
            /* Se debe renombrar ProcesoAbierto a ProcesoCerrado que es lo realmente correcto*/
                'class' => ProcesoAbierto::className(),
                'denyActions' => ['inscripciones/create', 'inscripciones/view'],
                'returnPath' => '/site/about',
            ],
        ];
    }

    /**
     * Lists all Inscripciones models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InscripcionesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Inscripciones model.
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
     * Crea o actualiza un modelo Inscripcion
     * Si la creación o actualización es correcta se redirecciona a 
     * la creación o actualización del estudio socio económico.
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
		
		/*
		 * TODO: 1.- se debe cargar la información del estudiante en el proceso actual -> Listo
		 * 2.- se debe restringir el acceso si ya la inscripción fue verificada en FUNDACITE
		 */
		if (!($model = $estudiante->getInscripcion()))
        {
			$model = new Inscripciones();
			$model->id_estudiante = $estudiante->id;
			$model->id_proceso =  Procesos::getIdProcesoAbierto();
			$model->fecha_inscripcion = Yii::$app->formatter->asDate('now');
			
			$municipios = Municipios::find()->all();
			$planteles = array();
			$cod_municipio = null;			
		}else
		{
			$municipios = Municipios::find()->all();
			$plantel = Plantel::findOne(['cod_pla' => $model->codigo_plantel]);
			$cod_municipio = $plantel->cod_municipio;
			$planteles = Plantel::find()
							->where(['cod_municipio' => $cod_municipio])
							->orderBy('cod_pla')
							->all();		
		}
		
		/* 
		 * TODO: 1.- Antes de guardar se debe setear en el modelo el campo fecha_inscripcion
		 * con la fecha actual
		 */ 
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/estudio-socio-economico/create']);
        } else {
			$profesionJefeFamilia = NseProfesionJefeFamilia::find()->all();
			$nivelInstruccionMadre = NseNivelDeLaMadre::find()->all();
			$fuenteIngreso = NseFuenteDeIngreso::find()->all();
			$alojamientoVivienda = NseAlojamientoYVivienda::find()->all();
			$ingresoFamiliar = NseIngresoFamiliar::find()
									->where(['cod_proceso' => 'p-2012']) // Se debe colocar esto Procesos::getCodigoProcesoAbierto()
									->orderBy('cod_ing_fam')
									->all();
			$grupoFamiliar = NseGrupoFamiliar::find()->all();
			
            return $this->render('create', [
                'model' => $model,
                'municipios' => $municipios,
                'planteles' => $planteles,
                'cod_municipio' => $cod_municipio,
                'profesionJefeFamilia' => $profesionJefeFamilia,
                'nivelInstruccionMadre' => $nivelInstruccionMadre,
                'fuenteIngreso' => $fuenteIngreso,
                'alojamientoVivienda' => $alojamientoVivienda,
                'ingresoFamiliar' => $ingresoFamiliar,
                'grupoFamiliar' => $grupoFamiliar,
            ]);
        }
		
		/*
        $model = new Inscripciones();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }*/
    }

    /**
     * Updates an existing Inscripciones model.
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
     * Deletes an existing Inscripciones model.
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
     * Finds the Inscripciones model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Inscripciones the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Inscripciones::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

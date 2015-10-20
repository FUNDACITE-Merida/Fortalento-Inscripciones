<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Inscripciones;

/**
 * InscripcionesSearch represents the model behind the search form about `app\models\Inscripciones`.
 */
class InscripcionesSearch extends Inscripciones
{
	public $cedula;
	
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_proceso', 'id_estudiante', 'codigo_profesion_jefe_familia', 'codigo_nivel_instruccion_madre', 'codigo_fuente_ingreso_familia', 'codigo_vivienda_familia', 'codigo_ingreso_familia', 'codigo_grupo_familiar'], 'integer'],
            [['fecha_inscripcion', 'codigo_plantel', 'localidad_plantel', 'codigo_ultimo_grado', 'postulado_para_beca', 'postulado_para_premio', 'cerrada'], 'safe'],
            [['cedula'], 'safe'],
            [['promedio', 'nota1', 'nota2', 'nota3'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Inscripciones::find();
        //LJAH
        $query->joinWith(['idEstudiante']);
        

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $dataProvider->sort->attributes['idEstudiante'] = [
			'asc' => ['estudiantes.cedula' => SORT_ASC],
			'desc' => ['estudiantes.cedula' => SORT_DESC],
		];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        $query->andFilterWhere([
            'id' => $this->id,
            'id_proceso' => $this->id_proceso,
            'id_estudiante' => $this->id_estudiante,
            'fecha_inscripcion' => $this->fecha_inscripcion,
            'promedio' => $this->promedio,
            'nota1' => $this->nota1,
            'nota2' => $this->nota2,
            'nota3' => $this->nota3,
            'codigo_profesion_jefe_familia' => $this->codigo_profesion_jefe_familia,
            'codigo_nivel_instruccion_madre' => $this->codigo_nivel_instruccion_madre,
            'codigo_fuente_ingreso_familia' => $this->codigo_fuente_ingreso_familia,
            'codigo_vivienda_familia' => $this->codigo_vivienda_familia,
            'codigo_ingreso_familia' => $this->codigo_ingreso_familia,
            'codigo_grupo_familiar' => $this->codigo_grupo_familiar,
            'cerrada' => $this->cerrada,
        ]);

        $query->andFilterWhere(['like', 'codigo_plantel', $this->codigo_plantel])
            ->andFilterWhere(['like', 'localidad_plantel', $this->localidad_plantel])
            ->andFilterWhere(['like', 'codigo_ultimo_grado', $this->codigo_ultimo_grado])
            ->andFilterWhere(['like', 'postulado_para_beca', $this->postulado_para_beca])
            ->andFilterWhere(['like', 'postulado_para_premio', $this->postulado_para_premio])
            ->andFilterWhere(['like', 'estudiantes.cedula', $this->cedula]);
		

        return $dataProvider;
    }
}

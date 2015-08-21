<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EstudioSocioEconomico;

/**
 * EstudioSocioEconomicoSearch represents the model behind the search form about `app\models\EstudioSocioEconomico`.
 */
class EstudioSocioEconomicoSearch extends EstudioSocioEconomico
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_proceso', 'id_estudiante', 'n_planilla_inscripcion', 'grado_instruccion_padre', 'grado_instruccion_madre', 'grado_instruccion_representante'], 'integer'],
            [['codigo_ultimo_grado', 'telefono_fijo_solicitante', 'telefono_celular_solicitante', 'apellidos_padre', 'nombres_padre', 'cedula_padre', 'telefono_fijo_padre', 'telefono_celular_padre', 'profesion_padre', 'ocupacion_padre', 'lugar_trabajo_padre', 'direccion_trabajo_padre', 'correo_e_padre', 'direccion_habitacion_padre', 'apellidos_madre', 'nombres_madre', 'cedula_madre', 'telefono_fijo_madre', 'telefono_celular_madre', 'profesion_madre', 'ocupacion_madre', 'lugar_trabajo_madre', 'direccion_trabajo_madre', 'correo_e_madre', 'direccion_habitacion_madre', 'apellidos_representante', 'nombres_representante', 'cedula_representante', 'telefono_fijo_representante', 'telefono_celular_representante', 'profesion_representante', 'ocupacion_representante', 'lugar_trabajo_representante', 'direccion_trabajo_representante', 'correo_e_representante'], 'safe'],
            [['vive_con_padres_solicitante'], 'boolean'],
            [['ingreso_mensual_padre', 'ingreso_mensual_madre', 'ingreso_mensual_representante'], 'number'],
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
        $query = EstudioSocioEconomico::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

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
            'n_planilla_inscripcion' => $this->n_planilla_inscripcion,
            'vive_con_padres_solicitante' => $this->vive_con_padres_solicitante,
            'grado_instruccion_padre' => $this->grado_instruccion_padre,
            'ingreso_mensual_padre' => $this->ingreso_mensual_padre,
            'grado_instruccion_madre' => $this->grado_instruccion_madre,
            'ingreso_mensual_madre' => $this->ingreso_mensual_madre,
            'grado_instruccion_representante' => $this->grado_instruccion_representante,
            'ingreso_mensual_representante' => $this->ingreso_mensual_representante,
        ]);

        $query->andFilterWhere(['like', 'codigo_ultimo_grado', $this->codigo_ultimo_grado])
            ->andFilterWhere(['like', 'telefono_fijo_solicitante', $this->telefono_fijo_solicitante])
            ->andFilterWhere(['like', 'telefono_celular_solicitante', $this->telefono_celular_solicitante])
            ->andFilterWhere(['like', 'apellidos_padre', $this->apellidos_padre])
            ->andFilterWhere(['like', 'nombres_padre', $this->nombres_padre])
            ->andFilterWhere(['like', 'cedula_padre', $this->cedula_padre])
            ->andFilterWhere(['like', 'telefono_fijo_padre', $this->telefono_fijo_padre])
            ->andFilterWhere(['like', 'telefono_celular_padre', $this->telefono_celular_padre])
            ->andFilterWhere(['like', 'profesion_padre', $this->profesion_padre])
            ->andFilterWhere(['like', 'ocupacion_padre', $this->ocupacion_padre])
            ->andFilterWhere(['like', 'lugar_trabajo_padre', $this->lugar_trabajo_padre])
            ->andFilterWhere(['like', 'direccion_trabajo_padre', $this->direccion_trabajo_padre])
            ->andFilterWhere(['like', 'correo_e_padre', $this->correo_e_padre])
            ->andFilterWhere(['like', 'direccion_habitacion_padre', $this->direccion_habitacion_padre])
            ->andFilterWhere(['like', 'apellidos_madre', $this->apellidos_madre])
            ->andFilterWhere(['like', 'nombres_madre', $this->nombres_madre])
            ->andFilterWhere(['like', 'cedula_madre', $this->cedula_madre])
            ->andFilterWhere(['like', 'telefono_fijo_madre', $this->telefono_fijo_madre])
            ->andFilterWhere(['like', 'telefono_celular_madre', $this->telefono_celular_madre])
            ->andFilterWhere(['like', 'profesion_madre', $this->profesion_madre])
            ->andFilterWhere(['like', 'ocupacion_madre', $this->ocupacion_madre])
            ->andFilterWhere(['like', 'lugar_trabajo_madre', $this->lugar_trabajo_madre])
            ->andFilterWhere(['like', 'direccion_trabajo_madre', $this->direccion_trabajo_madre])
            ->andFilterWhere(['like', 'correo_e_madre', $this->correo_e_madre])
            ->andFilterWhere(['like', 'direccion_habitacion_madre', $this->direccion_habitacion_madre])
            ->andFilterWhere(['like', 'apellidos_representante', $this->apellidos_representante])
            ->andFilterWhere(['like', 'nombres_representante', $this->nombres_representante])
            ->andFilterWhere(['like', 'cedula_representante', $this->cedula_representante])
            ->andFilterWhere(['like', 'telefono_fijo_representante', $this->telefono_fijo_representante])
            ->andFilterWhere(['like', 'telefono_celular_representante', $this->telefono_celular_representante])
            ->andFilterWhere(['like', 'profesion_representante', $this->profesion_representante])
            ->andFilterWhere(['like', 'ocupacion_representante', $this->ocupacion_representante])
            ->andFilterWhere(['like', 'lugar_trabajo_representante', $this->lugar_trabajo_representante])
            ->andFilterWhere(['like', 'direccion_trabajo_representante', $this->direccion_trabajo_representante])
            ->andFilterWhere(['like', 'correo_e_representante', $this->correo_e_representante]);

        return $dataProvider;
    }
}

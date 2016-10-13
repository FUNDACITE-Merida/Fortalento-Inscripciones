<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "municipios".
 *
 * @property string $cod_municipio
 * @property string $municipio
 *
 * @property Aludati[] $aludatis
 * @property MunicipiosFechas[] $municipiosFechas
 * @property MunicipiosOpciones[] $municipiosOpciones
 * @property MunicipiosParticipantes[] $municipiosParticipantes
 * @property FechasProceso[] $codProcesos
 * @property Plantel[] $plantels
 */
class Municipios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'municipios';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('fortalento');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod_municipio', 'municipio'], 'required'],
            [['cod_municipio'], 'string', 'max' => 3],
            [['municipio'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod_municipio' => 'Cod Municipio',
            'municipio' => 'Municipio del plantel',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAludatis()
    {
        return $this->hasMany(Aludati::className(), ['cod_municipio' => 'cod_municipio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMunicipiosFechas()
    {
        return $this->hasMany(MunicipiosFechas::className(), ['cod_municipio' => 'cod_municipio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMunicipiosOpciones()
    {
        return $this->hasMany(MunicipiosOpciones::className(), ['cod_municipio' => 'cod_municipio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMunicipiosParticipantes()
    {
        return $this->hasMany(MunicipiosParticipantes::className(), ['cod_municipio' => 'cod_municipio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodProcesos()
    {
        return $this->hasMany(FechasProceso::className(), ['cod_proceso' => 'cod_proceso'])->viaTable('municipios_participantes', ['cod_municipio' => 'cod_municipio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlantels()
    {
        return $this->hasMany(Plantel::className(), ['cod_municipio' => 'cod_municipio']);
    }

    /**
     * @inheritdoc
     * @return MunicipiosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MunicipiosQuery(get_called_class());
    }
}

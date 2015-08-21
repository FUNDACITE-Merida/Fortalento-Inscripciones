<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grados".
 *
 * @property string $cod_grado
 * @property string $grado
 *
 * @property Aludati[] $aludatis
 * @property Evaluacion[] $evaluacions
 * @property MunicipiosOpciones[] $municipiosOpciones
 * @property PremioGrado[] $premioGrados
 */
class Grados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grados';
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
            [['cod_grado', 'grado'], 'required'],
            [['cod_grado'], 'string', 'max' => 4],
            [['grado'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod_grado' => 'Cod Grado',
            'grado' => 'Grado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAludatis()
    {
        return $this->hasMany(Aludati::className(), ['cod_grado' => 'cod_grado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluacions()
    {
        return $this->hasMany(Evaluacion::className(), ['cod_grado' => 'cod_grado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMunicipiosOpciones()
    {
        return $this->hasMany(MunicipiosOpciones::className(), ['cod_grado' => 'cod_grado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPremioGrados()
    {
        return $this->hasMany(PremioGrado::className(), ['cod_grado' => 'cod_grado']);
    }

    /**
     * @inheritdoc
     * @return GradosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GradosQuery(get_called_class());
    }
}

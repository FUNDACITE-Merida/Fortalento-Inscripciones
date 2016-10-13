<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "nse_nivel_de_la_madre".
 *
 * @property integer $cod_nivel_mad
 * @property string $descripcion
 *
 * @property Aludati[] $aludatis
 */
class NseNivelDeLaMadre extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nse_nivel_de_la_madre';
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
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod_nivel_mad' => 'Cod Nivel Mad',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAludatis()
    {
        return $this->hasMany(Aludati::className(), ['cod_nivel_mad' => 'cod_nivel_mad']);
    }

    /**
     * @inheritdoc
     * @return NseNivelDeLaMadreQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NseNivelDeLaMadreQuery(get_called_class());
    }
}

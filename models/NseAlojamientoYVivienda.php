<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nse_alojamiento_y_vivienda".
 *
 * @property integer $cod_vivienda
 * @property string $descripcion
 *
 * @property Aludati[] $aludatis
 */
class NseAlojamientoYVivienda extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nse_alojamiento_y_vivienda';
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
            'cod_vivienda' => 'Cod Vivienda',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAludatis()
    {
        return $this->hasMany(Aludati::className(), ['cod_vivienda' => 'cod_vivienda']);
    }

    /**
     * @inheritdoc
     * @return NseAlojamientoYViviendaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NseAlojamientoYViviendaQuery(get_called_class());
    }
}

<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "nse_fuente_de_ingreso".
 *
 * @property integer $cod_fuente_ing
 * @property string $descripcion
 *
 * @property Aludati[] $aludatis
 */
class NseFuenteDeIngreso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nse_fuente_de_ingreso';
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
            'cod_fuente_ing' => 'Cod Fuente Ing',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAludatis()
    {
        return $this->hasMany(Aludati::className(), ['cod_fuente_ing' => 'cod_fuente_ing']);
    }

    /**
     * @inheritdoc
     * @return NseFuenteDeIngresoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NseFuenteDeIngresoQuery(get_called_class());
    }
}

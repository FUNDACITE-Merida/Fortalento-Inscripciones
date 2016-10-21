<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "nse_ingreso_familiar".
 *
 * @property integer $cod_ing_fam
 * @property string $descripcion
 * @property string $cod_proceso
 *
 * @property Aludati[] $aludatis
 * @property FechasProceso $codProceso
 */
class NseIngresoFamiliar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nse_ingreso_familiar';
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
            [['cod_ing_fam', 'cod_proceso'], 'required'],
            [['cod_ing_fam'], 'integer'],
            [['descripcion'], 'string', 'max' => 50],
            [['cod_proceso'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod_ing_fam' => 'Cod Ing Fam',
            'descripcion' => 'Descripcion',
            'cod_proceso' => 'Cod Proceso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAludatis()
    {
        return $this->hasMany(Aludati::className(), ['cod_proceso' => 'cod_proceso', 'cod_ing_fam' => 'cod_ing_fam']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodProceso()
    {
        return $this->hasOne(FechasProceso::className(), ['cod_proceso' => 'cod_proceso']);
    }

    /**
     * @inheritdoc
     * @return NseIngresoFamiliarQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NseIngresoFamiliarQuery(get_called_class());
    }
}

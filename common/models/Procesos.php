<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%procesos}}".
 *
 * @property integer $id
 * @property string $codigo
 * @property string $nombre
 * @property integer $fecha_inicio
 * @property integer $fecha_fin
 */
class Procesos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%procesos}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'nombre', 'fecha_inicio', 'fecha_fin'], 'required'],
            [['fecha_inicio', 'fecha_fin'], 'integer'],
            [['codigo'], 'string', 'max' => 6],
            [['nombre'], 'string', 'max' => 256],
            [['codigo'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Clave primaria, autoincremental'),
            'codigo' => Yii::t('app', 'Código único que identifica el proceso'),
            'nombre' => Yii::t('app', 'Nombre del proceso'),
            'fecha_inicio' => Yii::t('app', 'Fecha de inicio del ptroceso'),
            'fecha_fin' => Yii::t('app', 'Fecha de fin del ptroceso'),
        ];
    }

    /**
     * @inheritdoc
     * @return ProcesosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProcesosQuery(get_called_class());
    }
}

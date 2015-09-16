<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "procesos".
 *
 * @property integer $id
 * @property string $codigo
 * @property string $nombre
 * @property string $fecha_inicio
 * @property string $fecha_fin
 *
 * @property EstudioSocioEconomico[] $estudioSocioEconomicos
 * @property Inscripciones[] $inscripciones
 */
class Procesos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'procesos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'nombre', 'fecha_inicio', 'fecha_fin'], 'required'],
            [['fecha_inicio', 'fecha_fin'], 'safe'],
            [['codigo'], 'string', 'max' => 6],
            [['nombre'], 'string', 'max' => 256],
            [['codigo'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Clave primaria, autoincremental',
            'codigo' => 'Codigo',
            'nombre' => 'Nombre',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_fin' => 'Fecha Fin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstudioSocioEconomicos()
    {
        return $this->hasMany(EstudioSocioEconomico::className(), ['id_proceso' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscripciones()
    {
        return $this->hasMany(Inscripciones::className(), ['id_proceso' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ProcesosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProcesosQuery(get_called_class());
    }
    
    public static function getProcesoAbierto()
    {
		$fechaActual = Yii::$app->formatter->asDate('now', 'yyyy-MM-dd');;
		return $model = Procesos::find()->where(['<=', 'fecha_inicio', $fechaActual])->andWhere(['>=', 'fecha_fin', $fechaActual])->one();
	}
	
	/*
	 * Retorna el Id del proceso abierto actualmente
	 */
	public static function getIdProcesoAbierto()
	{
		if ($proceso = self::getProcesoAbierto())
		{
			return $proceso->id;
		}
		
		return null;
	}
	/*
	 * Retorna el Codigo del proceso abierto actualmente
	 */
	public static function getCodigoProcesoAbierto()
	{
		if ($proceso = self::getProcesoAbierto())
		{
			return $proceso->codigo;
		}
		
		return null;
	}
}

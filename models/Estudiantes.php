<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estudiantes".
 *
 * @property integer $id
 * @property string $cedula
 * @property string $nombre
 * @property string $apellido
 * @property string $fecha_nacimiento
 * @property string $lugar_nacimiento
 * @property string $genero
 * @property boolean $es_venezolano
 * @property integer $id_user
 *
 * @property EstudioSocioEconomico[] $estudioSocioEconomicos
 * @property Inscripciones[] $inscripciones
 */
class Estudiantes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estudiantes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cedula', 'nombre', 'apellido', 'fecha_nacimiento', 'lugar_nacimiento', 'genero', 'es_venezolano', 'id_user'], 'required'],
            [['fecha_nacimiento'], 'safe'],
            [['fecha_nacimiento'], 'date', 'max' => Yii::$app->formatter->asDate('now')],
            //[['fecha_nacimiento'], 'match', 'pattern' => '/^[1-31]-[0-12]-[1900-2021]*$/'],
            [['es_venezolano'], 'boolean'],
            [['id_user'], 'integer'],
            [['cedula'], 'string', 'max' => 8, 'tooLong' => '{attribute} deberia contener máximo 8 números'],
            [['cedula'], 'match', 'pattern' => '/^[0-9]*$/'],
            [['nombre', 'apellido', 'lugar_nacimiento'], 'string', 'max' => 256],
            [['genero'], 'string', 'max' => 1],
            [['id_user'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Clave primaria, autoincremental',
            'cedula' => 'Cédula de identidad',
            'nombre' => 'Primer nombre e inicial del segundo',
            'apellido' => 'Primer apellido e inicial del segundo',
            'fecha_nacimiento' => 'Fecha de nacimiento',
            'lugar_nacimiento' => 'Lugar de nacimiento',
            'genero' => 'Sexo',
            'es_venezolano' => 'Nacionalidad',
            'id_user' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstudioSocioEconomicos()
    {
        return $this->hasMany(EstudioSocioEconomico::className(), ['id_estudiante' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscripciones()
    {
        return $this->hasMany(Inscripciones::className(), ['id_estudiante' => 'id']);
    }

    /**
     * @inheritdoc
     * @return EstudiantesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EstudiantesQuery(get_called_class());
    }
    
    public static function getEstudianteUser()
    {
		return Estudiantes::findOne(['id_user' => Yii::$app->user->id]);
	}
	
	/*
	 * Retorna el modelo Inscripcion del estudiante actual
	 */
	public function getInscripcion()
	{
		return Inscripciones::findOne([
						'id_estudiante' => $this->id,
						'id_proceso' => Procesos::getIdProcesoAbierto(),
				]);
	}
	
	/*
	 * Retorna el modelo EstudioSocioEconomico del estudiante actual
	 */
	public function getEstudioSocioEconomico()
	{
		return EstudioSocioEconomico::findOne([
						'id_estudiante' => $this->id,
						'id_proceso' => Procesos::getIdProcesoAbierto(),
				]);
	}
	
	
	public function afterFind()
	{
		if (!$this->es_venezolano)
			$this->es_venezolano = 0;
		// Formatea la fecha según se ha configurado en config/web.php
		// 'formatter' => [
        //	   'dateFormat' => 'dd-MM-yyyy',
        // ]
            
		$this->fecha_nacimiento = Yii::$app->formatter->asDate($this->fecha_nacimiento);
		
		parent::afterFind();
	}
}

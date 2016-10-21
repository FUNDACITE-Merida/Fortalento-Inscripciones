<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%estudiantes}}".
 *
 * @property integer $id
 * @property string $cedula
 * @property string $nombre
 * @property string $apellido
 * @property integer $fecha_nacimiento
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
	public $no_cedula = false;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%estudiantes}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			[['nombre', 'apellido', 'fecha_nacimiento', 'lugar_nacimiento', 'genero', 'es_venezolano', 'id_user'], 'required'],
            [['id_user'], 'integer'],
			[['no_cedula'], 'safe'],
			[['fecha_nacimiento'], 'date', 'max' => Yii::$app->formatter->asDate('now')],
            [['es_venezolano'], 'boolean'],
            [['cedula'], 'string', 'max' => 8, 'tooLong' => '{attribute} deberia contener máximo 8 números'],
            [['cedula'], 'match', 'pattern' => '/^[0-9]*$/'],
            [['nombre', 'apellido', 'lugar_nacimiento'], 'string', 'max' => 256],
            [['genero'], 'string', 'max' => 1],
            [['cedula'], 'unique'], 
            [['id_user'], 'unique'],

			//caso especial cuando no se tiene cédula, el campo (cédula) no será requerido
            
            ['cedula', 'required', 'when' => function ($model) {
				return $model->no_cedula == false;
			}, 'whenClient' => "function (attribute, value) {
					return $('#estudiantes-no_cedula').is(':checked') == false;
				}"],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Clave primaria, autoincremental'),
            'cedula' => Yii::t('app', 'Cédula de identidad'),
            'nombre' => Yii::t('app', 'Primer nombre e inicial del segundo'),
            'apellido' => Yii::t('app', 'Primer apellido e inicial del segundo'),
            'fecha_nacimiento' => Yii::t('app', 'Fecha de nacimiento'),
            'lugar_nacimiento' => Yii::t('app', 'Lugar de nacimiento'),
            'genero' => Yii::t('app', 'Sexo'),
            'es_venezolano' => Yii::t('app', 'Nacionalidad'),
            'id_user' => Yii::t('app', 'Id del usuario que registró al estudiante'),
			'no_cedula' => Yii::t('app', 'No tengo cédula'),
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
     * by LJAH
     * Relación con el modelo User
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
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
		
		if (empty($this->cedula))
			$this->no_cedula = true;
		// Formatea la fecha según se ha configurado en config/web.php
		// 'formatter' => [
        //	   'dateFormat' => 'dd-MM-yyyy',
        // ]
            
		$this->fecha_nacimiento = Yii::$app->formatter->asDate($this->fecha_nacimiento);
		
		parent::afterFind();
	}
	
	public function beforeSave()
	{
		if ($this->no_cedula)
		{
			//$this->cedula = '00000'.rand(1, 999);
			//echo $this->validate(array('cedula'));
			do
			{
				//$this->cedula = '00000'.rand(1, 999);
				$this->cedula = '00000'.rand(1, 999);
			}while (!($this->validate(array('cedula'))));
		}
        $this->fecha_nacimiento = Yii::$app->formatter->asTimeStamp($this->fecha_nacimiento);
		return true;
	}
}

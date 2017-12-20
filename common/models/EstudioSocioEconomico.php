<?php

namespace common\models;
use yii\helpers\Html;

use Yii;

/**
 * This is the model class for table "{{%estudio_socio_economico}}".
 *
 * @property integer $id
 * @property integer $id_proceso
 * @property integer $id_estudiante
 * @property integer $n_planilla_inscripcion
 * @property string $codigo_ultimo_grado
 * @property boolean $vive_con_padres_solicitante
 * @property string $telefono_fijo_solicitante
 * @property string $telefono_celular_solicitante
 * @property string $apellidos_padre
 * @property string $nombres_padre
 * @property string $cedula_padre
 * @property integer $grado_instruccion_padre
 * @property string $telefono_fijo_padre
 * @property string $telefono_celular_padre
 * @property string $profesion_padre
 * @property string $ocupacion_padre
 * @property string $lugar_trabajo_padre
 * @property double $ingreso_mensual_padre
 * @property string $direccion_trabajo_padre
 * @property string $correo_e_padre
 * @property string $direccion_habitacion_padre
 * @property string $apellidos_madre
 * @property string $nombres_madre
 * @property string $cedula_madre
 * @property integer $grado_instruccion_madre
 * @property string $telefono_fijo_madre
 * @property string $telefono_celular_madre
 * @property string $profesion_madre
 * @property string $ocupacion_madre
 * @property string $lugar_trabajo_madre
 * @property double $ingreso_mensual_madre
 * @property string $direccion_trabajo_madre
 * @property string $correo_e_madre
 * @property string $direccion_habitacion_madre
 * @property string $apellidos_representante
 * @property string $nombres_representante
 * @property string $cedula_representante
 * @property integer $grado_instruccion_representante
 * @property string $telefono_fijo_representante
 * @property string $telefono_celular_representante
 * @property string $profesion_representante
 * @property string $ocupacion_representante
 * @property string $lugar_trabajo_representante
 * @property double $ingreso_mensual_representante
 * @property string $direccion_trabajo_representante
 * @property string $correo_e_representante
 * @property string $direccion_habitacion_representante
 *
 * @property Estudiantes $idEstudiante
 * @property Inscripciones $nPlanillaInscripcion
 * @property Procesos $idProceso
 */
class EstudioSocioEconomico extends \yii\db\ActiveRecord
{
    const REP_ES_OTRO = 0;
    const REP_ES_MADRE = 1;
    const REP_ES_PADRE = 2;
    public $es_representante = self::REP_ES_OTRO;
    public $es_representante_data = array(
			self::REP_ES_OTRO => 'Otro',
			self::REP_ES_MADRE => 'Madre',
			self::REP_ES_PADRE => 'Padre',
		  );
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%estudio_socio_economico}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
		/* No se solicita el campo vive_con_padres_solicitante para el para el proceso 2017-2018 */
        return [
            [['id_proceso', 'id_estudiante', 'n_planilla_inscripcion', 'codigo_ultimo_grado', /*'vive_con_padres_solicitante'*/], 'required'],
            [['id_proceso', 'id_estudiante', 'n_planilla_inscripcion', 'grado_instruccion_padre', 'grado_instruccion_madre', 'grado_instruccion_representante'], 'integer'],
            //[['grado_instruccion_representante'], 'in', 'range' => [1, 2, 3]],
            [['vive_con_padres_solicitante'], 'boolean'],
            [['ingreso_mensual_padre', 'ingreso_mensual_madre', 'ingreso_mensual_representante'], 'number'],
            [['codigo_ultimo_grado'], 'string', 'max' => 4],
            [['telefono_fijo_solicitante', 'telefono_celular_solicitante', 'telefono_fijo_padre', 'telefono_celular_padre', 'telefono_fijo_madre', 'telefono_celular_madre', 'telefono_fijo_representante', 'telefono_celular_representante'], 'string', 'max' => 11, 'min' => 11, 'tooShort' => '{attribute} deberia contener 11 números', 'tooLong' => '{attribute} deberia contener 11 números'],
            //[['telefono_fijo_solicitante', 'telefono_celular_solicitante', 'telefono_fijo_padre', 'telefono_celular_padre', 'telefono_fijo_madre', 'telefono_celular_madre', 'telefono_fijo_representante', 'telefono_celular_representante'], 'match', 'pattern' => '/^[0][2,4][0-9]*$/'],
            [['apellidos_padre', 'nombres_padre', 'profesion_padre', 'ocupacion_padre', 'apellidos_madre', 'nombres_madre', 'profesion_madre', 'ocupacion_madre', 'apellidos_representante', 'nombres_representante', 'profesion_representante', 'ocupacion_representante'], 'string', 'max' => 128],
            [['cedula_padre', 'cedula_madre', 'cedula_representante'], 'string', 'max' => 8, 'tooLong' => '{attribute} deberia contener máximo 8 números'],
            [['cedula_padre', 'cedula_madre', 'cedula_representante'], 'match', 'pattern' => '/^[0-9]*$/'],
            [['lugar_trabajo_padre', 'direccion_trabajo_padre', 'correo_e_padre', 'direccion_habitacion_padre', 'lugar_trabajo_madre', 'direccion_trabajo_madre', 'correo_e_madre', 'direccion_habitacion_madre', 'lugar_trabajo_representante', 'direccion_trabajo_representante', 'correo_e_representante', 'direccion_habitacion_representante'], 'string', 'max' => 256],
            [['correo_e_padre','correo_e_madre','correo_e_representante'], 'email'],
			[['id_estudiante'], 'exist', 'skipOnError' => true, 'targetClass' => Estudiantes::className(), 'targetAttribute' => ['id_estudiante' => 'id']],
            [['id_proceso'], 'exist', 'skipOnError' => true, 'targetClass' => Procesos::className(), 'targetAttribute' => ['id_proceso' => 'id']],
            [['tipo_cuenta_bancaria_representante','banco_representante','cuenta_bancaria_representante'],'required'], 
            [['cuenta_bancaria_representante'], 'string', 'length' => 20, 'notEqual' => '{attribute} debe contener 20 números'],
            [['cuenta_bancaria_representante'], 'match', 'pattern' => '/^[0-9]*$/'],

            // Validaciones para seleccionar el representante
            ['es_representante', 'integer',	'min' => 0, 'max' => 2],
            
            // Si es OTRO
            [['apellidos_representante', 'nombres_representante', 'cedula_representante', 'grado_instruccion_representante', 'telefono_fijo_representante', 
            'telefono_celular_representante', 'profesion_representante', 'ocupacion_representante', 'lugar_trabajo_representante', 'ingreso_mensual_representante', 
            'direccion_trabajo_representante', 'direccion_habitacion_representante', 'correo_e_representante'], 'required',
            'when' => function ($model) {
							return $model->es_representante == self::REP_ES_OTRO;
				}, 'whenClient' => "function (attribute, value) {
						return $('#".Html::getInputId($this, 'es_representante')."').val() == ".self::REP_ES_OTRO.";
					}"
            ],

            // Si es MADRE
            [['apellidos_madre', 'nombres_madre', 'cedula_madre', 'grado_instruccion_madre', 'telefono_fijo_madre', 
            'telefono_celular_madre', 'profesion_madre', 'ocupacion_madre', 'lugar_trabajo_madre', 'ingreso_mensual_madre', 
            'direccion_trabajo_madre', 'direccion_habitacion_madre', 'correo_e_madre'], 'required',
            'when' => function ($model) {
							return $model->es_representante == self::REP_ES_MADRE;
				}, 'whenClient' => "function (attribute, value) {
						return $('#".Html::getInputId($this, 'es_representante')."').val() == ".self::REP_ES_MADRE.";
					}"
            ],

            // Si es PADRE
            [['apellidos_padre', 'nombres_padre', 'cedula_padre', 'grado_instruccion_padre', 'telefono_fijo_padre', 
            'telefono_celular_padre', 'profesion_padre', 'ocupacion_padre', 'lugar_trabajo_padre', 'ingreso_mensual_padre', 
            'direccion_trabajo_padre', 'direccion_habitacion_padre', 'correo_e_padre'], 'required',
            'when' => function ($model) {
							return $model->es_representante == self::REP_ES_PADRE;
				}, 'whenClient' => "function (attribute, value) {
						return $('#".Html::getInputId($this, 'es_representante')."').val() == ".self::REP_ES_PADRE.";
					}"
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Clave primaria, autoincremental.'),
            'id_proceso' => Yii::t('app', 'Clave foránea que referencia a la tabla procesos'),
            'id_estudiante' => Yii::t('app', 'Clave foránea que referencia a la tabla estudiantes'),
            'n_planilla_inscripcion' => Yii::t('app', 'Clave foránea que referencia a la tabla inscripciones'),
            'codigo_ultimo_grado' => Yii::t('app', 'Código del último grado culminado por el estudiante. Clave foránea que referencia a la tabla grados del sistema Fortalento'),
            'vive_con_padres_solicitante' => Yii::t('app', '¿Vive con los padres?'),
            'telefono_fijo_solicitante' => Yii::t('app', 'Teléfono fijo'),
            'telefono_celular_solicitante' => Yii::t('app', 'Teléfono celular'),
            'apellidos_padre' => Yii::t('app', 'Apellidos del padre'),
            'nombres_padre' => Yii::t('app', 'Nombres del padre'),
            'cedula_padre' => Yii::t('app', 'Cédula de identidad del padre'),
            'grado_instruccion_padre' => Yii::t('app', 'Grado de instrucción del padre'),
            'telefono_fijo_padre' => Yii::t('app', 'Teléfono fijo del padre'),
            'telefono_celular_padre' => Yii::t('app', 'Teléfono celular del Padre'),
            'profesion_padre' => Yii::t('app', 'Profesión del padre'),
            'ocupacion_padre' => Yii::t('app', 'Ocupación del padre'),
            'lugar_trabajo_padre' => Yii::t('app', 'Lugar de trabajo del padre'),
            'ingreso_mensual_padre' => Yii::t('app', 'Ingreso mensual del padre'),
            'direccion_trabajo_padre' => Yii::t('app', 'Dirección de trabajo del padre'),
            'correo_e_padre' => Yii::t('app', 'Correo electrónico del padre'),
            'direccion_habitacion_padre' => Yii::t('app', 'Dirección de habitación del padre'),
            'apellidos_madre' => Yii::t('app', 'Apellidos de la madre'),
            'nombres_madre' => Yii::t('app', 'Nombres de la madre'),
            'cedula_madre' => Yii::t('app', 'Cédula de identidad de la madre'),
            'grado_instruccion_madre' => Yii::t('app', 'Grado de instrucción de la madre'),
            'telefono_fijo_madre' => Yii::t('app', 'Teléfono fijo de la madre'),
            'telefono_celular_madre' => Yii::t('app', 'Teléfono celular de la madre'),
            'profesion_madre' => Yii::t('app', 'Profesión de la madre'),
            'ocupacion_madre' => Yii::t('app', 'Ocupación de la madre'),
            'lugar_trabajo_madre' => Yii::t('app', 'Lugar de trabajo de la madre'),
            'ingreso_mensual_madre' => Yii::t('app', 'Ingreso mensual de la madre'),
            'direccion_trabajo_madre' => Yii::t('app', 'Dirección de trabajo de la madre'),
            'correo_e_madre' => Yii::t('app', 'Correo electrónico de la madre'),
            'direccion_habitacion_madre' => Yii::t('app', 'Dirección de habitación de la madre'),
            'apellidos_representante' => Yii::t('app', 'Apellidos del representante'),
            'nombres_representante' => Yii::t('app', 'Nombres del representante'),
            'cedula_representante' => Yii::t('app', 'Cédula de identidad del representante'),
            'grado_instruccion_representante' => Yii::t('app', 'Grado instrucción del representante'),
            'telefono_fijo_representante' => Yii::t('app', 'Teléfono fijo del representante'),
            'telefono_celular_representante' => Yii::t('app', 'Teléfono celular del representante'),
            'profesion_representante' => Yii::t('app', 'Profesión del representante'),
            'ocupacion_representante' => Yii::t('app', 'Ocupación del representante'),
            'lugar_trabajo_representante' => Yii::t('app', 'Lugar de trabajo del representante'),
            'ingreso_mensual_representante' => Yii::t('app', 'Ingreso mensual del representante'),
            'direccion_trabajo_representante' => Yii::t('app', 'Dirección de trabajo del representante'),
            'correo_e_representante' => Yii::t('app', 'Correo electrónico del representante'),
            'direccion_habitacion_representante' => Yii::t('app', 'Dirección de habitación del representante'),
            'es_representante' => Yii::t('app', 'Seleccione el representante'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstudiante()
    {
        return $this->hasOne(Estudiantes::className(), ['id' => 'id_estudiante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNPlanillaInscripcion()
    {
        return $this->hasOne(Inscripciones::className(), ['id' => 'n_planilla_inscripcion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProceso()
    {
        return $this->hasOne(Procesos::className(), ['id' => 'id_proceso']);
    }

    /**
     * @inheritdoc
     * @return EstudioSocioEconomicoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EstudioSocioEconomicoQuery(get_called_class());
    }
    
    public function afterFind()
	{
		if (!$this->vive_con_padres_solicitante)
			$this->vive_con_padres_solicitante = 0;
		// Formatea la fecha según se ha configurado en config/web.php
		// 'formatter' => [
        //	   'dateFormat' => 'dd-MM-yyyy',
        // ]
            
		//$this->fecha_nacimiento = Yii::$app->formatter->asDate($this->fecha_nacimiento);
		
		parent::afterFind();
	}

    public function beforeSave($insert){
        if (parent::beforeSave($insert)) {
            if ($this->es_representante == self::REP_ES_MADRE){
                $this->apellidos_representante = $this->apellidos_madre;
                $this->nombres_representante = $this->nombres_madre;
                $this->cedula_representante = $this->cedula_madre;
                $this->grado_instruccion_representante = $this->grado_instruccion_madre;
                $this->telefono_fijo_representante = $this->telefono_fijo_madre;
                $this->telefono_celular_representante = $this->telefono_celular_madre;
                $this->profesion_representante = $this->profesion_madre;
                $this->ocupacion_representante = $this->ocupacion_madre;
                $this->lugar_trabajo_representante = $this->lugar_trabajo_madre;
                $this->ingreso_mensual_representante = $this->ingreso_mensual_madre;
                $this->direccion_trabajo_representante = $this->direccion_trabajo_madre;
                $this->direccion_habitacion_representante = $this->direccion_habitacion_madre;
                $this->correo_e_representante=$this->correo_e_madre;
            }

            if ($this->es_representante == self::REP_ES_PADRE){
                $this->apellidos_representante = $this->apellidos_padre;
                $this->nombres_representante = $this->nombres_padre;
                $this->cedula_representante = $this->cedula_padre;
                $this->grado_instruccion_representante = $this->grado_instruccion_padre;
                $this->telefono_fijo_representante = $this->telefono_fijo_padre;
                $this->telefono_celular_representante = $this->telefono_celular_padre;
                $this->profesion_representante = $this->profesion_padre;
                $this->ocupacion_representante = $this->ocupacion_padre;
                $this->lugar_trabajo_representante = $this->lugar_trabajo_padre;
                $this->ingreso_mensual_representante = $this->ingreso_mensual_padre;
                $this->direccion_trabajo_representante = $this->direccion_trabajo_padre;
                $this->direccion_habitacion_representante = $this->direccion_habitacion_padre;
                $this->correo_e_representante=$this->correo_e_padre;
            }
            return true;
        } else {
            return false;
        }
    }
}

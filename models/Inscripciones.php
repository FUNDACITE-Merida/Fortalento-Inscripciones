<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inscripciones".
 *
 * @property integer $id
 * @property integer $id_proceso
 * @property integer $id_estudiante
 * @property string $fecha_inscripcion
 * @property string $codigo_plantel
 * @property string $localidad_plantel
 * @property string $codigo_ultimo_grado
 * @property string $postulado_para
 * @property double $promedio
 * @property double $nota1
 * @property double $nota2
 * @property double $nota3
 * @property integer $codigo_profesion_jefe_familia
 * @property integer $codigo_nivel_instruccion_madre
 * @property integer $codigo_fuente_ingreso_familia
 * @property integer $codigo_vivienda_familia
 * @property integer $codigo_ingreso_familia
 * @property integer $codigo_grupo_familiar
 *
 * @property EstudioSocioEconomico[] $estudioSocioEconomicos
 * @property Estudiantes $idEstudiante
 * @property Procesos $idProceso
 */
class Inscripciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inscripciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_proceso', 'id_estudiante', 'fecha_inscripcion', 'codigo_plantel', 'localidad_plantel', 'codigo_ultimo_grado', 'codigo_profesion_jefe_familia', 'codigo_nivel_instruccion_madre', 'codigo_fuente_ingreso_familia', 'codigo_vivienda_familia', 'codigo_ingreso_familia', 'codigo_grupo_familiar'], 'required'],
            [['id_proceso', 'id_estudiante', 'codigo_profesion_jefe_familia', 'codigo_nivel_instruccion_madre', 'codigo_fuente_ingreso_familia', 'codigo_vivienda_familia', 'codigo_ingreso_familia', 'codigo_grupo_familiar'], 'integer'],
            [['fecha_inscripcion'], 'safe'],
            [['fecha_inscripcion'], 'date', 'max' => Yii::$app->formatter->asDate('now')],
            [['promedio', 'nota1', 'nota2', 'nota3'], 'number', 
				'numberPattern' => '/^\s*[-+]?[0-9]*\,?[0-9]+([eE][-+]?[0-9]+)?\s*$/',
				'min' => 10, 'max' => 20],
            [['codigo_plantel'], 'string', 'max' => 10],
            [['localidad_plantel'], 'string', 'max' => 256],
            [['codigo_ultimo_grado'], 'string', 'max' => 4],
            [['postulado_para_beca'], 'string', 'max' => 1],
            [['postulado_para_premio'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Nº de planilla de inscripción',
            'id_proceso' => 'Clave foránea que referencia a la tabla procesos',
            'id_estudiante' => 'Clave foránea que referencia a la tabla estudiantes',
            'fecha_inscripcion' => 'Fecha de solicitud',
            'codigo_plantel' => 'Seleccione el plantel',
            'localidad_plantel' => 'Localidad del plantel',
            'codigo_ultimo_grado' => 'Último año/grado culminado',
            'postulado_para_beca' => 'Premio beca-estímulo al alto rendimiento estudiantil',
            'postulado_para_premio' => 'Premio de reconocimiento a la excelencia',
            'promedio' => 'Promedio de notas',
            'nota1' => 'Promedio global 1',
            'nota2' => 'Promedio global 2',
            'nota3' => 'Promedio global 3',
            'codigo_profesion_jefe_familia' => 'Profesion del jefe familia',
            'codigo_nivel_instruccion_madre' => 'Nivel de instruccion madre',
            'codigo_fuente_ingreso_familia' => 'Fuente de ingreso familiar',
            'codigo_vivienda_familia' => 'Alojamiento y vivienda',
            'codigo_ingreso_familia' => 'Ingreso familiar',
            'codigo_grupo_familiar' => 'Grupo familiar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstudioSocioEconomicos()
    {
        return $this->hasMany(EstudioSocioEconomico::className(), ['n_planilla_inscripcion' => 'id']);
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
    public function getIdProceso()
    {
        return $this->hasOne(Procesos::className(), ['id' => 'id_proceso']);
    }

    /**
     * @inheritdoc
     * @return InscripcionesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InscripcionesQuery(get_called_class());
    }
    
    public function afterFind()
	{
		
		// Formatea la fecha según se ha configurado en config/web.php
		// 'formatter' => [
        //	   'dateFormat' => 'dd-MM-yyyy',
        // ]
            
		$this->fecha_inscripcion = Yii::$app->formatter->asDate($this->fecha_inscripcion);
		
		parent::afterFind();
	}
	
	public function getEdadEstudiante() {
		list($d,$m,$Y) = explode("-",$this->idEstudiante->fecha_nacimiento);
		return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
	}
}

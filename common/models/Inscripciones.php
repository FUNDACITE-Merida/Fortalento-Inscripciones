<?php

namespace common\models;


use Yii;
use backend\models\Procesos;

/**
 * This is the model class for table "{{%inscripciones}}".
 *
 * @property integer $id
 * @property integer $id_proceso
 * @property integer $id_estudiante
 * @property integer $fecha_inscripcion
 * @property string $codigo_plantel
 * @property string $localidad_plantel
 * @property string $codigo_ultimo_grado
 * @property string $postulado_para_beca
 * @property string $postulado_para_premio
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
 * @property boolean $cerrada
 *
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
        return '{{%inscripciones}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_proceso', 'id_estudiante', 'fecha_inscripcion', 'codigo_plantel', 'localidad_plantel', 'codigo_ultimo_grado', 'postulado_para_beca', 'postulado_para_premio', 'codigo_profesion_jefe_familia', 'codigo_nivel_instruccion_madre', 'codigo_fuente_ingreso_familia', 'codigo_vivienda_familia', 'codigo_ingreso_familia', 'codigo_grupo_familiar'], 'required'],
            [['id_proceso', 'id_estudiante', 'fecha_inscripcion', 'codigo_profesion_jefe_familia', 'codigo_nivel_instruccion_madre', 'codigo_fuente_ingreso_familia', 'codigo_vivienda_familia', 'codigo_ingreso_familia', 'codigo_grupo_familiar'], 'integer'],
            [['promedio', 'nota1', 'nota2', 'nota3'], 'number'],
            [['cerrada'], 'boolean'],
            [['codigo_plantel'], 'string', 'max' => 10],
            [['localidad_plantel', 'postulado_para_beca', 'postulado_para_premio'], 'string', 'max' => 256],
            [['codigo_ultimo_grado'], 'string', 'max' => 4],
            [['id_estudiante'], 'exist', 'skipOnError' => true, 'targetClass' => Estudiantes::className(), 'targetAttribute' => ['id_estudiante' => 'id']],
            [['id_proceso'], 'exist', 'skipOnError' => true, 'targetClass' => Procesos::className(), 'targetAttribute' => ['id_proceso' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Clave primaria, autoincremental. Este id servirá a la vez como número de planilla de inscripción a efecto de los reportes. No se creo un campo especial para el número de planilla ya que en la práctica cumpliría la misma función que está haciendo el id.'),
            'id_proceso' => Yii::t('app', 'Clave foránea que referencia a la tabla procesos'),
            'id_estudiante' => Yii::t('app', 'Clave foránea que referencia a la tabla estudiantes'),
            'fecha_inscripcion' => Yii::t('app', 'Fecha en que se realiza la inscripción en timestamp'),
            'codigo_plantel' => Yii::t('app', 'Código del plantel de donde proviene el estudiante'),
            'localidad_plantel' => Yii::t('app', 'Localidad del plantel de donde proviene el estudiante'),
            'codigo_ultimo_grado' => Yii::t('app', 'Código del último grado cursado por el estudiante'),
            'postulado_para_beca' => Yii::t('app', 'Almacena el valor de la postulación del estudiante, B para Beca'),
            'postulado_para_premio' => Yii::t('app', 'Almacena el valor de la postulación del estudiante, P para Premio'),
            'promedio' => Yii::t('app', 'Promedio de notas del último año/grado cursado por el estudiante'),
            'nota1' => Yii::t('app', '1ero de los promedios de los tres últimos años cursados por el estudiante'),
            'nota2' => Yii::t('app', '2do de los promedios de los tres últimos años cursados por el estudiante'),
            'nota3' => Yii::t('app', '3ero de los promedios de los tres últimos años cursados por el estudiante'),
            'codigo_profesion_jefe_familia' => Yii::t('app', 'Número que identifica la profesión del jefe de familia'),
            'codigo_nivel_instruccion_madre' => Yii::t('app', 'Número que identifica el nivel de instrucción de la madre'),
            'codigo_fuente_ingreso_familia' => Yii::t('app', 'Número que identifica la fuente de ingreso familiar'),
            'codigo_vivienda_familia' => Yii::t('app', 'Número que identifica el tipo de vivienda de la familia'),
            'codigo_ingreso_familia' => Yii::t('app', 'Número que identifica el monto de ingreso familiar'),
            'codigo_grupo_familiar' => Yii::t('app', 'Número que identifica la cantidad de personas que conforman el grupo familiar'),
            'cerrada' => Yii::t('app', 'Si está en True la inscripción ha sido cerrada, si está en False la inscripción está abierta. Una inscripción se considera cerrada si el usuario ha llenado todos los campos requeridos para la inscripción.'),
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
}

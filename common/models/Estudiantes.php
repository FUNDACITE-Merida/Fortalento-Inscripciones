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
            [['cedula', 'nombre', 'apellido', 'fecha_nacimiento', 'lugar_nacimiento', 'genero', 'es_venezolano', 'id_user'], 'required'],
            [['fecha_nacimiento', 'id_user'], 'integer'],
            [['es_venezolano'], 'boolean'],
            [['cedula'], 'string', 'max' => 10],
            [['nombre', 'apellido', 'lugar_nacimiento'], 'string', 'max' => 256],
            [['genero'], 'string', 'max' => 1],
            [['cedula'], 'unique'],
            [['id_user'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Clave primaria, autoincremental'),
            'cedula' => Yii::t('app', 'Cédula de identidad del estudiantes'),
            'nombre' => Yii::t('app', 'Nombre del estudiante'),
            'apellido' => Yii::t('app', 'Apellido del estudiante'),
            'fecha_nacimiento' => Yii::t('app', 'Fecha de nacimiento del estudiante en timestamp'),
            'lugar_nacimiento' => Yii::t('app', 'Lugar de nacimiento del estudiante'),
            'genero' => Yii::t('app', 'Género del estudiante, M: Masculino, f: Femenino'),
            'es_venezolano' => Yii::t('app', 'Especifica si el estudiante es venezolano o extranjero'),
            'id_user' => Yii::t('app', 'Id del usuario que registró al estudiante'),
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
}

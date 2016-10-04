<?php

use yii\db\Migration;

class m161004_151017_inscripciones extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%inscripciones}}', [
            'id' => $this->primaryKey()->notNull()->comment('Clave primaria, autoincremental. Este id servirá a la vez como número de planilla de inscripción a efecto de los reportes. No se creo un campo especial para el número de planilla ya que en la práctica cumpliría la misma función que está haciendo el id.'),
            'id_proceso' => $this->integer()->notNull()->comment('Clave foránea que referencia a la tabla procesos'),
            'id_estudiante' => $this->integer()->notNull()->comment('Clave foránea que referencia a la tabla estudiantes'),
            'fecha_inscripcion' => $this->integer()->notNull()->comment('Fecha en que se realiza la inscripción en timestamp'),
            'codigo_plantel' => $this->string(10)->notNull()->comment('Código del plantel de donde proviene el estudiante'),
            'localidad_plantel' => $this->string(256)->notNull()->comment('Localidad del plantel de donde proviene el estudiante'),
            'codigo_ultimo_grado' => $this->string(4)->notNull()->comment('Código del último grado cursado por el estudiante'),
            'postulado_para_beca' => $this->string(256)->notNull()->comment('Almacena el valor de la postulación del estudiante, B para Beca'),
            'postulado_para_premio' => $this->string(256)->notNull()->comment('Almacena el valor de la postulación del estudiante, P para Premio'),
            'promedio' => $this->double()->notNull()->defaultValue(0)->comment('Promedio de notas del último año/grado cursado por el estudiante'),
            'nota1' => $this->double()->notNull()->defaultValue(0)->comment('1ero de los promedios de los tres últimos años cursados por el estudiante'),
            'nota2' => $this->double()->notNull()->defaultValue(0)->comment('2do de los promedios de los tres últimos años cursados por el estudiante'),
            'nota3' => $this->double()->notNull()->defaultValue(0)->comment('3ero de los promedios de los tres últimos años cursados por el estudiante'),
            'codigo_profesion_jefe_familia' => $this->integer()->notNull()->comment('Número que identifica la profesión del jefe de familia'),
            'codigo_nivel_instruccion_madre' => $this->integer()->notNull()->comment('Número que identifica el nivel de instrucción de la madre'),
            'codigo_fuente_ingreso_familia' => $this->integer()->notNull()->comment('Número que identifica la fuente de ingreso familiar'),
            'codigo_vivienda_familia' => $this->integer()->notNull()->comment('Número que identifica el tipo de vivienda de la familia'),
            'codigo_ingreso_familia' => $this->integer()->notNull()->comment('Número que identifica el monto de ingreso familiar'),
            'codigo_grupo_familiar' => $this->integer()->notNull()->comment('Número que identifica la cantidad de personas que conforman el grupo familiar'),
            'cerrada' => $this->boolean()->notNull()->defaultValue(false)->comment('Si está en True la inscripción ha sido cerrada, si está en False la inscripción está abierta. Una inscripción se considera cerrada si el usuario ha llenado todos los campos requeridos para la inscripción.'),
        ], $tableOptions);
        
        $this->addForeignKey(
            'inscripciones_id_estudiante_fk',
            '{{%inscripciones}}',
            'id_estudiante',
            '{{%estudiantes}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'inscripciones_id_proceso_fk',
            '{{%inscripciones}}',
            'id_proceso',
            '{{%procesos}}',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey(
            'inscripciones_id_estudiante_fk',
            '{{%inscripciones}}'
        );

        $this->dropForeignKey(
            'inscripciones_id_proceso_fk',
            '{{%inscripciones}}'
        );

        $this->dropTable('{{%inscripciones}}');
    }
}

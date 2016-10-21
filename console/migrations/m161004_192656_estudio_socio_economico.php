<?php

use yii\db\Migration;

class m161004_192656_estudio_socio_economico extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%estudio_socio_economico}}', [
            'id' => $this->primaryKey()->notNull()->comment('Clave primaria, autoincremental.'),
            'id_proceso' => $this->integer()->notNull()->comment('Clave foránea que referencia a la tabla procesos'),
            'id_estudiante' => $this->integer()->notNull()->comment('Clave foránea que referencia a la tabla estudiantes'),
            'n_planilla_inscripcion' => $this->integer()->notNull()->comment('Clave foránea que referencia a la tabla inscripciones'),            
            'codigo_ultimo_grado' => $this->string(4)->notNull()->comment('Código del último grado cursado por el estudiante'),
            'vive_con_padres_solicitante' => $this->boolean()->notNull()->defaultValue(true)->comment('Verdadero si vive con los padres, Falso si no vive con los padres'),
            'telefono_fijo_solicitante' => $this->string(11)->notNull()->comment('Número de teléfono fijo dónde contactar al estudiante'),
            'telefono_celular_solicitante' => $this->string(11)->notNull()->comment('Número de teléfono celular dónde contactar al estudiante'),

            'apellidos_padre' => $this->string(128)->notNull()->comment('Apellidos del padre del estudiante'),
            'nombres_padre' => $this->string(128)->notNull()->comment('Nombres del padre del estudiante'),
            'cedula_padre' => $this->string(10)->notNull()->comment('Cédula de identidad del padre del estudiante'),
            'grado_instruccion_padre' => $this->integer()->notNull()->comment('Almacena el grado de instrucción del padre del estudiante, 1 = Primaria, 2 = Secundaria, 3 = Superior'),
            'telefono_fijo_padre' => $this->string(11)->notNull()->comment('Número de teléfono fijo dónde contactar al padre'),
            'telefono_celular_padre' => $this->string(11)->notNull()->comment('Número de teléfono celular dónde contactar al padre'),
            'profesion_padre' => $this->string(128)->notNull()->comment('Profesión del padre'),
            'ocupacion_padre' => $this->string(128)->notNull()->comment('Ocupación del padre'),
            'lugar_trabajo_padre' => $this->string(256)->notNull()->comment('Lugar de trabajo del padre'),
            'ingreso_mensual_padre' => $this->double()->notNull()->defaultValue(0)->comment('Ingreso mensual del padre'),
            'direccion_trabajo_padre' => $this->string(256)->notNull()->comment('Dirección de trabajo del padre'),
            'correo_e_padre' => $this->string(256)->notNull()->comment('Correo electrónico del padre'),
            'direccion_habitacion_padre' => $this->string(256)->notNull()->comment('Dirección de habitación del padre'),
            
            'apellidos_madre' => $this->string(128)->notNull()->comment('Apellidos de la madre del estudiante'),
            'nombres_madre' => $this->string(128)->notNull()->comment('Nombres de la madre del estudiante'),
            'cedula_madre' => $this->string(10)->notNull()->comment('Cédula de identidad de la madre del estudiante'),
            'grado_instruccion_madre' => $this->integer()->notNull()->comment('Almacena el grado de instrucción de la madre del estudiante, 1 = Primaria, 2 = Secundaria, 3 = Superior'),
            'telefono_fijo_madre' => $this->string(11)->notNull()->comment('Número de teléfono fijo dónde contactar a la madre'),
            'telefono_celular_madre' => $this->string(11)->notNull()->comment('Número de teléfono celular dónde contactar a la madre'),
            'profesion_madre' => $this->string(128)->notNull()->comment('Profesión de la madre'),
            'ocupacion_madre' => $this->string(128)->notNull()->comment('Ocupación de la madre'),
            'lugar_trabajo_madre' => $this->string(256)->notNull()->comment('Lugar de trabajo de la madre'),
            'ingreso_mensual_madre' => $this->double()->notNull()->defaultValue(0)->comment('Ingreso mensual de la madre'),
            'direccion_trabajo_madre' => $this->string(256)->notNull()->comment('Dirección de trabajo de la madre'),
            'correo_e_madre' => $this->string(256)->notNull()->comment('Correo electrónico de la madre'),
            'direccion_habitacion_madre' => $this->string(256)->notNull()->comment('Dirección de habitación de la madre'),

            'apellidos_representante' => $this->string(128)->notNull()->comment('Apellidos del representante del estudiante'),
            'nombres_representante' => $this->string(128)->notNull()->comment('Nombres del representante del estudiante'),
            'cedula_representante' => $this->string(10)->notNull()->comment('Cédula de identidad del representante del estudiante'),
            'grado_instruccion_representante' => $this->integer()->notNull()->comment('Almacena el grado de instrucción del representante del estudiante, 1 = Primaria, 2 = Secundaria, 3 = Superior'),
            'telefono_fijo_representante' => $this->string(11)->notNull()->comment('Número de teléfono fijo dónde contactar al representante'),
            'telefono_celular_representante' => $this->string(11)->notNull()->comment('Número de teléfono celular dónde contactar al representante'),
            'profesion_representante' => $this->string(128)->notNull()->comment('Profesión del representante'),
            'ocupacion_representante' => $this->string(128)->notNull()->comment('Ocupación del representante'),
            'lugar_trabajo_representante' => $this->string(256)->notNull()->comment('Lugar de trabajo del representante'),
            'ingreso_mensual_representante' => $this->double()->notNull()->defaultValue(0)->comment('Ingreso mensual del representante'),
            'direccion_trabajo_representante' => $this->string(256)->notNull()->comment('Dirección de trabajo del representante'),
            'correo_e_representante' => $this->string(256)->notNull()->comment('Correo electrónico del representante'),
            'direccion_habitacion_representante' => $this->string(256)->notNull()->comment('Dirección de habitación del representante'),
        ], $tableOptions);
        
        $this->addForeignKey(
            'estudio_socio_ecnomico_id_estudiante_fk',
            '{{%estudio_socio_economico}}',
            'id_estudiante',
            '{{%estudiantes}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'estudio_socio_economico_id_proceso_fk',
            '{{%estudio_socio_economico}}',
            'id_proceso',
            '{{%procesos}}',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey(
            'estudio_socio_ecnomico_id_estudiante_fk',
            '{{%estudio_socio_economico}}'
        );

        $this->dropForeignKey(
            'estudio_socio_economico_id_proceso_fk',
            '{{%estudio_socio_economico}}'
        );

        $this->dropTable('{{%estudio_socio_economico}}');
    }
}

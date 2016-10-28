<?php

use yii\db\Migration;

class m161028_032950_cambiando_a_null_campos_de_padre_y_madre_en_estudio_socio_economico extends Migration
{
    public function safeUp()
    {
        $this->alterColumn('{{%estudio_socio_economico}}', 'telefono_fijo_solicitante', 'DROP NOT NULL');
        $this->alterColumn('{{%estudio_socio_economico}}', 'telefono_celular_solicitante', 'DROP NOT NULL');
        
        $this->alterColumn('{{%estudio_socio_economico}}', 'apellidos_padre', 'DROP NOT NULL');
        $this->alterColumn('{{%estudio_socio_economico}}', 'nombres_padre', 'DROP NOT NULL');
        $this->alterColumn('{{%estudio_socio_economico}}', 'cedula_padre', 'DROP NOT NULL');
        $this->alterColumn('{{%estudio_socio_economico}}', 'grado_instruccion_padre', 'DROP NOT NULL');
        $this->alterColumn('{{%estudio_socio_economico}}', 'telefono_fijo_padre', 'DROP NOT NULL');
        $this->alterColumn('{{%estudio_socio_economico}}', 'telefono_celular_padre', 'DROP NOT NULL');
        $this->alterColumn('{{%estudio_socio_economico}}', 'profesion_padre', 'DROP NOT NULL');
        $this->alterColumn('{{%estudio_socio_economico}}', 'ocupacion_padre', 'DROP NOT NULL');
        $this->alterColumn('{{%estudio_socio_economico}}', 'lugar_trabajo_padre', 'DROP NOT NULL');
        $this->alterColumn('{{%estudio_socio_economico}}', 'ingreso_mensual_padre', 'DROP NOT NULL');
        $this->alterColumn('{{%estudio_socio_economico}}', 'direccion_trabajo_padre', 'DROP NOT NULL');
        $this->alterColumn('{{%estudio_socio_economico}}', 'correo_e_padre', 'DROP NOT NULL');
        $this->alterColumn('{{%estudio_socio_economico}}', 'direccion_habitacion_padre', 'DROP NOT NULL');

        $this->alterColumn('{{%estudio_socio_economico}}', 'apellidos_madre', 'DROP NOT NULL');
        $this->alterColumn('{{%estudio_socio_economico}}', 'nombres_madre', 'DROP NOT NULL');
        $this->alterColumn('{{%estudio_socio_economico}}', 'cedula_madre', 'DROP NOT NULL');
        $this->alterColumn('{{%estudio_socio_economico}}', 'grado_instruccion_madre', 'DROP NOT NULL');
        $this->alterColumn('{{%estudio_socio_economico}}', 'telefono_fijo_madre', 'DROP NOT NULL');
        $this->alterColumn('{{%estudio_socio_economico}}', 'telefono_celular_madre', 'DROP NOT NULL');
        $this->alterColumn('{{%estudio_socio_economico}}', 'profesion_madre', 'DROP NOT NULL');
        $this->alterColumn('{{%estudio_socio_economico}}', 'ocupacion_madre', 'DROP NOT NULL');
        $this->alterColumn('{{%estudio_socio_economico}}', 'lugar_trabajo_madre', 'DROP NOT NULL');
        $this->alterColumn('{{%estudio_socio_economico}}', 'ingreso_mensual_madre', 'DROP NOT NULL');
        $this->alterColumn('{{%estudio_socio_economico}}', 'direccion_trabajo_madre', 'DROP NOT NULL');
        $this->alterColumn('{{%estudio_socio_economico}}', 'correo_e_madre', 'DROP NOT NULL');
        $this->alterColumn('{{%estudio_socio_economico}}', 'direccion_habitacion_madre', 'DROP NOT NULL');
    }

    public function safeDown()
    {
        echo "m161028_032950_cambiando_a_null_campos_de_padre_y_madre_en_estudio_socio_economico cannot be reverted.\n";

        return false;
    }
}

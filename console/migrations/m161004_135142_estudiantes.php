<?php

use yii\db\Migration;

class m161004_135142_estudiantes extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%estudiantes}}', [
            'id' => $this->primaryKey()->notNull()->comment('Clave primaria, autoincremental'),
            'cedula' => $this->string(10)->notNull()->unique()->comment('Cédula de identidad del estudiantes'),
            'nombre' => $this->string(256)->notNull()->comment('Nombre del estudiante'),
            'apellido' => $this->string(256)->notNull()->comment('Apellido del estudiante'),
            'fecha_nacimiento' => $this->integer()->notNull()->comment('Fecha de nacimiento del estudiante en timestamp'),
            'lugar_nacimiento' => $this->string(256)->notNull()->comment('Lugar de nacimiento del estudiante'),
            'genero' => $this->string(1)->notNull()->comment('Género del estudiante, M: Masculino, f: Femenino'),
            'es_venezolano' => $this->boolean()->notNull()->comment('Especifica si el estudiante es venezolano o extranjero'),
            'id_user' => $this->integer()->notNull()->unique()->comment('Id del usuario que registró al estudiante'),
        ], $tableOptions);
    }

    public function safeDown()
    {
       $this->dropTable('{{%estudiantes}}');
    }
}

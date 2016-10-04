<?php

use yii\db\Migration;

class m161004_122530_procesos extends Migration
{
        public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%procesos}}', [
            'id' => $this->primaryKey()->notNull()->comment('Clave primaria, autoincremental'),
            'codigo' => $this->string(6)->notNull()->unique()->comment('Código único que identifica el proceso'),
            'nombre' => $this->string(256)->notNull()->comment('Nombre del proceso'),
            'fecha_inicio' => $this->integer()->notNull()->comment('Fecha de inicio del proceso'),
            'fecha_fin' => $this->integer()->notNull()->comment('Fecha de fin del proceso'),
        ], $tableOptions);  
    }

    public function safeDown()
    {
        $this->dropTable('{{%procesos}}');
    }
}

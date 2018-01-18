<?php

use yii\db\Migration;

class m180118_155045_cambiando_a_null_ocupacion_representante extends Migration
{
     public function safeUp()
    {
		$this->alterColumn('{{%estudio_socio_economico}}', 'ocupacion_representante', 'DROP NOT NULL');
		
    }

    public function safeDown()
    {
		echo "m180118_155045_cambiando_a_null_ocupacion_representante cannot be reverted.\n";

        return false;
    }

   
}

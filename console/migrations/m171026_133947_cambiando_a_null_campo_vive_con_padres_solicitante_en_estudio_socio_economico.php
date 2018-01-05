<?php

use yii\db\Migration;

class m171026_133947_cambiando_a_null_campo_vive_con_padres_solicitante_en_estudio_socio_economico extends Migration
{
    public function safeUp()
    {
		$this->alterColumn('{{%estudio_socio_economico}}', 'vive_con_padres_solicitante', 'DROP NOT NULL');
		$this->alterColumn('{{%estudio_socio_economico}}', 'vive_con_padres_solicitante', 'DROP DEFAULT');
    }

    public function safeDown()
    {
		echo "m171026_133947_cambiando_a_null_campo_vive_con_padres_solicitante_en_estudio_socio_economico cannot be reverted.\n";

        return false;
    }
    
}

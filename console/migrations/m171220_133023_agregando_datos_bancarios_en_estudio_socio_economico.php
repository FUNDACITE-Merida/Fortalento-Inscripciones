<?php

use yii\db\Migration;

class m171220_133023_agregando_datos_bancarios_en_estudio_socio_economico extends Migration
{
    public function safeUp()
    {
		$this->addColumn('{{%estudio_socio_economico}}','tipo_cuenta_bancaria_representante', $this->string(128));
		$this->addCommentOnColumn('{{%estudio_socio_economico}}','tipo_cuenta_bancaria_representante','Tipo de cuenta bancaria del representante');  
		$this->addColumn('{{%estudio_socio_economico}}','banco_representante', $this->string(128));
		$this->addCommentOnColumn('{{%estudio_socio_economico}}','banco_representante','Banco del representante');
		$this->addColumn('{{%estudio_socio_economico}}','cuenta_bancaria_representante', $this->string(128));
		$this->addCommentOnColumn('{{%estudio_socio_economico}}','cuenta_bancaria_representante','Cuenta bancaria del representante');
		
	}

    public function safeDown()
    {
		$this->dropColumn('{{%estudio_socio_economico}}','tipo_cuenta_bancaria_representante');
		$this->dropColumn('{{%estudio_socio_economico}}','banco_representante');
		$this->dropColumn('{{%estudio_socio_economico}}','cuenta_bancaria_representante');
		
    }
    
}

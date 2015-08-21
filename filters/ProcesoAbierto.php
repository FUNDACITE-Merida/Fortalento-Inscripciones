<?php
namespace app\filters;

use Yii;
use yii\base\ActionFilter;
use app\models\Procesos;

/* Se debe renombrar ProcesoAbierto a ProcesoCerrado que es lo realmente correcto*/

class ProcesoAbierto extends ActionFilter
{
    private $_startTime;
    public $denyActions = [];
    public $returnPath = '';

    public function beforeAction($action)
    {
        //$this->_startTime = microtime(true);
        //$accion = $this->denyActions[];
        //Yii::info("Denegado '{$accion}'");
        /*if ($proceso = Procesos::procesoAbierto())
		{
			Yii::info("Leonardo '{$proceso->nombre}'");
		}*/	
        if (!Procesos::getProcesoAbierto() && in_array($action->uniqueId, $this->denyActions))
        {
			//Yii::info("Denegado '{$action->uniqueId}'");
			return Yii::$app->getResponse()->redirect(array($this->returnPath));			
		}
        
        return parent::beforeAction($action);
    }

    public function afterAction($action, $result)
    {
        /*$time = microtime(true) - $this->_startTime;
        Yii::info("Action '{$action->uniqueId}' spent $time second.");*/
        return parent::afterAction($action, $result);
    }
}
?>

<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Procesos]].
 *
 * @see Procesos
 */
class ProcesosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Procesos[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Procesos|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
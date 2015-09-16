<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Grados]].
 *
 * @see Grados
 */
class GradosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Grados[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Grados|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[NseIngresoFamiliar]].
 *
 * @see NseIngresoFamiliar
 */
class NseIngresoFamiliarQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return NseIngresoFamiliar[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return NseIngresoFamiliar|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
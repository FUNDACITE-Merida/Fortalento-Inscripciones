<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[NseAlojamientoYVivienda]].
 *
 * @see NseAlojamientoYVivienda
 */
class NseAlojamientoYViviendaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return NseAlojamientoYVivienda[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return NseAlojamientoYVivienda|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
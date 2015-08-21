<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[EstudioSocioEconomico]].
 *
 * @see EstudioSocioEconomico
 */
class EstudioSocioEconomicoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return EstudioSocioEconomico[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EstudioSocioEconomico|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
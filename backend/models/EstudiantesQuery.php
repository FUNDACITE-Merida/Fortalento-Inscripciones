<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Estudiantes]].
 *
 * @see Estudiantes
 */
class EstudiantesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Estudiantes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Estudiantes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

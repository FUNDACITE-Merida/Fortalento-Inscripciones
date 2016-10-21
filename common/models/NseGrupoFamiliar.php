<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "nse_grupo_familiar".
 *
 * @property integer $cod_grupo_fam
 * @property string $descripcion
 *
 * @property Aludati[] $aludatis
 */
class NseGrupoFamiliar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nse_grupo_familiar';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('fortalento');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod_grupo_fam' => 'Cod Grupo Fam',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAludatis()
    {
        return $this->hasMany(Aludati::className(), ['cod_grupo_fam' => 'cod_grupo_fam']);
    }

    /**
     * @inheritdoc
     * @return NseGrupoFamiliarQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NseGrupoFamiliarQuery(get_called_class());
    }
}

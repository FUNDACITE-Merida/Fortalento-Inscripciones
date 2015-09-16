<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nse_profesion_jefe_familia".
 *
 * @property integer $cod_prof_jf
 * @property string $descripcion
 *
 * @property Aludati[] $aludatis
 */
class NseProfesionJefeFamilia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nse_profesion_jefe_familia';
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
            'cod_prof_jf' => 'Cod Prof Jf',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAludatis()
    {
        return $this->hasMany(Aludati::className(), ['cod_prof_jf' => 'cod_prof_jf']);
    }

    /**
     * @inheritdoc
     * @return NseProfesionJefeFamiliaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NseProfesionJefeFamiliaQuery(get_called_class());
    }
}

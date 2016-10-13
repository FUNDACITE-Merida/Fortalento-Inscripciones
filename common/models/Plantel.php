<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "plantel".
 *
 * @property string $cod_pla
 * @property string $nom_pla
 * @property string $dir_pla
 * @property string $cod_municipio
 * @property string $tip_pla
 * @property string $dir_nya
 * @property string $ced_ide
 * @property string $codigo_etapas
 * @property string $telefono
 * @property string $distrito
 * @property string $gradua
 * @property string $tercer
 *
 * @property Aludati[] $aludatis
 * @property EtapasPlantel $codigoEtapas
 * @property Municipios $codMunicipio
 */
class Plantel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plantel';
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
            [['cod_pla', 'nom_pla', 'cod_municipio', 'tip_pla'], 'required'],
            [['codigo_etapas'], 'integer'],
            [['cod_pla', 'telefono'], 'string', 'max' => 10],
            [['nom_pla'], 'string', 'max' => 70],
            [['dir_pla'], 'string', 'max' => 200],
            [['cod_municipio'], 'string', 'max' => 3],
            [['tip_pla'], 'string', 'max' => 1],
            [['dir_nya'], 'string', 'max' => 50],
            [['ced_ide'], 'string', 'max' => 15],
            [['distrito'], 'string', 'max' => 4],
            [['gradua', 'tercer'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cod_pla' => 'Cod Pla',
            'nom_pla' => 'Nom Pla',
            'dir_pla' => 'Dir Pla',
            'cod_municipio' => 'Cod Municipio',
            'tip_pla' => 'Tip Pla',
            'dir_nya' => 'Dir Nya',
            'ced_ide' => 'Ced Ide',
            'codigo_etapas' => 'Codigo Etapas',
            'telefono' => 'Telefono',
            'distrito' => 'Distrito',
            'gradua' => 'Gradua',
            'tercer' => 'Tercer',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAludatis()
    {
        return $this->hasMany(Aludati::className(), ['cod_pla' => 'cod_pla']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodigoEtapas()
    {
        return $this->hasOne(EtapasPlantel::className(), ['codigo_etapas' => 'codigo_etapas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodMunicipio()
    {
        return $this->hasOne(Municipios::className(), ['cod_municipio' => 'cod_municipio']);
    }
    
    /**
     * by LJAH
     * @return \yii\db\ActiveQuery
     */
    public function getInscripciones()
    {
        return $this->hasMany(Inscripciones::className(), ['codigo_plantel' => 'cod_pla']);
    }
    
    /**
     * @inheritdoc
     * @return PlantelQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PlantelQuery(get_called_class());
    }
}

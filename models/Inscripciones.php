<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inscripciones".
 *
 * @property integer $id
 * @property integer $id_proceso
 * @property integer $id_estudiante
 * @property string $fecha_inscripcion
 * @property string $codigo_plantel
 * @property string $localidad_plantel
 * @property string $codigo_ultimo_grado
 * @property string $postulado_para
 * @property double $promedio
 * @property double $nota1
 * @property double $nota2
 * @property double $nota3
 * @property integer $codigo_profesion_jefe_familia
 * @property integer $codigo_nivel_instruccion_madre
 * @property integer $codigo_fuente_ingreso_familia
 * @property integer $codigo_vivienda_familia
 * @property integer $codigo_ingreso_familia
 * @property integer $codigo_grupo_familiar
 * @property boolean $cerrada
 *
 * @property EstudioSocioEconomico[] $estudioSocioEconomicos
 * @property Estudiantes $idEstudiante
 * @property Procesos $idProceso
 */
class Inscripciones extends \yii\db\ActiveRecord
{
	private $_patronNumero = '/^\s*[-+]?[0-9]*\,?[0-9]+([eE][-+]?[0-9]+)?\s*$/';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inscripciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_proceso', 'id_estudiante', 'fecha_inscripcion', 'codigo_plantel', 'localidad_plantel', 'codigo_ultimo_grado', 'codigo_profesion_jefe_familia', 'codigo_nivel_instruccion_madre', 'codigo_fuente_ingreso_familia', 'codigo_vivienda_familia', 'codigo_ingreso_familia', 'codigo_grupo_familiar'], 'required'],
            [['id_proceso', 'id_estudiante', 'codigo_profesion_jefe_familia', 'codigo_nivel_instruccion_madre', 'codigo_fuente_ingreso_familia', 'codigo_vivienda_familia', 'codigo_ingreso_familia', 'codigo_grupo_familiar'], 'integer'],
            [['fecha_inscripcion'], 'safe'],
            [['fecha_inscripcion'], 'date', 'max' => Yii::$app->formatter->asDate('now')],
            
            [['codigo_plantel'], 'string', 'max' => 10],
            [['localidad_plantel'], 'string', 'max' => 256],
            [['codigo_ultimo_grado'], 'string', 'max' => 4],
            [['postulado_para_beca'], 'string', 'max' => 1],
            [['postulado_para_premio'], 'string', 'max' => 1],
            
            
            ['promedio', 'number', 
				'numberPattern' => $this->_patronNumero,
				'min' => 10, 'max' => 20,
				'when' => function ($model) {
							return $model->postulado_para_beca == true;
				}, 'whenClient' => "function (attribute, value) {
						return $('#inscripciones-postulado_para_beca').is(':checked') == true;
					}"
			],
			
			[['nota1', 'nota2'], 'number', 
				'numberPattern' => $this->_patronNumero,
				'min' => 10, 'max' => 20,
				'when' => function ($model) {
							return $model->postulado_para_premio == true;
				}, 'whenClient' => "function (attribute, value) {
						return $('#inscripciones-postulado_para_premio').is(':checked') == true;
					}"
			],
			
			['promedio', 'required', 
				'when' => function ($model) {
							return $model->postulado_para_beca == true;
				}, 'whenClient' => "function (attribute, value) {
						return $('#inscripciones-postulado_para_beca').is(':checked') == true;
					}"
			],
			
			[['nota1', 'nota2'], 'required',
				'when' => function ($model) {
							return $model->postulado_para_premio == true;
				}, 'whenClient' => "function (attribute, value) {
						return $('#inscripciones-postulado_para_premio').is(':checked') == true;
					}"
			],
			
			/* Validación especial para nota3 ya que hay algunas restricciones cuando el 
			 * estudiante está cursando 5to año en un Liceo que no gradúa 6to año sino 
			 * únicamente hasta 5to año
			 */
			 
			 [['nota3'], 'number', 
				'numberPattern' => $this->_patronNumero,
				'min' => 10, 'max' => 20,
				'when' => function ($model) {
							return ($model->postulado_para_premio == true && $model->codigo_ultimo_grado != 11);
				}, 'whenClient' => "function (attribute, value) {
						return ($('#inscripciones-postulado_para_premio').is(':checked') == true && $('#inscripciones-codigo_ultimo_grado').val != 11);
					}"
			],
						
			[['nota3'], 'required',
				'when' => function ($model) {
							return ($model->postulado_para_premio == true && $model->codigo_ultimo_grado != 11);
				}, 'whenClient' => "function (attribute, value) {
						return ($('#inscripciones-postulado_para_premio').is(':checked') == true && $('#inscripciones-codigo_ultimo_grado').val != 11);
					}"
			],
			 /***********************/ 
			 
			
			[['postulado_para_beca'], 'required', 'requiredValue' => 'B', 'message' => 'Debe seleccionar al menos una postulación',
				'when' => function ($model) {
							return $model->postulado_para_premio == false;
				}, 'whenClient' => "function (attribute, value) {
						return $('#inscripciones-postulado_para_premio').is(':checked') == false;
					}"
			],
			
			[['postulado_para_premio'], 'required', 'requiredValue' => 'P', 'message' => 'Debe seleccionar al menos una postulación',
				'when' => function ($model) {
							return $model->postulado_para_beca == false;
				}, 'whenClient' => "function (attribute, value) {
						return $('#inscripciones-postulado_para_beca').is(':checked') == false;
					}"
			],
			
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Nº de planilla de inscripción',
            'id_proceso' => 'Clave foránea que referencia a la tabla procesos',
            'id_estudiante' => 'Clave foránea que referencia a la tabla estudiantes',
            'fecha_inscripcion' => 'Fecha de solicitud',
            'codigo_plantel' => 'Seleccione el plantel',
            'localidad_plantel' => 'Localidad del plantel',
            'codigo_ultimo_grado' => 'Último año/grado culminado',
            'postulado_para_beca' => 'Premio beca-estímulo al alto rendimiento estudiantil',
            'postulado_para_premio' => 'Premio de reconocimiento a la excelencia',
            'promedio' => 'Promedio de notas',
            'nota1' => 'Promedio global 1',
            'nota2' => 'Promedio global 2',
            'nota3' => 'Promedio global 3',
            'codigo_profesion_jefe_familia' => 'Profesion del jefe de la familia',
            'codigo_nivel_instruccion_madre' => 'Nivel de instruccion de la madre',
            'codigo_fuente_ingreso_familia' => 'Fuente de ingreso familiar',
            'codigo_vivienda_familia' => 'Alojamiento y vivienda',
            'codigo_ingreso_familia' => 'Ingreso familiar (sin deducciones)',
            'codigo_grupo_familiar' => 'Grupo familiar',
            'cerrada' => 'Inscripción cerrada',
            
            'cedula' => 'Cédula de identidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstudioSocioEconomico()
    {
        return $this->hasOne(EstudioSocioEconomico::className(), ['n_planilla_inscripcion' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstudiante()
    {
        return $this->hasOne(Estudiantes::className(), ['id' => 'id_estudiante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProceso()
    {
        return $this->hasOne(Procesos::className(), ['id' => 'id_proceso']);
    }
    
    /**
     * by LJAH
     * @return \yii\db\ActiveQuery
     */
    public function getCodPlantel()
    {
        return $this->hasOne(Plantel::className(), ['cod_pla' => 'codigo_plantel']);
    }

    /**
     * @inheritdoc
     * @return InscripcionesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InscripcionesQuery(get_called_class());
    }
    
    /**
     * by LJAH
     * Getter para realizar búsquedas por número de cédula del estudiante
     * return cédula de estudiante
     */
     /*
    public function getCedulaEstudiante()
    {
		return $this->idEstudiante->cedula;
	}*/
    
    public function beforeSave()
    {
		$this->promedio = str_replace(',','.',$this->promedio);
		$this->promedio = Yii::$app->formatter->asDecimal(floatval($this->promedio), 3);
		
		$this->nota1 = str_replace(',','.',$this->nota1);
		$this->nota1 = Yii::$app->formatter->asDecimal(floatval($this->nota1), 3);
		$this->nota2 = str_replace(',','.',$this->nota2);
		$this->nota2 = Yii::$app->formatter->asDecimal(floatval($this->nota2), 3);
		$this->nota3 = str_replace(',','.',$this->nota3);
		$this->nota3 = Yii::$app->formatter->asDecimal(floatval($this->nota3), 3);
		
		return true;
	}
    
    public function afterFind()
	{
		
		// Formatea la fecha según se ha configurado en config/web.php
		// 'formatter' => [
        //	   'dateFormat' => 'dd-MM-yyyy',
        // ]            
		$this->fecha_inscripcion = Yii::$app->formatter->asDate($this->fecha_inscripcion);
		
		$this->promedio = str_replace('.',',',$this->promedio);
		$this->nota1 = str_replace('.',',',$this->nota1);
		$this->nota2 = str_replace('.',',',$this->nota2);
		$this->nota3 = str_replace('.',',',$this->nota3);
				
		parent::afterFind();
	}
	
	public function getEdadEstudiante() {
		list($d,$m,$Y) = explode("-",$this->idEstudiante->fecha_nacimiento);
		return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
	}
	
	public function estatusInscripcion()
    {		
		return $this->cerrada;
	}
	
	public function getConsolidadoMunicipios()
	{
		/*
		 * Acá se puede mejorar el tiempo de las consultas
		 * usando la relación creada en los modelos: inscripciones <-> planteles <-> municipios
		 */
		$municipios = Municipios::find()->all();
		
		foreach($municipios as $municipio)
		{
			$planteles = $municipio->plantels;
			$cerradas = 0;
			$abiertas = 0;
			foreach($planteles as $plantel)
			{
				$cerradas += Inscripciones::find()
										->where(['codigo_plantel' => $plantel->cod_pla])
										->andWhere(['cerrada' => true])
										->count();
										
				$abiertas += Inscripciones::find()
										->where(['codigo_plantel' => $plantel->cod_pla])
										->andWhere(['cerrada' => false])
										->count();
			}
			$datos[$municipio->municipio]['nombre'] = $municipio->municipio;
			$datos[$municipio->municipio]['cerradas'] = $cerradas;
			$datos[$municipio->municipio]['abiertas'] = $abiertas;
		}
		
		return $datos;
	}
}

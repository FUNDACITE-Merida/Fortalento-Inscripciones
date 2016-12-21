<?php
 
namespace backend\models;
use yii\base\model;
 
class CargarInscripciones extends model{
  
    public $file;
     
    public function rules()
    {
        return [
                    [['file'], 'file', 
                    'skipOnEmpty' => false,
                    'uploadRequired' => 'No has seleccionado ningún archivo', //Error
                    'maxSize' => 1024*1024*5, //1 MB
                    //'tooBig' => 'El tamaño máximo permitido es 1MB', //Error
                    'minSize' => 10, //10 Bytes
                    //'tooSmall' => 'El tamaño mínimo permitido son 10 BYTES', //Error
                    //'extensions' => 'zip, xls, xlsx',
                    //'wrongExtension' => 'El archivo {file} no contiene una extensión permitida {extensions}', //Error
                    //'maxFiles' => 4,
                    //'tooMany' => 'El máximo de archivos permitidos son {limit}', //Error
                    ],
                ]; 
    } 
 
 public function attributeLabels()
 {
    return [
    'file' => 'Seleccionar archivos:',
    ];
 }
}
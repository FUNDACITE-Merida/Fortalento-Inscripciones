Inscripciones Fortalento.
========================

Sistema automatizado para la inscripción de aspirantes al programa Fortalento de Fundacite Mérida.

Instalación en ambiente de desarrollo.
--------------------------------------

## Instalando Composer.

```bash
$ curl -sS https://getcomposer.org/installer | php
$ sudo mv composer.phar /usr/local/bin/composer
```

## Instalando Composer asset plugin.

```bash
$ composer global require "fxp/composer-asset-plugin:^1.2.0"
```

Composer asset plugin permite manejar las dependencias de los paquetes bower y npm
a través de composer. Solo necesitas correr este comando una vez. 


## Descargando el proyecto.

```bash
$ git clone https://github.com/FUNDACITE-Merida/Fortalento-Inscripciones.git
```

## Revisando los requerimientos.

Revisa si tu configuración cumple con los requerimientos de Yii2. 

```bash
$ cd Fortalento-Inscripciones
$ php requirements.php
```

## Estableciendo el ambiente de desarrollo.

```bash
$ cd Fortalento-Inscripciones
$ php init
```

## Configurando la base de datos.

Crea la base de datos, luego configura los datos de conexión en common/config/main-local.php

Nota: Es necesaria la conexión a la base de datos del Sistema de Premios e Incentivos a la Excelencia Estudiantil
para que el sistema sea completamente funcional.

## Instalando paquetes de terceros.

```bash
$ cd Fortalento-Inscripciones
$ composer install --prefer-dist -vvv --profile
```

## Cargando las migraciones.

```bash
$ cd Fortalento-Inscripciones
$ ./yii migrate
$ ./yii migrate --migrationPath=@mdm/admin/migrations
$ ./yii migrate --migrationPath=@yii/rbac/migrations
```

## Inicializando Rbac

```bash
$ cd Fortalento-Inscripciones
$ ./yii rbac/init
```
Esto cargará algunas configuraciones básicas como permisos y roles predefinidos.
Se crean los usuarios superadmin@fundacite-merida.gob.ve y admin@fundacite-merida.gob.ve con contraseña 123456 

## Corriendo el servidor de desarrollo.

```bash
$ cd Fortalento-Inscripciones
$ php -S localhost:8000
```

## Probando el sistema.

Para conectarse al backend: http//localhost/backend/web
Para conectarse al frontend: http//localhost/frontend/web
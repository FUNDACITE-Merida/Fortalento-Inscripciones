<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\models\User;
use yii\helpers\Console;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        

        $this->stdout("*** Este proceso devolverá los roles y permisos a su estado original.\n".
                        "*** Cualquier rol o permiso definido por la interfaz de administación deberá ser definido nuevamente.\n", Console::FG_YELLOW);
        $this->stdout("*** Los usuarios NO perderán su rol asignado.\n", Console::FG_RED);
        if ($this->confirm("*** ¿Desea continuar?\n"))
        {
            $this->stdout("*** Respaldando usuarios superadmin\n", Console::FG_YELLOW);
            $userSuperadmin = $auth->getUserIdsByRole('superadmin');
            
            $this->stdout("*** Respaldando usuarios admin\n", Console::FG_YELLOW);
            $userAdmin = $auth->getUserIdsByRole('admin');

            $this->stdout("*** Respaldando usuarios Estudiantes\n", Console::FG_YELLOW);
            $userEstudiantes = $auth->getUserIdsByRole('Estudiantes');

            $this->stdout("*** Eliminando permisos y roles\n", Console::FG_RED);
            $auth->removeAll();
        }
        else {
            return exit(0);
        }

        // Creando los permisos de acceso
        $this->stdout("*** Creando permisos de acceso\n", Console::FG_YELLOW);

        // Agregando acceso a la página de inicio
        $permisoInicio = $auth->createPermission('/site/index');
        $permisoInicio->description = 'Acceso a la página de inicio';
        $auth->add($permisoInicio);

        // Agregando acceso a la página de login
        $permisoLogin = $auth->createPermission('/site/login');
        $permisoLogin->description = 'Acceso a la página de login';
        $auth->add($permisoLogin);

        // Agregando acceso a la página de logout
        $permisoLogout = $auth->createPermission('/site/logout');
        $permisoLogout->description = 'Acceso a la página de logout';
        $auth->add($permisoLogout);

        // Permisos para Estudiantes
        $permisoReportesIndex = $auth->createPermission('/reportes/index');
        $permisoReportesIndex->description = 'Acceso a reportes/index';
        $auth->add($permisoReportesIndex);

        $permisoEstudiantesCreate = $auth->createPermission('/estudiantes/create');
        $permisoEstudiantesCreate->description = 'Acceso a estudiantes/create';
        $auth->add($permisoEstudiantesCreate);
        
        $permisoInscripcionesCreate = $auth->createPermission('/inscripciones/create');
        $permisoInscripcionesCreate->description = 'Acceso a inscripciones/create';
        $auth->add($permisoInscripcionesCreate);

        $permisoInscripcionesGetPlanteles = $auth->createPermission('/inscripciones/get-planteles');
        $permisoInscripcionesGetPlanteles->description = 'Acceso a inscripciones/get-planteles';
        $auth->add($permisoInscripcionesGetPlanteles);

        $permisoEstudioSocioEconomicoCreate = $auth->createPermission('/estudio-socio-economico/create');
        $permisoEstudioSocioEconomicoCreate->description = 'Acceso a estudio-socio-economico/create';
        $auth->add($permisoEstudioSocioEconomicoCreate);

        $permisoInscripcionesCerrarEImprimir = $auth->createPermission('/inscripciones/cerrar-e-imprimir');
        $permisoInscripcionesCerrarEImprimir->description = 'Acceso a inscripciones/cerrar-e-imprimir';
        $auth->add($permisoInscripcionesCerrarEImprimir);

        $permisoReportesInscripcion = $auth->createPermission('/reportes/inscripcion');
        $permisoReportesInscripcion->description = 'Acceso a reportes/inscripcion';
        $auth->add($permisoReportesInscripcion);

        $permisoInscripcionesInscripcionCerrada = $auth->createPermission('/inscripciones/inscripcion-cerrada');
        $permisoInscripcionesInscripcionCerrada->description = 'Acceso a inscripciones/inscripcion-cerrada';
        $auth->add($permisoInscripcionesInscripcionCerrada);

        $permisoProcesosProcesoCerrado = $auth->createPermission('/procesos/proceso-cerrado');
        $permisoProcesosProcesoCerrado->description = 'Acceso a procesos/proceso-cerrado';
        $auth->add($permisoProcesosProcesoCerrado);
        // Fin permisos para Estudiantes

        // Permisos para admin
        // Agregando acceso a la página de logout
        $permisoAdminInscripcionesAbrirCerrarLista = $auth->createPermission('/admin-inscripciones/abrir-cerrar-lista');
        $permisoAdminInscripcionesAbrirCerrarLista->description = 'Acceso a admin-inscripciones/abrir-cerrar-lista';
        $auth->add($permisoAdminInscripcionesAbrirCerrarLista);

        $permisoAdminInscripcionesAbrirCerrar = $auth->createPermission('/admin-inscripciones/abrir-cerrar');
        $permisoAdminInscripcionesAbrirCerrar->description = 'Acceso a admin-inscripciones/abrir-cerrar';
        $auth->add($permisoAdminInscripcionesAbrirCerrar);

        $permisoAdminReportesInscripcion = $auth->createPermission('/admin-reportes/inscripcion');
        $permisoAdminReportesInscripcion->description = 'Acceso a admin-reportes/inscripcion';
        $auth->add($permisoAdminReportesInscripcion);

        $permisoAdminInscripcionesConsolidado = $auth->createPermission('/admin-inscripciones/consolidado');
        $permisoAdminInscripcionesConsolidado->description = 'Acceso a admin-inscripciones/consolidado';
        $auth->add($permisoAdminInscripcionesConsolidado);

        $permisoAdminInscripcionesListadoMunicipiosCsv = $auth->createPermission('/admin-inscripciones/listado-municipios-csv');
        $permisoAdminInscripcionesListadoMunicipiosCsv->description = 'Acceso a admin-inscripciones/listado-municipios-csv';
        $auth->add($permisoAdminInscripcionesListadoMunicipiosCsv);

        $permisoAdminInscripcionesImprimirCsv = $auth->createPermission('/admin-inscripciones/imprimir-csv');
        $permisoAdminInscripcionesImprimirCsv->description = 'Acceso a admin-inscripciones/imprimir-csv';
        $auth->add($permisoAdminInscripcionesImprimirCsv);
        
        $permisoAdminReportesMunicipioEstudiantes = $auth->createPermission('/admin-reportes/municipio-estudiantes');
        $permisoAdminReportesMunicipioEstudiantes->description = 'Acceso a admin-reportes/municipio-estudiantes';
        $auth->add($permisoAdminReportesMunicipioEstudiantes);

        $permisoAdminEstudiantesCreate = $auth->createPermission('/admin-estudiantes/create');
        $permisoAdminEstudiantesCreate->description = 'Acceso a admin-estudiantes/create';
        $auth->add($permisoAdminEstudiantesCreate);

        $permisoAdminReportesZonaEducativaXls = $auth->createPermission('/admin-reportes/zona-educativa-xls');
        $permisoAdminReportesZonaEducativaXls->description = 'Acceso a admin-reportes/zona-educativa-xls';
        $auth->add($permisoAdminReportesZonaEducativaXls);

        $permisoAdminReportesInscripcionesXls = $auth->createPermission('/admin-reportes/inscripciones-xls');
        $permisoAdminReportesInscripcionesXls->description = 'Acceso a admin-reportes/inscripciones-xls';
        $auth->add($permisoAdminReportesInscripcionesXls);
        
        $permisoAdminInscripcionesCargarInscripciones = $auth->createPermission('/admin-inscripciones/cargar-inscripciones');
        $permisoAdminInscripcionesCargarInscripciones->description = 'Acceso a admin-inscripciones/cargar-inscripciones';
        $auth->add($permisoAdminInscripcionesCargarInscripciones);
        // Fin permisos para admin
        
        // Permisos para superaministrador
        $permisoAdmin = $auth->createPermission('/admin/*');
        $permisoAdmin->description = 'Acceso a admin';
        $auth->add($permisoAdmin);
        // Fin permisos para superadministrador

        $this->stdout("*** Creando rol Estudiantes\n", Console::FG_YELLOW);
        // Create role estudiante
        $roleEstudiantes = $auth->createRole('Estudiantes');
        $auth->add($roleEstudiantes);
        $auth->addChild($roleEstudiantes, $permisoInicio);
        $auth->addChild($roleEstudiantes, $permisoLogin);
        $auth->addChild($roleEstudiantes, $permisoLogout);
        $auth->addChild($roleEstudiantes, $permisoReportesIndex);
        $auth->addChild($roleEstudiantes, $permisoEstudiantesCreate);
        $auth->addChild($roleEstudiantes, $permisoInscripcionesCreate);
        $auth->addChild($roleEstudiantes, $permisoInscripcionesGetPlanteles);
        $auth->addChild($roleEstudiantes, $permisoEstudioSocioEconomicoCreate);
        $auth->addChild($roleEstudiantes, $permisoInscripcionesCerrarEImprimir);
        $auth->addChild($roleEstudiantes, $permisoReportesInscripcion);
        $auth->addChild($roleEstudiantes, $permisoInscripcionesInscripcionCerrada);
        $auth->addChild($roleEstudiantes, $permisoProcesosProcesoCerrado);

        $this->stdout("*** Creando datos de admin\n", Console::FG_YELLOW);
        // Create role admin
        $roleAdmin = $auth->createRole('admin');
        $auth->add($roleAdmin);
        $auth->addChild($roleAdmin, $roleEstudiantes);
        $auth->addChild($roleAdmin, $permisoAdminInscripcionesAbrirCerrarLista);
        $auth->addChild($roleAdmin, $permisoAdminInscripcionesAbrirCerrar);
        $auth->addChild($roleAdmin, $permisoAdminReportesInscripcion);
        $auth->addChild($roleAdmin, $permisoAdminInscripcionesConsolidado);
        $auth->addChild($roleAdmin, $permisoAdminInscripcionesListadoMunicipiosCsv);
        $auth->addChild($roleAdmin, $permisoAdminInscripcionesImprimirCsv);
        $auth->addChild($roleAdmin, $permisoAdminReportesMunicipioEstudiantes);
        $auth->addChild($roleAdmin, $permisoAdminEstudiantesCreate);
        $auth->addChild($roleAdmin, $permisoAdminReportesZonaEducativaXls);
        $auth->addChild($roleAdmin, $permisoAdminReportesInscripcionesXls);
        $auth->addChild($roleAdmin, $permisoAdminInscripcionesCargarInscripciones);
        
        // Create user admin
        if (!User::findOne(['username' => 'admin@fundacite-merida.gob.ve'])){
            $user = new User();
            $user->username = 'admin@fundacite-merida.gob.ve';
            $user->email = 'admin@fundacite-merida.gob.ve';
            $user->setPassword('123456'); // Este password debe ser cambiado por uno más complejo
            $user->generateAuthKey();
            $user->save(false);
            // Add rol admin to user admin
            $auth->assign($roleAdmin, $user->getId());
        }

        $this->stdout("*** Creando datos de superadmin\n", Console::FG_YELLOW);
        // Create role superadmin
        $roleSuperadmin = $auth->createRole('superadmin');
        $auth->add($roleSuperadmin);
        $auth->addChild($roleSuperadmin, $roleAdmin);
        $auth->addChild($roleSuperadmin, $permisoAdmin);
        
        // Create user superadmin
        if (!User::findOne(['username' => 'superadmin@fundacite-merida.gob.ve'])){
            $user = new User();
            $user->username = 'superadmin@fundacite-merida.gob.ve';
            $user->email = 'superadmin@fundacite-merida.gob.ve';
            $user->setPassword('123456'); // Este password debe ser cambiado por uno más complejo
            $user->generateAuthKey();
            $user->save(false);
            // Add rol superadmin to user superadmin
            $auth->assign($roleSuperadmin, $user->getId());
        }

        $this->stdout("*** Restaurando usuarios superadmin\n", Console::FG_YELLOW);
        foreach($userSuperadmin as $userId){
            $auth->assign($roleSuperadmin, $userId);
        }
        
        $this->stdout("*** Restaurando usuarios admin\n", Console::FG_YELLOW);
        foreach($userAdmin as $userId){
            $auth->assign($roleAdmin, $userId);
        }

        $this->stdout("*** Restaurando usuarios Estudiantes\n", Console::FG_YELLOW);
        foreach($userEstudiantes as $userId){
            $auth->assign($roleEstudiantes, $userId);
        }
    }
}
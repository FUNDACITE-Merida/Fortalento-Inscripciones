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
        

        $this->stdout("*** Todos los datos de autorización y autenticación de usuario serán removidos\n", Console::FG_YELLOW);
        if ($this->confirm("*** ¿Desea continuar?\n"))
        {
            $auth->removeAll();
            if ($user = User::findOne(['username' => 'superadmin']))
                $user->delete();

            if ($user = User::findOne(['username' => 'admin']))
                $user->delete();
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

        // Agregando acceso a la página de login
        $permisoLogout = $auth->createPermission('/site/logout');
        $permisoLogout->description = 'Acceso a la página de logout';
        $auth->add($permisoLogout);

        // Agregando acceso a la página de login
        $permisoAll = $auth->createPermission('/*');
        $permisoAll->description = 'Acceso a la página de logout';
        $auth->add($permisoAll);

        $this->stdout("*** Creando datos de superadmin\n", Console::FG_YELLOW);
        // Create role superadmin
        $role = $auth->createRole('superadmin');
        $auth->add($role);
        $auth->addChild($role, $permisoAll);
        
        // Create user superadmin
        $user = new User();
        $user->username = 'superadmin';
        $user->email = 'superadmin@fundacite-merida.gob.ve';
        //$user->setPassword('A9u35t@for?ock');
        $user->setPassword('123456');
        $user->generateAuthKey();
        $user->save(false);

        // Add rol superadmin to user superadmin
        $auth = Yii::$app->authManager;
        $authorRole = $auth->getRole('superadmin');
        $auth->assign($authorRole, $user->getId());

        $this->stdout("*** Creando datos de admin\n", Console::FG_YELLOW);
        // Create role admin
        $role = $auth->createRole('admin');
        $auth->add($role);
        
        // Create user admin
        $user = new User();
        $user->username = 'admin';
        $user->email = 'admin@fundacite-merida.gob.ve';
        //$user->setPassword('E5tud1@nF0?t4lentoa');
        $user->setPassword('123456');
        $user->generateAuthKey();
        $user->save(false);

        // Add rol superadmin to user admin
        $auth = Yii::$app->authManager;
        $authorRole = $auth->getRole('admin');
        $auth->assign($authorRole, $user->getId());

        $this->stdout("*** Creando rol Estudiantes\n", Console::FG_YELLOW);
        // Create role estudiante
        $role = $auth->createRole('Estudiantes');
        $auth->add($role);
        $auth->addChild($role, $permisoLogout);
    }
}


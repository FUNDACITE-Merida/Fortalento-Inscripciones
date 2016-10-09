<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\models\User;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        $this->stdout("*** Creando rol superadmin\n", Console::FG_YELLOW);
        // Create role superadmin
        $role = $auth->createRole('superadmin');
        $auth->add($role);
        
        // Create user superadmin
        $user = new User();
        $user->username = 'superadmin';
        $user->email = 'superadmin@fundacite-merida.gob.ve';
        $user->setPassword('A9u35t@for?ock');
        $user->generateAuthKey();
        $user->save(false);

        // Add rol superadmin to user superadmin
        $auth = Yii::$app->authManager;
        $authorRole = $auth->getRole('superadmin');
        $auth->assign($authorRole, $user->getId());

        $this->stdout("*** Creando rol admin\n", Console::FG_YELLOW);
        // Create role admin
        $role = $auth->createRole('admin');
        $auth->add($role);
        
        // Create user admin
        $user = new User();
        $user->username = 'admin';
        $user->email = 'admin@fundacite-merida.gob.ve';
        $user->setPassword('E5tud1@nF0?t4lentoa');
        $user->generateAuthKey();
        $user->save(false);

        // Add rol superadmin to user admin
        $auth = Yii::$app->authManager;
        $authorRole = $auth->getRole('admin');
        $auth->assign($authorRole, $user->getId());

        $this->stdout("*** Creando rol estudiante\n", Console::FG_YELLOW);
        // Create role estudiante
        $role = $auth->createRole('estudiante');
        $auth->add($role);
    }
}


<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    const SCENARIO_OFFLINE = 'offline';

    public $username;
    public $email;
    public $password;
    public $captcha;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            /*['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],*/

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este correo electrónico ya está registrado.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

			['captcha', 'required'],
			['captcha', 'captcha']
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
         $scenarios[self::SCENARIO_OFFLINE] = ['username', 'email', 'password'];
        return $scenarios;
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            //$user->username = $this->username;
            $user->username = $this->email;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
				// Asignación automática del rol Estudiantes
				// para los usuarios nuevos
				$auth = Yii::$app->authManager;
				$estudiantesRole = $auth->getRole('Estudiantes');
				$auth->assign($estudiantesRole, $user->getId());
                return $user;
            }
        }

        return null;
    }
}

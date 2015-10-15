<?php
namespace app\models;

use app\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
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
            /*['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],*/

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            /* Para validar el correo como único fue necesario realizar
             * un trabajo extra agregando 'targetAttribute' => ['EmailUppercase' => 'upper(email)'],
             * ya que el validador Unique en Yii2.0, a diferencia de Yii1.1.16 no permite 
			 * el parámetro caseSensitive.
			 * La sentencia 'upper(email)' podría no trabajar en manejadores de base de datos
			 * distintos a PostgreSQL, esto debe verificarse.
             */
            ['email', 'unique', 
					'targetAttribute' => ['EmailUppercase' => 'upper(email)'],
					'targetClass' => '\app\models\User', 
					'message' => 'Este correo electrónico ya está registrado'],
            //This email address has already been taken.

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            
            ['captcha', 'required'],
			['captcha', 'captcha']
        ];
    }
    
    /*
     * Se creó este campo virtual para solucionar
     * la deficiencia del validador Unique en Yii2.0 con respecto 
     * al case sensitive. Yii2.0, a diferencia de Yii1.1.16 no permite 
     * el parámetro caseSensitive en el validador Unique
     */
    public function getEmailUppercase()
	{
		return strtoupper($this->email);
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

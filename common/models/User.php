<?php
/**
 * This model overrides the User model defined in yii2-user module
 * overrided methods: 
 * -> register(): A "user" role is attached to the new user after registration
 *
 * @author George Dimosthenous
 **/

namespace common\models;
use dektrium\user\models\Token;
use yii\log\Logger;

use dektrium\user\models\User as BaseUser;

class User extends BaseUser
{
    public function register()
    {
        if ($this->getIsNewRecord() == false) {
            throw new \RuntimeException('Calling "' . __CLASS__ . '::' . __METHOD__ . '" on existing user');
        }

        if ($this->module->enableConfirmation == false) {
            $this->confirmed_at = time();
        }

        if ($this->module->enableGeneratingPassword) {
            $this->password = Password::generate(8);
        }

        $this->role = "user"; // use default role 'user'
        
        $this->trigger(self::USER_REGISTER_INIT);

        if ($this->save()) {
            $this->trigger(self::USER_REGISTER_DONE);
            if ($this->module->enableConfirmation) {
                $token = $this->module->manager->createToken(['type' => Token::TYPE_CONFIRMATION]);
                $token->link('user', $this);
                $this->module->mailer->sendConfirmationMessage($this, $token);
                \Yii::$app->session->setFlash('user.confirmation_sent');
            } else {
                \Yii::$app->session->setFlash('user.registration_finished');
                \Yii::$app->user->login($this);
            }
            if ($this->module->enableGeneratingPassword) {
                $this->module->mailer->sendWelcomeMessage($this);
                \Yii::$app->session->setFlash('user.password_generated');
            }
            \Yii::getLogger()->log('User has been registered', Logger::LEVEL_INFO);
            return true;
        }

        \Yii::getLogger()->log('An error occurred while registering user account', Logger::LEVEL_ERROR);

        return false;
    }
}

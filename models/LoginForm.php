<?php

namespace app\models;

use omarkhader\phpmvccore\Application;
use omarkhader\phpmvccore\Model;
use app\models\User;

class LoginForm extends Model
{
    public string $email = '';
    public string $password = '';
    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED],
        ];
    }

    public function login()
    {
        $user = (new User())->findOne(['email' => $this->email]);

        if (!$user) {
            $this->addError('email', 'The user does not exist with this email');
            return false;
        }

        if (!password_verify($this->password, $user->password)) {
            $this->addError('password', 'Password is incorrect');
            return false;
        }

        return Application::$app->login($user);
    }

    public function labels()
    {
        return [
            'email' => 'Email',
            'password' => 'Password'
        ];
    }
}

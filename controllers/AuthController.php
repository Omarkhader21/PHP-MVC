<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\User;

class AuthController extends Controller
{
    public function login()
    {
        // TODO: Implement login() method.
        $this->setLayout("auth");
        return $this->render('login');
    }

    public function register(Request $request)
    {
        // TODO: Implement register() method.
        $user = new User();

        if ($request->isPost()) {
            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlashMessage('success', 'Thanks for register');
                Application::$app->response->redirect('/home');
                exit;
            }

            return $this->render('register', [
                'model' => $user
            ]);
        }

        $this->setLayout("auth");
        return $this->render('register', [
            'model' => $user
        ]);
    }
}

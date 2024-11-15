<?php

namespace app\controllers;

use app\models\User;
use omarkhader\phpmvccore\Request;
use omarkhader\phpmvccore\Response;
use omarkhader\phpmvccore\Controller;
use omarkhader\phpmvccore\Application;
use app\models\LoginForm;
use omarkhader\phpmvccore\middlewares\AuthMiddleware;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function login(Request $request, Response $response)
    {
        // TODO: Implement login() method.
        $loginForm = new LoginForm();
        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());

            if ($loginForm->validate() && $loginForm->login()) {
                $response->redirect('/home');
                return;
            }
        }
        $this->setLayout("auth");
        return $this->render('login', [
            'model' => $loginForm,
        ]);
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

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/home');
    }

    public function profile()
    {
        return $this->render('profile');
    }
}

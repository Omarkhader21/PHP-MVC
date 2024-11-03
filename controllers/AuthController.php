<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\RegisterModel;

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
        $registerModel = new RegisterModel();

        if ($request->isPost()) {
            $registerModel->loadData($request->getBody());

            if ($registerModel->validate() && $registerModel->register()) {
                return 'Success';
            }

            return $this->render('register', [
                'model' => $registerModel
            ]);
        }

        $this->setLayout("auth");
        return $this->render('register', [
            'model' => $registerModel
        ]);
    }
}

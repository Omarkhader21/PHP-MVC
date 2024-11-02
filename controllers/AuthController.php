<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

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

        if ($request->isPost()) {
            return "Handle submitted data";
        }
        $this->setLayout("auth");
        return $this->render('register');
    }
}

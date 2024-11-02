<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => 'PelfWolf',
        ];

        return $this->render('home', params: $params);
    }
    public function contact()
    {
        return $this->render('contact');
    }
    public static function handelContact(Request $request)
    {
        $body = $request->getBody();
        return 'Handeling submitted data';
    }
}

<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => 'PelfWolf',
        ];

        return $this->render('home', params: $params);
    }
    public function contact(Request $request, Response $response)
    {
        $contact = new ContactForm();

        if ($request->isPost()) {
            $contact->loadData($request->getBody());
            if ($contact->validate() && $contact->save()) {
                Application::$app->session->setFlashMessage('success', 'Thnaks for contacting us.');
                return $response->redirect('/contact');
            }
        }
        
        return $this->render('contact', [
            'model' => $contact
        ]);
    }
}

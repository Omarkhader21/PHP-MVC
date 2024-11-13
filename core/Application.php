<?php

namespace omarkhader21/phpcoremvc;

use \omarkhader21/phpcoremvc\Router;
use \omarkhader21/phpcoremvc\Request;
use \omarkhader21/phpcoremvc\Session;
use \omarkhader21/phpcoremvc\Response;
use omarkhader21/phpcoremvc\db\DbModel;
use omarkhader21/phpcoremvc\db\Database;

/**
 * Class Application
 * 
 *  @author pelfwolf
 *  @package omarkhader21/phpcoremvc
 */

class Application
{
    public static string $ROOT_DIR;
    public string $layout = "main";
    public string $userClass;
    public Router $router;
    public Request $request;
    public Response $response;
    public ?Controller $controller = null;
    public Database $database;
    public Session $session;
    public View $view;
    public static Application $app;
    public ?UserModel $user;
    public function __construct($rootPath, array $config)
    {
        $this->userClass = $config["userClass"] ?? ''; // Set a default value if userClass is not provided
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        $this->database = new Database($config['db']);
        $this->view = new View();

        $primaryValue = $this->session->get('user');
        if ($primaryValue) {
            $primaryKey = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
        } else {
            $this->user = null;
        }
    }

    public function run()
    {
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            $statusCode = is_int($e->getCode()) && $e->getCode() >= 100 && $e->getCode() < 600 ? $e->getCode() : 500;
            $this->response->setStatusCode($statusCode);

            echo $this->view->renderView('_error', [
                'exception' => $e
            ]);
            echo $this->view->renderView('_error', [
                'exception' => $e
            ]);
        }
    }

    /**
     * @return \omarkhader21/phpcoremvc\Controller
     */

    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param \omarkhader21/phpcoremvc\Controller $controller
     */

    public function setController(Controller $controller)
    {
        $this->controller = $controller;
    }
    public function login(UserModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);

        return true;
    }
    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }
    public static function isGuest()
    {
        return !self::$app->user;
    }
}

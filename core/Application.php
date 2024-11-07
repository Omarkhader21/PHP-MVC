<?php

namespace app\core;

use \app\core\Request;
use \app\core\Router;
use \app\core\Response;
use \app\core\Database;

/**
 * Class Application
 * 
 *  @author pelfwolf
 *  @package app\core
 */

class Application
{
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public Controller $controller;
    public Database $database;
    public static Application $app;

    public function __construct($rootPath, array $config)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->database = new Database($config['db']);
    }

    public function run()
    {
        echo $this->router->resolve();
    }

    /**
     * @return \app\core\Controller
     */

    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param \app\core\Controller $controller
     */

    public function setController(Controller $controller)
    {
        $this->controller = $controller;
    }
}

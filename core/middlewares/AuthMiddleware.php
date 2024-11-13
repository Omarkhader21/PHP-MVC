<?php

namespace omarkhader21/phpcoremvc\middlewares;

use omarkhader21/phpcoremvc\Application;
use omarkhader21/phpcoremvc\exception\ForbiddenException;
use omarkhader21/phpcoremvc\middlewares\BaseMiddleware;

class AuthMiddleware extends BaseMiddleware
{
    public array $actions = [];

    public function __construct(array $actions = [])
    {
        $this->actions = $actions;
    }
    public function execute()
    {
        if (Application::isGuest()) {
            if (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) {
                throw new ForbiddenException();
            }
        }
    }
}

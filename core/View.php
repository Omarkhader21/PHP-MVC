<?php

namespace omarkhader21/phpcoremvc;

class View
{
    public string $title = '';

    public function renderView($view, $params = [])
    {
        $viewContent = $this->renderOnlyView($view, $params);
        $layoutContent = $this->getLayoutContent();
        return str_replace('{{ content }}', $viewContent, $layoutContent);
    }

    public function getLayoutContent()
    {
        $layoutContent = Application::$app->layout;
        if (Application::$app->controller) {
            $layoutContent = Application::$app->controller->layout;
        }
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/$layoutContent.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }

    protected function renderViewContent($viewContent)
    {
        $layoutContent = $this->getLayoutContent();

        return str_replace('{{ content }}', $viewContent, subject: $layoutContent);
    }
}

<?php

namespace App\core;

class View
{
    public string $title = '';

    public function layoutContent()
    {
        $layout = Application::$app->controller ? Application::$app->controller->layout : Application::$app->layout;

        ob_start();
        include_once Application::$ROOT_DIR . '/views/layouts/' . $layout . '.php';
        return ob_get_clean();
    }

    public function renderView(string $view, $params = [])
    {
        $viewContent = $this->renderOnlyView($view, $params);

        $layoutContent = $this->layoutContent();

        return str_replace('{{ content }}', $viewContent, $layoutContent);
    }

    public function renderOnlyView($view, $params = [])
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR . '/views/' . $view . '.php';
        return ob_get_clean();
    }

    public function renderContent(string $viewContent)
    {
        $layoutContent = $this->layoutContent();

        return str_replace('{{ content }}', $viewContent, $layoutContent);
    }
}
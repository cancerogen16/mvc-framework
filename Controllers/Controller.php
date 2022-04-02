<?php

namespace App\controllers;

use App\core\Application;
use App\core\Middlewares\BaseMiddleWare;

class Controller
{
    public string $layout = 'main';
    public string $action = '';
    /**
     * @var BaseMiddleWare[]
     */
    protected array $middlewares = [];

    /**
     * @param $layout
     * @return void
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    /**
     * @param $view
     * @param array $params
     * @return array|false|string|string[]
     */
    public function render($view, array $params = [])
    {
        return Application::$app->view->renderView($view, $params);
    }

    public function registerMiddleWare(BaseMiddleWare $middleware)
    {
        $this->middlewares[] = $middleware;
    }

    /**
     * @return BaseMiddleWare[]
     */
    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}
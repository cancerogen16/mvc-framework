<?php

namespace App\Core;

use App\Controllers\Controller;
use App\Core\Exceptions\NotFoundException;

/**
 * @package App\Core
 */
class Router
{
    /**
     * @var Request
     */
    public Request $request;
    /**
     * @var Response
     */
    public Response $response;
    /**
     * @var array
     */
    protected array $routes = [];

    /**
     * @param Request $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * @param $path
     * @param $callback
     * @return void
     */
    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    /**
     * @param $path
     * @param $callback
     * @return void
     */
    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    /**
     * @return array|false|mixed|string|string[]
     * @throws NotFoundException
     */
    public function resolve()
    {
        $path = $this->request->getPath();

        $method = $this->request->method();

        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            throw new NotFoundException();
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        if (is_array($callback)) {
            /** @var Controller $controller */
            $controller = new $callback[0]();
            Application::$app->controller = $controller;
            $controller->action = $callback[1];
            $callback[0] = $controller;

            foreach ($controller->getMiddlewares() as $middleware) {
                $middleware->execute();
            }
        }

        return call_user_func($callback, $this->request, $this->response);
    }

    public function renderView(string $view, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);

        return str_replace('{{ content }}', $viewContent, $layoutContent);
    }

    protected function renderOnlyView($view, $params = [])
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

    protected function layoutContent()
    {
        $layout = Application::$app->controller ? Application::$app->controller->layout : Application::$app->layout;

        ob_start();
        include_once Application::$ROOT_DIR . '/views/layouts/' . $layout . '.php';
        return ob_get_clean();
    }
}
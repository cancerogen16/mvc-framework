<?php

namespace App\Core;

class Application
{
    /**
     * @var Router
     */
    public Router $router;
    /**
     * @var Request
     */
    public Request $request;

    /**
     *
     */
    public function __construct()
    {
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    /**
     * @return void
     */
    public function run()
    {
        $this->router->resolve();
    }
}
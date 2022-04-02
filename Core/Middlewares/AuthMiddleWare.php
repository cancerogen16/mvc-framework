<?php

namespace App\core\Middlewares;

use App\core\Application;
use App\core\Exceptions\ForbiddenException;

class AuthMiddleWare extends BaseMiddleWare
{
    public array $actions = [];

    /**
     * @param array $actions
     */
    public function __construct(array $actions = [])
    {
        $this->actions = $actions;
    }

    /**
     * @return void
     * @throws ForbiddenException
     */
    public function execute()
    {
        if (Application::isGuest()) {
            if (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) {
                throw new ForbiddenException();
            }
        }
    }
}
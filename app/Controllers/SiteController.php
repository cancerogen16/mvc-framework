<?php

namespace App\Controllers;

use App\Core\Application;

class SiteController
{
    public function home()
    {
        $params = [
            'name' => 'Max',
        ];

        return Application::$app->router->renderView('home', $params);
    }

    public function contact()
    {
        return Application::$app->router->renderView('contact');
    }

    public function handleContact()
    {
        return 'handling submitted data';
    }
}
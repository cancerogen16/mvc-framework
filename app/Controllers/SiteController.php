<?php

namespace App\Controllers;

use App\Core\Application;

class SiteController
{
    public function contact()
    {
        return Application::$app->router->renderView('contact');
    }

    public function handleContact()
    {
        return 'handling submitted data';
    }
}
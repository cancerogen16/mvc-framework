<?php

namespace App\Controllers;

use App\Core\Application;
use App\Core\Request;

class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => 'Max',
        ];

        return $this->render('home', $params);
    }

    public function contact()
    {
        return $this->render('contact');
    }


}
<?php

namespace App\Controllers;

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

    public function handleContact()
    {
        return 'handling submitted data';
    }
}
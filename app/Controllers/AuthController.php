<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\RegisterModel;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $this->setLayout('auth');

        return $this->render('login');
    }

    public function register(Request $request)
    {
        $errors = [];

        if ($request->isPost()) {
            $registerModel = new RegisterModel;

            $name = $request->getBody()['name'];
            if (!$name) {
                $errors['name'] = 'Name field is required';
            }
        }

        $this->setLayout('auth');

        return $this->render('register', [
            'errors' => $errors,
        ]);
    }
}
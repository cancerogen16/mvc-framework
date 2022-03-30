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

        $registerModel = new RegisterModel;

        if ($request->isPost()) {
            $registerModel->loadData($request->getBody());

            $name = $request->getBody()['name'];
            if ($registerModel->validate() && $registerModel->register()) {
                return 'Success';
            }

            return $this->render('register', [
                'model' => $registerModel,
                'errors' => $errors,
            ]);
        }

        $this->setLayout('auth');

        return $this->render('register', [
            'model' => $registerModel,
            'errors' => $errors,
        ]);
    }
}
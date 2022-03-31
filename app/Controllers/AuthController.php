<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\User;

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

        $registerModel = new User;

        if ($request->isPost()) {
            $registerModel->loadData($request->getBody());

            if ($registerModel->validate() && $registerModel->save()) {
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
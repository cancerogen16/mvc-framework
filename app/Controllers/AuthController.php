<?php

namespace App\Controllers;

use App\Core\Application;
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

        $user = new User;

        if ($request->isPost()) {
            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                Application::$app->response->redirect('/');
            }

            return $this->render('register', [
                'model' => $user,
                'errors' => $errors,
            ]);
        }

        $this->setLayout('auth');

        return $this->render('register', [
            'model' => $user,
            'errors' => $errors,
        ]);
    }
}
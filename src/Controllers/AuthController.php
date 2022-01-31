<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Models\RegisterModel;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isGet()) {
            $this->setLayout('auth');
            return $this->render('login');
        } else if ($request->isPost()) {
        }
    }
    public function register(Request $request)
    {
        $registerModel = new RegisterModel();
        if ($request->isPost()) {
            $body = $request->getBody();
            $registerModel->loadData($body);

            if ($registerModel->validate() && $registerModel->register()) {
                return 'Success';
            }
            return $this->render('register', ['model' => $registerModel]);
        }
        $this->setLayout('auth');
        return $this->render('register', ['model' => $registerModel]);
    }
}

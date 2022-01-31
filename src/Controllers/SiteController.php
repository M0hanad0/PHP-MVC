<?php

namespace App\Controllers;

use App\Core\Application;
use App\Core\Controller;
use App\Core\Request;

class SiteController extends Controller
{
    public function home()
    {
        return $this->render('home', ['title' => 'Home', 'name' => 'Mohannad']);
    }
    public function contact()
    {
        return Application::$app->router()->renderView('contact');
    }
    public function handleContact(Request $request)
    {
        $body = $request->getBody();
        echo '<pre>';
        var_dump($body);
        echo '</pre>';
    }
}

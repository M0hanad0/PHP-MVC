<?php

namespace App\Core;

class Application
{
    private Router $router;
    private Request $request;
    private Response $response;
    public Controller $controller;
    public static Application $app;
    public static string $ROOT_DIR;


    public function __construct(string $rootDirPath)
    {
        $this->request = new Request();
        $this->response = new Response();
        self::$app = $this;
        $this->router = new Router(request: $this->request, response: $this->response);
        self::$ROOT_DIR = $rootDirPath;
    }
    public function run()
    {
        echo $this->router()->resolve();
    }
    public function router()
    {
        return $this->router;
    }

    public function setController(Controller $controller)
    {
        $this->controller = $controller;
    }
}

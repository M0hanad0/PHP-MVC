<?php

namespace App\Core;

class Router
{
    private Request $request;
    private Response $response;
    private array $routes = [];

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }
    public function get(string $path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post(string $path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function renderView($view, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    private function renderOnlyView($view, $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        require_once Application::$ROOT_DIR . "/Views/$view.php";
        return ob_get_clean();
    }

    private function layoutContent()
    {
        $layout = Application::$app->controller->layout;
        ob_start();
        require_once Application::$ROOT_DIR . "/Views/layouts/$layout.php";
        return ob_get_clean();
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $requestMethod = $this->request->method();

        $callback = $this->routes[$requestMethod][$path] ?? null;

        if ($callback === null) {
            $this->response->setStatusCode(HTTP_STATUS_CODE::STATUS_CODE_404);
            return $this->renderView('_404');
        }

        if (is_array($callback)) {
            [$class, $method] = $callback;
            $instance = new $class;
            Application::$app->setController($instance);
            return call_user_func([$instance, $method], $this->request);
        } else if (is_string($callback)) {
            return $this->renderView($callback);
        } else if (is_callable($callback)) {
            return call_user_func($callback);
        }
    }
}

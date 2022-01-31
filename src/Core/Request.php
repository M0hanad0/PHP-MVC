<?php

namespace App\Core;

class Request
{
    public static Request $request;
    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
    public function isGet()
    {
        return $this->method() === 'get';
    }
    public function isPost()
    {
        return $this->method() === 'post';
    }
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $queryPos = strpos($path, '?');
        if ($queryPos === false) {
            return $path;
        }
        return substr($path, 0, $queryPos);
    }
    public function getBody()
    {
        $body = [];
        $requestMethod = $this->method();
        if ($requestMethod === 'get') {
            foreach ($_GET as $key => $val) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        } else if ($requestMethod === 'post') {
            foreach ($_POST as $key => $val) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }
}

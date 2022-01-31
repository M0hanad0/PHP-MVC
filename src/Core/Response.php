<?php

namespace App\Core;

abstract class HTTP_STATUS_CODE
{
    const STATUS_CODE_404 = 404;
    const STATUS_CODE_200 = 200;
}

class Response
{
    private int $statusCode;
    public function __construct(int $statusCode = HTTP_STATUS_CODE::STATUS_CODE_200)
    {
        $this->statusCode = $statusCode;
    }
    public function setStatusCode(int $statusCode)
    {
        http_response_code($statusCode ?? $this->statusCode);
    }
}

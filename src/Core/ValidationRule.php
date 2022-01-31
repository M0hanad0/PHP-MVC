<?php

namespace App\Core;

abstract class ValidationRule
{
    protected array $params;

    public function __construct(array $params = [])
    {
        $this->params = $params;
    }

    abstract function rule($value, Model $model): bool;

    abstract function errorMsg(): string;
}

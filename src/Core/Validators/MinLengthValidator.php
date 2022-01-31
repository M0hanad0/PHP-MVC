<?php

namespace App\Core\Validators;

use App\Core\Model;
use App\Core\ValidationRule;

class MinLengthValidator extends ValidationRule
{
    public function rule($value, Model $_): bool
    {
        return strlen($value) > $this->params['min'];
    }

    public function errorMsg(): string
    {
        return "Minimum length of this field is {$this->params['min']}";
    }
}

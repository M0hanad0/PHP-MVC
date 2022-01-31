<?php

namespace App\Core\Validators;

use App\Core\Model;
use App\Core\ValidationRule;

class MaxLengthRule extends ValidationRule
{
    public function rule($value, Model $_): bool
    {
        return strlen($value) < $this->params['max'];
    }

    public function errorMsg(): string
    {
        return "Maximum length of this field is {$this->params['max']}";
    }
}

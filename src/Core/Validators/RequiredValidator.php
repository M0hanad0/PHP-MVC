<?php

namespace App\Core\Validators;

use App\Core\Model;
use App\Core\ValidationRule;

class RequiredValidator extends ValidationRule
{
    public function rule($value, Model $_): bool
    {
        return $value !== '';
    }

    public function errorMsg(): string
    {
        return 'This field is required';
    }
}

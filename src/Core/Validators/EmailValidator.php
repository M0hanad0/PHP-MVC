<?php

namespace App\Core\Validators;

use App\Core\Model;
use App\Core\ValidationRule;

class EmailValidator extends ValidationRule
{
    public function rule($value, Model $_): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public function errorMsg(): string
    {
        return 'This field must be a valid email address';
    }
}

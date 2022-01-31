<?php

namespace App\Core\Validators;

use App\Core\Model;
use App\Core\ValidationRule;

class MatchValidator extends ValidationRule
{
    public function rule($value, Model $model): bool
    {
        return $value === $model->{$this->params['match']};
    }

    public function errorMsg(): string
    {
        return "This field must be the same as {$this->params['match']}";
    }
}

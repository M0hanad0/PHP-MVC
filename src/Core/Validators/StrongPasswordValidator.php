<?php

namespace App\Core\Validators;

use App\Core\Model;
use App\Core\ValidationRule;

use function App\Core\Helpers\isLower;
use function App\Core\Helpers\isUpper;

class StrongPasswordValidator extends ValidationRule
{
    public function rule($password, Model $_): bool
    {
        return (strlen($password) >= 8 &&
            \Functional\some(str_split($password), fn ($chr) => strtolower($chr) === $chr) &&
            \Functional\some(str_split($password), fn ($chr) => strtoupper($chr) === $chr) &&
            \Functional\some(str_split($password), fn ($chr) => ctype_digit($chr)) &&
            preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password));
    }

    public function errorMsg(): string
    {
        return "Pick a strong password containing at least 8 uppercase characters, lowercase characters, numbers and special characters.";
    }
}

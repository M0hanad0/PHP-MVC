<?php

namespace App\Models;

use App\Core\Model;
use App\Core\Request;
use App\Core\Validators\EmailRule;
use App\Core\Validators\EmailValidator;
use App\Core\Validators\MatchValidator;
use App\Core\Validators\MinLengthValidator;
use App\Core\Validators\RequiredValidator;
use App\Core\Validators\StrongPasswordValidator;

class RegisterModel extends Model
{
    public string $firstName = '';
    public string $lastName = '';
    public string $email = '';
    public string $password = '';
    public string $passwordConfirm = '';

    public function __construct(array $body = [])
    {
        if (!empty($body)) {
            $this->loadData($body);
        }
    }

    public function validators(): array
    {
        return [
            'firstName'       => [
                new RequiredValidator()
            ],
            'lastName'        => [
                new RequiredValidator()
            ],
            'email'           => [
                new RequiredValidator(),
                new EmailValidator()
            ],
            'password'        => [
                new RequiredValidator(),
                new StrongPasswordValidator()
            ],
            'passwordConfirm' => [
                new RequiredValidator(),
                new MatchValidator(['match' => 'password']),
                new StrongPasswordValidator()
            ]
        ];
    }

    public function register()
    {
    }
}

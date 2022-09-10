<?php

namespace App\Validations;

use App\Abstraction\BaseValidations;

class ContactValidation extends BaseValidations
{
    public function rules(): array
    {
        return [
            'firstname' => [
                [
                    'rule' => self::RULE_REQUIRED,
                    'message' => 'Firstname is required'
                ]
            ],
            'lastname' => [
                [
                    'rule' => self::RULE_REQUIRED,
                    'message' => 'Lastname is required'
                ]
            ],
            'email' => [
                [
                    'rule' => self::RULE_EMAIL,
                    'message' => 'Pleaes enter a valid email'
                ],
                [
                    'rule' => self::RULE_UNIQUE,
                    'message' => 'This email is already registered',
                    'class' => self::class
                ]
            ],
            'password' => [
                [
                    'rule' => self::RULE_MIN,
                    'message' => 'Minimum password length is 3',
                    'min' => 3
                ]
            ],
            'confirmPassword' => [
                [
                    'rule' => self::RULE_MATCH,
                    'message' => 'Password didn\'t matched',
                    'match' => 'password'
                ]
            ]
        ];
    }
}
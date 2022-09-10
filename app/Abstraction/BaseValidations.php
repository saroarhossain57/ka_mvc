<?php

namespace App\Abstraction;

abstract class BaseValidations
{
    protected const RULE_REQUIRED = 'required';
    protected const RULE_EMAIL = 'email';
    protected const RULE_MIN = 'min';
    protected const RULE_MATCH = 'match';
    protected const RULE_UNIQUE = 'unique';

    abstract public function rules(): array;

    public function validate(){

    }
}
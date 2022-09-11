<?php

namespace App\Models;

class UserModel extends BaseModel
{

    public static function tableName(): string
    {
        return 'users';
    }

    public function attributes(): array
    {
        return [
            'firstname',
            'lastname',
            'email',
            'password',
        ];
    }

    public static function primaryKey(): string
    {
        return 'id';
    }
}
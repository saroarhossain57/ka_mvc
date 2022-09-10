<?php

namespace App\Models;

class Contact extends BaseModel
{

    public static function tableName()
    {
        return 'contact';
    }

    public function attributes(): array
    {
        return [
            'firstname',
            'lastname',
            'email',
            'message',
        ];
    }

    public static function primaryKey(): string
    {
        // TODO: Implement primaryKey() method.
    }
}
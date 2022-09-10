<?php

namespace App\Models;

class ContactModel extends BaseModel
{

    public static function tableName(): string
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
        return 'id';
    }
}
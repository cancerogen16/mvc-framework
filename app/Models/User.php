<?php

namespace App\Models;

use App\Core\DbModel;

class User extends DbModel
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $confirm = '';

    public function tableName(): string
    {
        return 'user';
    }

    public function register()
    {
        echo 'Creating new user';
    }

    public function rules(): array
    {
        return [
            'name' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 4], [self::RULE_MAX, 'max' => 10]],
            'confirm' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }
}
<?php

namespace Models\User;

use Models\ActiveRecordEntity;

class User extends ActiveRecordEntity
{
    protected $nickname;
    protected $email;
    protected $is_confirmed;
    protected $role;
    protected $password;
    protected $auth_token;
    protected $cratedAt;


    public function getNickname(): string
    {
        return $this->nickname;
    }
    
    public function getEmail(): string
    {
        return $this->email;
    }

    public static function getTableName(): string
    {
        return 'users';
    }
}
<?php

namespace Models\User;

use Models\ActiveRecordEntity;

class User extends ActiveRecordEntity
{
    protected $nickname;
    protected $email;
    protected $isCinfirmed;
    protected $role;
    protected $passwordHash;
    protected $authToken;
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
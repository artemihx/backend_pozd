<?php

namespace Models\User;

use Exceptions\InvalidArgumentException;
use Models\ActiveRecordEntity;

class User extends ActiveRecordEntity
{
    protected $nickname;
    protected $email;
    protected $is_confirmed;
    protected $role;
    protected $password;
    protected $auth_token;
    protected $created_at;


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

    public function getPasswordHash(): string
    {
        return $this->password;
    }

    public function getAuthToken(): string
    {
        return $this->auth_token;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    private function refreshAuthToken()
    {
        $this->auth_token = sha1(random_bytes(100)) . sha1(random_bytes(100));
    }

    public static function signUp(array $userData)
    {
        if (empty($userData['nickname'])) {
            throw new InvalidArgumentException('Не передан nickname');
        }

        if (!preg_match('/^[a-zA-Z0-9]+$/', $userData['nickname']))
        {
            throw new InvalidArgumentException('Nickname может состоять только из символов латинского алфавита и цифр');
        }

        if (empty($userData['email'])) {
            throw new InvalidArgumentException('Не передан email');
        }

        if(!filter_var($userData['email'], FILTER_VALIDATE_EMAIL))
        {
            throw new InvalidArgumentException('Email екорректен');
        }

        if (empty($userData['password']))
        {
            throw new InvalidArgumentException('Не передан password');
        }

        if(mb_strlen($userData['password']) < 8)
        {
            throw new InvalidArgumentException('Пароль должен быть не менее 8 символов');
        }

        if(static::findOneByColumn('nickname', $userData['nickname'] !== null))
        {
            throw new InvalidArgumentException('пользователь с таким nickname уже существует');
        }

        if(static::findOneByColumn('email', $userData['email'] !== null))
        {
            throw new InvalidArgumentException('пользователь с таким email уже существует');
        }

        $user = new User();
        $user->nickname = $userData['nickname'];
        $user->email = $userData['email'];
        $user->password = password_hash($userData['password'], PASSWORD_DEFAULT);
        $user->is_confirmed = false;
        $user->role = 'user';
        $user->auth_token = sha1(random_bytes(100)) . sha1(random_bytes(100));
        $user->save();

        return $user;
    }

    public static function login(array $loginData): User
    {
        if (empty($loginData['email']))
        {
            throw new InvalidArgumentException('Не передан email');
        }
        if (empty($loginData['password']))
        {
            throw new InvalidArgumentException('Не передан password');
        }

        $user = User::findOneByColumn('email', $loginData['email']);
        
        if($user === null)
        {
            throw new InvalidArgumentException('Нет пользователя с таким email');
        }
        if(!password_verify($loginData['password'], $user->getPasswordHash()))
        {
            throw new InvalidArgumentException('Неправильный пароль');
        }
        if(!$user->is_confirmed)
        {
            throw new InvalidArgumentException('Пользователь не подтвержден');
        }

        $user->refreshAuthToken();
        $user->save();
        
        return $user;
    }


}

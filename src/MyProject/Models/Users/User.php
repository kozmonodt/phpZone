<?php

namespace MyProject\Models\Users;

use MyProject\Exceptions\InvalidDataException;
use MyProject\Models\ActiveRecordEntity;

class User extends ActiveRecordEntity
{

    protected $nickname;

    protected $email;

    protected $isConfirmed;

    protected $role;

    protected $passwordHash;

    protected $authToken;

    protected $createdAt;

    /**
     * @return mixed
     */
    public function getAuthToken()
    {
        return $this->authToken;
    }


    public function getPasswordHash()
    {
        return $this->passwordHash;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }

    protected static function getTableName(): string
    {
        return 'users';
    }



    private function refreshAuthToken()
    {
        $this->authToken = sha1(random_bytes(100)) . sha1(random_bytes(100));
    }

    public static function signUp(array $userData)
    {
        if (empty($userData['nickname'])) {
            throw new InvalidDataException('Не передан nickname');
        }

        if (!preg_match('/^[a-zA-Z0-9]+$/', $userData['nickname'])) {
            throw new InvalidDataException('Nickname может состоять только из символов латинского алфавита и цифр');
        }
        if(static::findOneByColumn('nickname',$userData['nickname']) !== null) {
            throw new InvalidDataException('Пользователь с таким nickname уже существует');
        }
/////


        if (empty($userData['email'])) {
            throw new InvalidDataException('Не передан email');
        }

        if (!filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
            throw new InvalidDataException('Email некорректен');
        }

        if(static::findOneByColumn('email',$userData['email']) !== null) {
            throw new InvalidDataException('Пользователь с таким имейлом уже существует');
        }

/////
        if (empty($userData['password'])) {
            throw new InvalidDataException('Не передан password');
        }

        if (mb_strlen($userData['password']) < 8) {
            throw new InvalidDataException('Пароль должен быть не менее 8 символов');
        }

        $user = new User();

        $user->nickname = $userData['nickname'];
        $user->email = $userData['email'];
        $user->passwordHash = password_hash($userData['password'], PASSWORD_DEFAULT);
        $user->isConfirmed = true;
        $user->role = 'user';
        $user->authToken = sha1(random_bytes(100)) . sha1(random_bytes(100));
        $user->save();

        return $user;

    }

    public static function login($loginData) : User
    {
        if (empty($loginData['email'])) {
            throw new InvalidDataException('Не передан email');
        }

        if (empty($loginData['password'])) {
            throw new InvalidDataException('Не передан password');
        }

        $user = User::findOneByColumn('email', $loginData['email']);
        if ($user === null) {
            throw new InvalidDataException('Нет пользователя с таким email');
        }

        if (!password_verify($loginData['password'], $user->getPasswordHash())) {
            throw new InvalidDataException('Неправильный пароль');
        }

        if (!$user->isConfirmed) {
            throw new InvalidDataException('Пользователь не подтверждён');
        }

        $user->refreshAuthToken();
        $user->save();

        return $user;
    }
}
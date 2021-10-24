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

    }
}
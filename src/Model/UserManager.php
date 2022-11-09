<?php

namespace App\Model;

use PDO;

class UserManager extends AbstractManager
{
    public const TABLE = 'user';

    public function insert(array $user): void
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (
        `firstname`,
        `lastname`,
        `email`,
        `password`,
        `birthday`) VALUES (
        :firstname,
        :lastname,
        :email,
        :password,
        :birthday)");
        $statement->bindValue('firstname', $user['firstname'], PDO::PARAM_STR);
        $statement->bindValue('lastname', $user['lastname'], PDO::PARAM_STR);
        $statement->bindValue('email', $user['email'], PDO::PARAM_STR);
        $statement->bindValue('password', $user['password'], PDO::PARAM_STR);
        $statement->bindValue('birthday', $user['birthday'], PDO::PARAM_STR);

        $statement->execute();
        //return (int)$this->pdo->lastInsertId();
    }
}

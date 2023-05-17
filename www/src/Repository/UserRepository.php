<?php

namespace Baccura\Repository;

use Baccura\Lib\DatabaseConnection;
use Baccura\Model\User;
use PDO;

class UserRepository
{
    public DatabaseConnection $connection;

    /**
     * Connexion de l'utilisateur
     * @param string $email     Email de l'utilisateur
     * @param string $password  Mot de passe de l'utilisateur
     * @return ?User    Utilisateur connecté
     */
    public function login(string $email, string $password): ?User
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, email, pseudo, password FROM users WHERE email = :email"
        );

        $statement->bindValue(':email', htmlspecialchars($email), PDO::PARAM_STR);

        $statement->execute();

        $row = $statement->fetch();

        if (!password_verify($password, $row['password']))
            return null;

        $user = new User();
        $user->id = $row['id'];
        $user->email = $row['email'];
        $user->pseudo = $row['pseudo'];

        return $user;
    }
}

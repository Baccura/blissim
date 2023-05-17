<?php

namespace Baccura\Controllers;

use Baccura\Lib\DatabaseConnection;
use Baccura\Repository\UserRepository;
use Exception;

class UserController
{
    /**
     * Affichage du formulaire de connexion
     * @param array $input      Données du formulaire
     */
    public function login(array $inputs): void
    {
        // Redirection de l'utilisateur si il est déjà connecté
        if (isset($_SESSION['user']) && $_SESSION['user'])
            Header('Location: /');

        // Connexion de l'utilisateur si le formulaire est envoyé
        if ($inputs) {
            $email = null;
            $password = null;

            if (isset($inputs['email']) && $inputs['email'] && isset($inputs['password']) && $inputs['password']) {
                $email = $inputs['email'];
                $password = $inputs['password'];

                $userRepository = new UserRepository();
                $userRepository->connection = new DatabaseConnection();
                $user = $userRepository->login($email, $password);

                if (!$user) {
                    throw new Exception('Impossible de se connecter !');
                } else {
                    $_SESSION['user'] = $user;
                    Header('Location: /');
                }
            } else {
                throw new Exception("Le formulaire n'est pas complet !");
            }
        }

        require_once('templates/users/login.php');
    }

    /**
     * Déconnexion de l'utilisateur
     */
    public function logout(): void
    {
        session_destroy();

        header('Location: /');
    }
}

<?php

require __DIR__ . '/vendor/autoload.php';

use Baccura\Controllers\CommentController;
use Baccura\Controllers\ProductController;
use Baccura\Controllers\UserController;

session_start();

// Routeur
try {
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'login':
                // Connexion
                (new UserController())->login($_POST);
                break;
            case 'logout':
                // Déconnexion
                (new UserController())->logout();
                break;
            case 'product':
                // Affichage d'un produit
                if (isset($_GET['productId']) && $_GET['productId'] > 0) {
                    $productId = $_GET['productId'];
                    $page = $_GET['page'] ?? 1;

                    (new ProductController())->show($productId, $page);
                } else {
                    throw new Exception("Le produit n'existe pas !");
                }
                break;
            case 'addComment':
                // Création d'un commentaire pour un produit
                if (isset($_GET['productId']) && $_GET['productId'] > 0) {
                    $productId = $_GET['productId'];

                    (new CommentController())->add($productId, $_POST);
                } else {
                    throw new Exception("Impossible d'ajouter un commentaire");
                }
                break;
            default:
                // Affichage de la liste des produits
                (new ProductController())->list();
                break;
        }
    } else {
        // Affichage de la liste des produits
        (new ProductController())->list();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();

    require 'templates/error.php';
}

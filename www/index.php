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
                (new UserController())->login($_POST);
                break;
            case 'logout':
                (new UserController())->logout();
                break;
            case 'product':
                if (isset($_GET['productId']) && $_GET['productId'] > 0) {
                    $productId = $_GET['productId'];
                    $page = $_GET['page'] ?? 1;

                    (new ProductController())->show($productId, $page);
                } else {
                    throw new Exception("Le produit n'existe pas !");
                }
                break;
            case 'addComment':
                if (isset($_GET['productId']) && $_GET['productId'] > 0) {
                    $productId = $_GET['productId'];
                    (new CommentController())->add($productId, $_POST);
                } else {
                    throw new Exception("Impossible d'ajouter un commentaire");
                }
                break;
            default:
                (new ProductController())->list();
                break;
        }
    } else {
        (new ProductController())->list();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();

    require 'templates/error.php';
}

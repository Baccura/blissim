<?php

namespace Baccura\Controllers;

use Baccura\Lib\DatabaseConnection;
use Baccura\Repository\CommentRepository;
use Baccura\Repository\ProductRepository;

class ProductController
{
    /**
     * Affichage de la liste des produits
     */
    public function list(): void
    {
        // Récupération de la liste des produits
        $productRepository = new ProductRepository();
        $productRepository->connection = new DatabaseConnection();
        $products = $productRepository->list();

        require_once('templates/products/list.php');
    }

    /**
     * Affichage des informations d'un produit
     * @param string $productId     ID du produit
     * @param int $page             Numéro de page à afficher pour les commentaires
     */
    public function show(string $productId, int $page): void
    {
        // Récupération des informations du produit
        $productRepository = new ProductRepository();
        $productRepository->connection = new DatabaseConnection();
        $product = $productRepository->show($productId);

        // Récupération de la liste des commentaires et des informations pour la pagination
        $page = $_GET['page'] ?? 1;
        $commentRepository = new CommentRepository();
        $commentRepository->connection = new DatabaseConnection();
        $comments = $commentRepository->list($productId, $page);
        $nbCommentsPerPage = $commentRepository::NB_PER_PAGE;
        $nbComments = $commentRepository->count($productId);

        require_once('templates/products/show.php');
    }
}

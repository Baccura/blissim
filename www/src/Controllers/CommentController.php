<?php

namespace Baccura\Controllers;

use Baccura\Lib\DatabaseConnection;
use Baccura\Repository\CommentRepository;
use Exception;

class CommentController
{
    /**
     * Création d'un commentaire
     * @param string $productId     ID du produit
     * @param array $input          Données du formulaire
     */
    public function add(string $productId, array $inputs): void
    {
        $content = null;

        if (isset($inputs['content']) && $inputs['content']) {
            $content = $inputs['content'];

            // Création du commentaire
            $commentRepository = new CommentRepository();
            $commentRepository->connection = new DatabaseConnection();
            $success = $commentRepository->add($productId, $_SESSION['user'], $content);

            if (!$success) {
                throw new Exception("Impossible d'enregistrer le commentaire !");
            } else {
                Header("Location: /?action=product&productId=$productId");
            }
        }
    }
}

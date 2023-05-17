<?php

namespace Baccura\Repository;

use Baccura\Lib\DatabaseConnection;
use Baccura\Model\Comment;
use Baccura\Model\User;
use DateTime;
use PDO;

class CommentRepository
{
    public const NB_PER_PAGE = 4;
    public DatabaseConnection $connection;

    /**
     * Récupération de la liste des commentaires pour un produit
     * @param string $productId     ID du produit
     * @param int $page             Numéro de page recherché
     * @return array    Tableau de commentaires
     */
    public function list(string $productId, int $page = 1): array
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT comments.id, comments.content, comments.created_at, users.pseudo 
            FROM comments 
            INNER JOIN users ON users.id = comments.users_id 
            WHERE comments.products_id = :productId
            ORDER BY comments.created_at DESC
            LIMIT :first,:perPage"
        );

        $firstElem = ($page * self::NB_PER_PAGE) - self::NB_PER_PAGE;
        $statement->bindValue(':productId', $productId, PDO::PARAM_INT);
        $statement->bindValue(':first', $firstElem, PDO::PARAM_INT);
        $statement->bindValue(':perPage', self::NB_PER_PAGE, PDO::PARAM_INT);

        $statement->execute();

        $comments = [];

        while ($row = $statement->fetch()) {
            $comment = new Comment();

            $comment->id = $row['id'];
            $comment->content = $row['content'];
            $comment->createdAt = new DateTime($row['created_at']);
            $comment->user = $row['pseudo'];

            $comments[] = $comment;
        }

        return $comments;
    }

    /**
     * Récupération du nombre de commentaires pour le produit
     * @param string $productId     ID du produit
     * @return int      Nombre de commentaires
     */
    public function count(string $productId): int
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT COUNT(id) AS nbComments FROM comments WHERE products_id = :productId"
        );

        $statement->bindValue(':productId', htmlspecialchars($productId), PDO::PARAM_INT);

        $statement->execute();

        $row = $statement->fetch();

        return (int) $row['nbComments'];
    }

    /**
     * Création d'un commentaire
     * @param string $productId     ID du produit
     * @param User $user            Auteur du commentaire
     * @param string $content       Contenu du commentaire
     * @return bool
     */
    public function add(string $productId, User $user, string $content): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            "INSERT INTO comments (products_id, content, created_at, users_id) VALUES (:productId, :content, NOW(), :userId)"
        );

        $statement->bindValue(':productId', htmlspecialchars($productId), PDO::PARAM_INT);
        $statement->bindValue(':content', htmlspecialchars($content), PDO::PARAM_STR);
        $statement->bindValue(':userId', $user->id, PDO::PARAM_INT);

        $affectedLines = $statement->execute();

        return ($affectedLines > 0);
    }
}

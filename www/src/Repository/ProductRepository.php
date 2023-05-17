<?php

namespace Baccura\Repository;

use Baccura\Lib\DatabaseConnection;
use Baccura\Model\Product;
use PDO;

class ProductRepository
{
    public DatabaseConnection $connection;

    /**
     * Récupération de la liste des produits
     * @return array    Tableau de produits
     */
    public function list(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT id, name, description, price FROM products"
        );

        $products = [];

        while ($row = $statement->fetch()) {
            $product = new Product();

            $product->id = $row['id'];
            $product->name = $row['name'];
            $product->description = $row['description'];
            $product->price = $row['price'];

            $products[] = $product;
        }

        return $products;
    }

    /**
     * Récupération du produit correspondant à l'ID en paramètre
     * @param string $productId     ID du produit
     * @return Product
     */
    public function show(string $productId): Product
    {

        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, name, description, price FROM products WHERE id = :productId"
        );

        $statement->bindValue(':productId', htmlspecialchars($productId), PDO::PARAM_INT);

        $statement->execute();

        $row = $statement->fetch();

        $product = new Product();
        $product->id = $row['id'];
        $product->name = $row['name'];
        $product->description = $row['description'];
        $product->price = $row['price'];

        return $product;
    }
}

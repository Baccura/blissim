<?php

namespace Baccura\Lib;

use PDO;

class DatabaseConnection
{
    public ?PDO $database = null;

    /**
     * Création de la connexion à la base de données
     * @return PDO
     */
    public function getConnection(): PDO
    {
        if (!$this->database)
            $this->database = new PDO('mysql:host=db;dbname=blissim;charset=utf8', 'root', 'root');

        return $this->database;
    }
}

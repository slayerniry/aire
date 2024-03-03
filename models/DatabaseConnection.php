<?php

namespace Models;

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Query\QueryBuilder;

class DatabaseConnection
{
    /** @var Connection */
    private $database;

    public function __construct()
    {
        $connectionParams = [
            'dbname'   => DB_NAME,
            'user'     => DB_USER,
            'password' => DB_PWD,
            'host'     => DB_HOST,
            'driver'   => 'pdo_mysql',
        ];

        try {
            // Créer une connexion Doctrine DBAL
            $this->database = DriverManager::getConnection($connectionParams);
        } catch (\Doctrine\DBAL\Exception $e) {
            // Gérer les erreurs de connexion
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    /**
     * @return Connection
     */
    public function useDatabase()
    {
        return $this->database;
    }

    /**
     * Exécute une requête SQL directe
     *
     * @param string $sql
     * @return array
     */
    public function execute_req($sql)
    {
        try {
            // Exécuter la requête SQL
            $stmt = $this->database->query($sql);

            // Récupérer les résultats de la requête
            $results = $stmt->fetchAllAssociative();

            return $results;
        } catch (\Doctrine\DBAL\Exception $e) {
            // Gérer les erreurs d'exécution de la requête
            die("Erreur d'exécution de la requête : " . $e->getMessage());
        }
    }

    public function execute_req_pdo($sql)
    {
        try {
            // Exécuter la requête SQL
            $stmt = $this->database->query($sql);

            // Récupérer les résultats de la requête
            $results = $stmt->fetchAllAssociative();

            return $results;
        } catch (\Doctrine\DBAL\Exception $e) {
            // Gérer les erreurs d'exécution de la requête
            die("Erreur d'exécution de la requête : " . $e->getMessage() . "<br>" . $sql );
        }
    }

    /**
     * Exécute une requête préparée avec Doctrine DBAL
     *
     * @param QueryBuilder $qb
     * @return array
     */
    public function executeQueryBuilder(QueryBuilder $qb)
    {
        try {
            // Exécuter la requête construite avec QueryBuilder
            $stmt = $qb->execute();

            // Récupérer les résultats de la requête
            $results = $stmt->fetchAllAssociative();

            return $results;
        } catch (\Doctrine\DBAL\Exception $e) {
            // Gérer les erreurs d'exécution de la requête
            die("Erreur d'exécution de la requête QueryBuilder : " . $e->getMessage());
        }
    }

    /**
     * Insert data into a table
     *
     * @param string $table
     * @param array $data
     * @return int The number of affected rows
     */
    public function execute_insert($table, array $data)
    {
        try {
            // Insert the data into the table
            $this->database->insert($table, $data);

            return "";
        } catch (\Doctrine\DBAL\Exception $e) {
            return ("Erreur lors de l'insertion : " . $e->getMessage());
        }
    }


    /**
     * Update data in a table
     *
     * @param string $table
     * @param array $data
     * @param array $condition
     * @return int The number of affected rows
     */
    public function execute_update($table, array $data, array $condition)
    {
        try {

            $this->database->update($table, $data, $condition);

            // Return the number of affected rows
            return "";
        } catch (\Doctrine\DBAL\Exception $e) {
            return ("Erreur lors de la mise à jour : " . $e->getMessage());
        }
    }

    /**
     * Delete data from a table
     *
     * @param string $table
     * @param array $condition
     * @return int The number of affected rows
     */
    public function delete($table, array $condition)
    {
        try {
            $this->database->delete($table, $condition);

            // Return the number of affected rows
            return 0;
        } catch (\Doctrine\DBAL\Exception $e) {
            die("Erreur lors de la suppression : " . $e->getMessage());
        }
    }

    public function my_htmlencode($value, $transforme)
    {
        if ($transforme == 0) {
            return addslashes(trim($value));
        } else {
            return htmlentities(addslashes(trim($value)));
        }
    }
}

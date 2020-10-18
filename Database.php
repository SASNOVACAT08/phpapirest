<?php

/**
 * Class de connexion à la BDD
 */
class Database
{

    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost:3306;dbname=apirest", 'root', 'root');
        $this->app = new App();
    }

    /**
     * Obtenir des informations de la base de données
     *
     * @param string $statement
     * @param boolean $one
     * @return void
     */
    public function query($statement, $one = false)
    {
        try {
            $state = $this->pdo->query($statement, PDO::FETCH_OBJ);

            if ($one) {
                $data = $state->fetch();
            } else {
                $data = $state->fetchAll();
            }

            $this->app->sendData("Informations récupérées", true, $data);
        } catch (\Throwable $th) {
            $this->app->sendData("Erreur lors de la récupération des informations");
        }
    }

    /**
     * Obtenir les informations de la base de données et avec un return
     *
     * @param string $statement
     * @param boolean $one
     */
    public function queryReturn($statement, $one = false)
    {
        try {
            $state = $this->pdo->query($statement, PDO::FETCH_OBJ);

            if ($one) {
                $data = $state->fetch();
            } else {
                $data = $state->fetchAll();
            }

            return $data;
        } catch (\Throwable $th) {
            $this->app->sendData("Erreur lors de la récupération des informations");
        }
    }

    /**
     * Prépare et execute une requête
     *
     * @param string $statement
     * @param string $action
     * @param array $param
     */
    public function prepare($statement, $action, $param = array())
    {
        try {
            $state = $this->pdo->prepare($statement);

            $state->execute($param);

            if ($action === "save") {
                $message = "Données enregistrées";
            } elseif ($action === "delete") {
                $message = "Données supprimées";
            } elseif ($action === "put") {
                $message = "Données modifiées";
            }

            $this->app->sendData($message, true);
        } catch (\Throwable $th) {
            $this->app->sendData("Erreur lors de l'enregistrement");
        }
    }
}

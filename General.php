<?php

require "Database.php";

class General
{

    public $db;
    protected $table;

    public function __construct()
    {
        $this->db = new Database();
        $this->app = new App();
    }

    /**
     * Obtenir toutes les informations
     */
    public function getAll()
    {
        $this->db->query("SELECT * FROM $this->table");
    }

    /**
     * Ontenir une information
     *
     * @param int $id
     */
    public function getOne($id)
    {
        $this->db->query("SELECT * FROM $this->table WHERE id=$id", true);
    }

    /**
     * Sauvegarder les informations dans la base de données
     *
     * @param array $param
     */
    public function save($param)
    {
        $statement = "INSERT INTO $this->table (";
        $values = " VALUES (";
        foreach ($param as $key => $value) {
            $statement .= $key . ", ";
            $values .= ":" . $key . ", ";
        }
        $statement = substr($statement, 0, -2) . ") ";
        $values = substr($values, 0, -2) . ")";

        $statement .= $values;

        $data = array();
        foreach ($param as $key => $value) {
            $data[$key] = htmlspecialchars($value);
        }

        $this->db->prepare($statement, "save", $data);
    }

    /**
     * Modifier une ligne dans la base de données
     *
     * @param int $id
     * @param string $param
     */
    public function put($id, $param)
    {
        $data = json_decode($param, true);

        $statement = "UPDATE $this->table SET ";
        foreach ($data as $key => $value) {
            $statement .= $key . "=:" . $key . ", ";
        }
        $statement = substr($statement, 0, -2);
        $statement .= " WHERE id=$id";
        var_dump($statement);
        $this->db->prepare($statement, "put", $data);
    }

    /**
     * Obtenir le role d'un client à partir d'une clé API
     */
    public function getRole($apiKey)
    {
        $role = $this->db->queryReturn("SELECT role FROM client WHERE apiKey = '$apiKey'", true);
        return $role->role;
    }
}

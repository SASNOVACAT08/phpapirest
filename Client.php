<?php

require "General.php";

use OpenApi\Annotations as OA;

class Client extends General
{

    protected $table = "client";

    /**
     * Accéder à tous les clients 
     *
     * @return void
     */
    public function getAll()
    {
        $this->db->query("SELECT id, nom, username, role FROM $this->table");
    }

    /**
     * Accéder à un client
     * 
     * @param int $id
     * @return void
     */
    public function getOne($id)
    {
        $this->db->query("SELECT id, nom, username, role FROM $this->table WHERE id=$id", true);
    }

    /**
     * Sauvegarder un client
     * 
     * @param array $param
     * @return void
     */
    public function save($param)
    {
        $statement = "INSERT INTO client (nom, username, role, password, apiKey)
                        VALUES (:nom, :username, :role, :password, :apiKey)";

        $param['nom'] = htmlspecialchars($param['nom']);
        $param["username"] = htmlspecialchars($param["username"]);
        $param["password"] = password_hash($param["password"], PASSWORD_DEFAULT);
        $param["role"] = "Banque";
        $param["apiKey"] = md5(uniqid());

        $this->db->prepare($statement, 'save', $param);
    }

    /**
     * Connecter un client
     * 
     * @param array $param
     * @return void
     */
    public function connexion($param)
    {
        $statement = "SELECT * FROM client WHERE username='" . $param["username"] . "'";
        $user = $this->db->queryReturn($statement, true);
        if (password_verify($param["password"], $user->password)) {
            setcookie("apiKey", $user->apiKey);
            $this->app->sendData("connexion réussie", true, $user->apiKey);
        }
    }
    /**
     * @OA\Get(
     *      path="/",
     *      @OA\Parameter(
     *          name="page",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="id",
     *          in="query",
     *          required=false,
     *          @OA\Schema(
     *              type="int"
     *          )
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Récupération des clients",
     *          @OA\JsonContent(
     *              type="array",
     *              description="",
     *              @OA\Items(ref="#/components/schemas/Client")
     *          )
     *      ),
     *      @OA\Response(
     *          response="404",
     *          description="Erreur 404",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Erreur lors de la récupération des clients"
     *              )
     *          ),
     *      )
     * )
     */

    /**
     * @OA\Post(
     *      path="/",
     *      @OA\Parameter(
     *          name="page",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Sauvegarde ok",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Données sauvegardées"
     *              )
     *          )
     *      ),
     *      @OA\RequestBody(
     *          request="save",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="nom",
     *                  type="string",
     *                  example="nom"
     *              ),
     *              @OA\Property(
     *                  property="username",
     *                  type="string",
     *                  example="username"
     *              ),
     *              @OA\Property(
     *                  property="password",
     *                  type="string",
     *                  example="password"
     *              ),
     *              required={"nom", "username", "password"}
     *          )
     *      )
     * )
     */

    /**
     * @OA\Put(
     *      path="/",
     *      @OA\Parameter(
     *          name="page",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="id",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="int"
     *          )
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Modification des clients",
     *          @OA\JsonContent(
     *              type="array",
     *              description="",
     *              @OA\Items(ref="#/components/schemas/Client")
     *          )
     *      ),
     *      @OA\Response(
     *          response="404",
     *          description="Erreur 404",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Erreur lors de la modification des clients"
     *              )
     *          ),
     *      )
     * )
     */
}

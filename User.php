<?php

require "General.php";

use OpenApi\Annotations as OA;

use Firebase\JWT\JWT;

class User extends General
{

    protected $table = "user";

    /**
     * Accéder à tous les clients 
     *
     * @return void
     */
    public function getAll()
    {
        $this->db->query("SELECT id, nom, prenom, email FROM $this->table");
    }

    /**
     * Accéder à un client
     * 
     * @param int $id
     * @return void
     */
    public function getOne($id)
    {
        $this->db->query("SELECT id, nom, prenom, email FROM $this->table WHERE id=$id", true);
    }

    /**
     * Sauvegarder un client
     * 
     * @param array $param
     * @return void
     */
    public function save($param)
    {
        $statement = "INSERT INTO user (nom, prenom, email, password)
                        VALUES (:nom, :prenom, :email, :password)";

        $param["nom"] = htmlspecialchars($param["nom"]);
        $param["prenom"] = htmlspecialchars($param["prenom"]);
        $param["email"] = htmlspecialchars($param["email"]);
        $param["password"] = password_hash($param["password"], PASSWORD_DEFAULT);

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
        $statement = "SELECT * FROM user WHERE email='" . $param["email"] . "'";
        $user = $this->db->queryReturn($statement, true);
        if (password_verify($param["password"], $user->password)) {
            $key = "apirest";
            $payload = array(
                "exp" => time() + (20 * 60),
                "email" => $user->email,
                "id" => $user->id,
                "prenom" => $user->prenom,
                "nom" => $user->nom
            );

            $jwt = JWT::encode($payload, $key);
            setcookie("token", $jwt);
            $this->app->sendData("connexion réussie", true, $jwt);
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
     *          description="Récupération des utilisateurs",
     *          @OA\JsonContent(
     *              type="array",
     *              description="",
     *              @OA\Items(ref="#/components/schemas/User")
     *          )
     *      ),
     *      @OA\Response(
     *          response="404",
     *          description="Erreur 404",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Erreur lors de la récupération des utilisateurs"
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
     *                  property="prenom",
     *                  type="string",
     *                  example="prenom"
     *              ),
     *              @OA\Property(
     *                  property="email",
     *                  type="string",
     *                  example="email"
     *              ),
     *              @OA\Property(
     *                  property="password",
     *                  type="string",
     *                  example="password"
     *              ),
     *              required={"nom", "prenom", "email", "password"}
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
     *          description="Modification des utilisateurs",
     *          @OA\JsonContent(
     *              type="array",
     *              description="",
     *              @OA\Items(ref="#/components/schemas/User")
     *          )
     *      ),
     *      @OA\Response(
     *          response="404",
     *          description="Erreur 404",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Erreur lors de la modification des utilisateurs"
     *              )
     *          ),
     *      )
     * )
     */
}

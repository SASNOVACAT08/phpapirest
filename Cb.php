<?php

require "General.php";

use OpenApi\Annotations as OA;

class Cb extends General
{
    protected $table = "cb";
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
     *          description="Récupération des cbs",
     *          @OA\JsonContent(
     *              type="array",
     *              description="",
     *              @OA\Items(ref="#/components/schemas/Cb")
     *          )
     *      ),
     *      @OA\Response(
     *          response="404",
     *          description="Erreur 404",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Erreur lors de la récupération des cbs"
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
     *                  property="uuid",
     *                  type="int",
     *                  example="UUID"
     *              ),
     *              @OA\Property(
     *                  property="exp",
     *                  type="string",
     *                  example="exp"
     *              ),
     *              @OA\Property(
     *                  property="cryptogramme",
     *                  type="string",
     *                  example="cryptogramme"
     *              ),
     *              @OA\Property(
     *                  property="code",
     *                  type="int",
     *                  example="code"
     *              ),
     *              @OA\Property(
     *                  property="active",
     *                  type="boolean",
     *                  example="active"
     *              ),
     *              @OA\Property(
     *                  property="user_id",
     *                  type="string",
     *                  example="user_id"
     *              ),
     *              @OA\Property(
     *                  property="compte_id",
     *                  type="string",
     *                  example="compte_id"
     *              ),
     *              required={"uuid", "exp", "cryptogramme", "code", "active", "user_id", "compte_id"}
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
     *          description="Modification des cbs",
     *          @OA\JsonContent(
     *              type="array",
     *              description="",
     *              @OA\Items(ref="#/components/schemas/Cb")
     *          )
     *      ),
     *      @OA\Response(
     *          response="404",
     *          description="Erreur 404",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Erreur lors de la modification des cbs"
     *              )
     *          ),
     *      )
     * )
     */
}

<?php

require "General.php";

use OpenApi\Annotations as OA;

class Compte extends General
{
    protected $table = "compte";
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
     *          description="Récupération des comptes",
     *          @OA\JsonContent(
     *              type="array",
     *              description="",
     *              @OA\Items(ref="#/components/schemas/Compte")
     *          )
     *      ),
     *      @OA\Response(
     *          response="404",
     *          description="Erreur 404",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Erreur lors de la récupération des comptes"
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
     *                  property="fonds",
     *                  type="int",
     *                  example="fonds"
     *              ),
     *              @OA\Property(
     *                  property="type",
     *                  type="string",
     *                  example="type"
     *              ),
     *              @OA\Property(
     *                  property="actif",
     *                  type="boolean",
     *                  example="actif"
     *              ),
     *              @OA\Property(
     *                  property="user_id",
     *                  type="int",
     *                  example="user_id"
     *              ),
     *              required={"fonds", "type", "actif", "user_id"}
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
     *          description="Modification des comptes",
     *          @OA\JsonContent(
     *              type="array",
     *              description="",
     *              @OA\Items(ref="#/components/schemas/Compte")
     *          )
     *      ),
     *      @OA\Response(
     *          response="404",
     *          description="Erreur 404",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Erreur lors de la modification des comptes"
     *              )
     *          ),
     *      )
     * )
     */
}

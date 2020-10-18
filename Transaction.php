<?php

require "General.php";

use OpenApi\Annotations as OA;

class Transaction extends General
{
    protected $table = "transaction";
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
     *              @OA\Items(ref="#/components/schemas/Transaction")
     *          )
     *      ),
     *      @OA\Response(
     *          response="404",
     *          description="Erreur 404",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Erreur lors de la récupération des transactions"
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
     *                  property="date",
     *                  type="datetime",
     *                  example="date"
     *              ),
     *              @OA\Property(
     *                  property="montant",
     *                  type="int",
     *                  example="montant"
     *              ),
     *              @OA\Property(
     *                  property="valide",
     *                  type="boolean",
     *                  example="valide"
     *              ),
     *              @OA\Property(
     *                  property="moyenPaiement",
     *                  type="string",
     *                  example="moyenPaiement"
     *              ),
     *              @OA\Property(
     *                  property="compte_id",
     *                  type="int",
     *                  example="compte_id"
     *              ),
     *              required={"date", "montant", "valide", "moyenPaiement", "compte_id"}
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
     *          description="Modification des transactions",
     *          @OA\JsonContent(
     *              type="array",
     *              description="",
     *              @OA\Items(ref="#/components/schemas/Transaction")
     *          )
     *      ),
     *      @OA\Response(
     *          response="404",
     *          description="Erreur 404",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="message",
     *                  type="string",
     *                  example="Erreur lors de la modification des transactions"
     *              )
     *          ),
     *      )
     * )
     */
}

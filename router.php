<?php

//S'il n'y pas de role
if ($role == "") {
    switch ($_SERVER["REQUEST_METHOD"]) {
        case 'POST':
            //On peut inscrire un client ou se connecter
            if ($page == "Client") {
                if ($method === "connexion") {
                    $class->connexion($_POST);
                } else {
                    $class->save($_POST);
                }
            }
            break;

        default:
            $app->sendData("Vous n'avez pas l'autorisation. Connectez-vous");
    }
    //S'il y a role
} else {
    switch ($_SERVER["REQUEST_METHOD"]) {
        case 'GET':
            //On récupere les données de la page choisie
            if (key_exists("id", $_GET)) {
                if (intval($_GET["id"])) {
                    $class->getOne($_GET["id"]);
                } else {
                    $app->sendData("Merci de rentrer un id valide");
                }
            } else {
                $class->getAll();
            }
            break;

        case 'POST':
            //On sauvegarde les données de la page choisie
            if ($role == "Banque") {
                if ($page == "User") {
                    if ($method === "connexion") {
                        $class->connexion($_POST);
                    } else {
                        $class->save($_POST);
                    }
                } else {
                    $class->save($_POST);
                }
            } else {
                $app->sendData("Vous n'avez pas l'autorisation.");
            }
            break;

        case 'PUT':
            if ($role == "Banque") {
                if ($page == "User" || $page == "Cb" || $page == "Compte") {
                    if (key_exists("id", $_GET)) {
                        $class->put($_GET['id'], file_get_contents("php://input"));
                    } else {
                        $app->sendData("Merci de rentrer un id");
                    }
                } else {
                    $app->sendData("Vous n'avez pas l'autorisation.");
                }
            } else {
                $app->sendData("Vous n'avez pas l'autorisation.");
            }
            break;
        default:
            $app->sendData("Erreur de méthode de requête");
            break;
    }
}

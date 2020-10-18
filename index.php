<?php

use Firebase\JWT\JWT;

require "vendor/autoload.php";

require 'App.php';
$app = new App();

$method = false;

//On regarde s'il y method
if (key_exists("method", $_GET)) {
    $method = $_GET["method"];
}

if (key_exists("page", $_GET)) {
    $page = ucfirst($_GET["page"]);

    //On récupere la page en fonction de $_GET['page']
    if (file_exists($page . ".php")) {
        require $page . ".php";
        $class = new $page();

        //On récupere le role si le cookie est présent
        $role = "";
        if (key_exists("apiKey", $_COOKIE)) {
            $role = $class->getRole($_COOKIE["apiKey"]);
        }

        //On récupere le token si le cookie est présent
        $token = "";
        if (key_exists("token", $_COOKIE)) {
            $token = $_COOKIE["token"];
            $decoded = JWT::decode($token, "apirest", array('HS256'));
            if ($decoded->exp > time()) {
                var_dump($decoded);
            }
        }
        require 'router.php';
    } else {
        $app->sendData("Erreur de choix de table");
    }
} else {
    $app->sendData("Erreur de choix de table");
}

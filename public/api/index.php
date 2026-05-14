<?php
require __DIR__ . '/../../../vendor/autoload.php';

require_once __DIR__ . "/../../app/utils/Utils.php";
require_once __DIR__ . "/../../app/controllers/AuthController.php";

use Firebase\JWT\JWT;   
use Firebase\JWT\key;
// 1. Configuração

header("Content-Type: application/json; charset=UTF-8");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace("/api", "", $uri);

$method = $_SERVER['REQUEST_METHOD'];

// 2. Rotas

if (($uri === "/" || $uri === "/index") && $method === "GET") {

    $dataResponse = [
        "success" => false,
        "message" => "id e nome são obrigatórios"
    ];

    Utils::jsonResponse($dataResponse, 200);
    exit;

} elseif ($uri === "/create" && $method === "POST") {

    (new AuthController())->loginApi();
    exit;
}

// 3. Rota não encontrada

$dataResponse = [
    "success" => false,
    "message" => "Rota nao encontrada",
    "data" => []
];

Utils::jsonResponse($dataResponse, 404);

// 4. Template de resposta

/*
$dataResponse = [
    "success" => true,
    "message" => "Operação realizada com sucesso",
    "data" => []
];

Utils::jsonResponse($dataResponse);
*/

?>
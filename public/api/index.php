<?php
require_once '../../app/utils/Utils.php';

// 1. Configuração 1
header("Content-Type: application/json; charset=UTF-8");

// 2. Template de resposta
$dataResponse= [
    'success' => true,
    'message' => 'Operação realizada com sucesso',
    'data' => []
];

//jsonResponse
Utils::jsonResponse($dataResponse);

// 3. Configuração codigo da resposta
echo json_encode($dataResponse, JSON_UNESCAPED_UNICODE);

exit();
?>
<?php
class Utils{
    public static function jsonResponse($dataResponse,$code = 200){
        // 3. Configuração codigo da resposta
       http_response_code($code);
        echo json_encode($dataResponse, JSON_UNESCAPED_UNICODE);
        exit;
    }
}

<?php

$_esquema = $_SERVER['REQUESTSCHEME']; //http o https
$_ubicacion = $_SERVER['HTTP_HOST'];//host
$_metodo = $_SERVER['REQUEST_METHOD']; //get, post, put, patch, delete
$_path = $_SERVER['REQUEST_URI'];// lo que esta despues del host
$_partes = explode('/', $_path);
$_version = $_ubicacion =='localhost' ? $_partes[2] : null;
$_mantenedor = $_ubicacion == ''? $_partes[3] : null;
$_parametros = [];
$_parametros = $_ubicacion == 'localhost' ? $_partes[4] : null;

if(strlen($_parametros)>0){
    $_parametros = explode('?', $_parametros)[1];
    $_parametros = explode('&', $_parametros);
}else{
    $_parametros = [];
}

header("Access-Control-Allow-Origin: *");//restriccion de acceso
header("Access-Control-Allow-Methods: GET, POST, PUT, PATH, DELETE");
header("Conten-Type: aplication/json; charset=UF-8");

//Authorization Beares
$_header = null;
try {
    $header = isset(getallheaders()['Authorization']) ? getallheaders()['Authorization'] : null;
    if($_header === null){
        throw new Exception('No tiene autorización');
    }
} catch (\Exception $e) {
    http_response_code(401);
    echo json_encode(['error' => $e->getMessage()]);

}

//Tokens
$_token_get = 'Bearer get';
$_token_post = 'Bearer post';   
$_token_put = 'Bearer put';
$_token_patch = 'Bearer patch';
$_token_delete = 'Bearer delete';

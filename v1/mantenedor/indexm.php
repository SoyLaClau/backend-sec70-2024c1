<?php 
include_once '../version1.php';


//echo'wena';

//parametros 
$existeID = false;
$valorID = 0;

if(count($_parametros)>0){
    foreach($_parametros as $p){
        if(strpos($p, 'id') !== false){
            $existeID  = true;
            $valorID = explode('=', $p)[1];

        }
}

}

if($version =='v1'){
    if($_mantenedor == 'mantenedor'){
        switch ($_metodo){
            case 'GET':
                if($_header == $token_get){
                   /* include_once 'controller.php';
                    include_once '../conexion.php';
                    $control = new Controlador();
                    $lista = $control->getAll();
                    http_response_code(200);
                    echo json_encode(['data' => $lista]);*/
                  
                    $retorno = [
                        [
                            "id" => 0,
                            "nombre"=> 'Wena1',
                            "activo"=> true

                        ],
                        [
                            "id" => 0,
                            "nombre"=> 'Wena2',
                            "activo"=> true

                        ],
                        [
                            "id" => 0,
                            "nombre"=> 'Wena3',
                            "activo"=> false

                        ],


                    ];

                    http_response_code(200);
                    echo json_encode(['data' => $retorno]);

              }else{
                http_response_code(401);
                echo json_encode(['error' => 'no tiene autorizacion']);
              }
                break;
            default:
                break;
        }
    }



}
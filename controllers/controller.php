<?php
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/dbclass.php';
include_once '../models/corretores.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$corretores = new Corretores($connection);

$method = $_SERVER['REQUEST_METHOD'];

if($method === 'GET'){
    $stmt = $corretores->read();
    $count = $stmt->rowCount();

    if($count > 0){


        $corretores = array();
        $corretores["body"] = array();
        $corretores["count"] = $count;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            extract($row);

            $p  = array(
                "id" => $id,
                "nome" => $nome,
                "tipo_seg" => $tipo_seg,
                "estado" => $estado,
                "empresa" => $empresa,
                "numero" => $numero,
                "email" => $email,
            );

            array_push($corretores["body"], $p);
        }

        echo json_encode($corretores);
    }

    else {

        echo json_encode(
            array("body" => array(), "count" => 0)
        );

    }
}
    else{
        if($method === 'POST'){
            $data = json_decode(file_get_contents("php://input"));

            $corretores->nome = $data->nome;
            $corretores->tipo_seg = $data->tipo_seg;
            $corretores->estado = $data->estado;
            $corretores->empresa = $data->empresa;
            $corretores->numero = $data->numero;
            $corretores->email = $data->email;

            if($corretores->create($corretores->nome, $corretores->tipo_seg, $corretores->estado, $corretores->empresa, $corretores->numero,
                $corretores->email)){
                echo '{';
                    echo '"message": "Novo corretor criado!."';
                echo '}';
            }
            else{
                echo '{';
                    echo '"message": "Não foi possível criar um novo corretor..."';
                echo '}';
            }
        }

        else {
            echo 'Requisição falha. Verifique se o método é GET ou POST.';
        }
    }
?>
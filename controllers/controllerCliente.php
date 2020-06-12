<?php
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/dbclass.php';
include_once '../models/clientes.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$clientes = new Clientes($connection);

$method = $_SERVER['REQUEST_METHOD'];

if($method === 'GET'){
    $stmt = $clientes->read();
    $count = $stmt->rowCount();

    if($count > 0){


        $clientes = array();
        $clientes["body"] = array();
        $clientes["count"] = $count;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            extract($row);

            $p  = array(
                "id" => $id,
                "name" => $name,
                "cpf" => $cpf,
                "email" => $email
            ); 

            array_push($clientes["body"], $p);
        }

        echo json_encode($clientes);
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

            $clientes->name = $data->name;
            $clientes->cpf = $data->cpf;
            $clientes->email = $data->email;
           
            if($clientes->create($clientes->name, $clientes->cpf, $clientes->email)){
                echo '{';
                    echo '"message": "Novo cliente criado!."';
                echo '}';
            }
            else{
                echo '{';
                    echo '"message": "Não foi possível criar um novo cliente..."';
                echo '}';
            }
        }

        else {
            echo 'Requisição falha. Verifique se o método é GET ou POST.';
        }
    }
?>
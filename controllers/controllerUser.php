<?php
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/dbclass.php';
include_once '../models/users.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$users = new Users($connection);

$method = $_SERVER['REQUEST_METHOD'];

if($method === 'GET'){
    $stmt = $users->read();
    $count = $stmt->rowCount();

    if($count > 0){


        $users = array();
        $users["body"] = array();
        $users["count"] = $count;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            extract($row);

            $p  = array(
                "id" => $id,
                "name" => $name,
                "email" => $email,
                "password" => $password
            ); 

            array_push($users["body"], $p);
        }

        echo json_encode($users);
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

            $users->name = $data->name;
            $users->email = $data->email;
            $users->password = $data->password;

            if($users->create($users->name, $users->email, $users->password)){
                echo '{';
                    echo '"message": "Novo usuário criado!."';
                echo '}';
            }
            else{
                echo '{';
                    echo '"message": "Não foi possível criar um novo usuário..."';
                echo '}';
            }
        }

        else {
            echo 'Requisição falha. Verifique se o método é GET ou POST.';
        }
    }
?>
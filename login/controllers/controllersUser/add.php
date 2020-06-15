<?php

require_once './../../../init.php';

// pega os dados do formuário
$name = isset($_POST['name']) ? $_POST['name'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

if (empty($name) || empty($email)) {
    echo "Volte e preencha todos os campos";
    exit;
}

// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO users(name, email, password) VALUES(:name, :email, :password)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);

if ($stmt->execute()) {
    header('Location: ./../../../index.php');
} else {
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}

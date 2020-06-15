<?php

require_once './../../../init.php';

// recebe dados do formulário
$name = isset($_POST['name']) ? $_POST['name'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;

if (empty($name) || empty($email)) {
    echo "Volte e preencha todos os campos";
    exit;
}

// atualiza o dado no banco
$PDO = db_connect();
$sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

if ($stmt->execute()) {
    header('Location: /login/views/viewsUser/listaCadastros.php');
} else {
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}

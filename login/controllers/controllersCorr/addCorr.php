<?php

require_once './../../../init.php';

// recebe dados do formuário
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$tipo_seg = isset($_POST['tipo_seg']) ? $_POST['tipo_seg'] : null;
$estado = isset($_POST['estado']) ? $_POST['estado'] : null;
$empresa = isset($_POST['empresa']) ? $_POST['empresa'] : null;
$numero = isset($_POST['numero']) ? $_POST['numero'] : null;

if (empty($nome) || empty($email) || empty($tipo_seg) || empty($estado) || empty($empresa) || empty($numero)) {
    echo "Volte e preencha todos os campos";
    exit;
}

// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO corretores(nome, email, tipo_seg, estado, empresa, numero) VALUES(:nome, :email, :tipo_seg, :estado, :empresa, :numero)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':tipo_seg', $tipo_seg);
$stmt->bindParam(':estado', $estado);
$stmt->bindParam(':empresa', $empresa);
$stmt->bindParam(':numero', $numero);

if ($stmt->execute()) {
    header('Location: ./../../../index.php');
} else {
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}

<?php

require_once './../../../init.php';

// recebe dados do formulário
$id = isset($_POST['id']) ? $_POST['id'] : null;
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

// atualiza o dado no banco
$PDO = db_connect();
$sql = "UPDATE corretores SET nome = :nome, email = :email, tipo_seg =:tipo_seg, estado= :estado, empresa= :empresa, numero= :numero WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':tipo_seg', $tipo_seg);
$stmt->bindParam(':estado', $estado);
$stmt->bindParam(':empresa', $empresa);
$stmt->bindParam(':numero', $numero);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

if ($stmt->execute()) {
    header('Location: /login/views/viewsCorr/listaCorretores.php');
} else {
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}

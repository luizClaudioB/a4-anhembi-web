<?php
require './../../../init.php';
session_start();

// pega o ID
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

// valida o ID
if (empty($id)) {
    echo "ID para alteração não definido";
    exit;
}

// pega os dados
$PDO = db_connect();
$sql = "SELECT nome, email, tipo_seg, estado, empresa, numero FROM corretores where id = $id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!is_array($user)) {
    echo "Nenhum corretor encontrado";
    exit;
}

?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">

    <title>Edição de Corretor</title>
</head>

<body>
    <?php if (isLoggedIn()) : ?>

        <a href="/login/views/viewsCorr/listaCorretores.php">voltar</a>
        <h1>Sistema de Cadastro</h1>

        <h2>Edição de Corretor</h2>

        <form action="/login/controllers/controllersCorr/editCorr.php" method="post">
            <label for="nome">Nome: </label>
            <br>
            <input type="text" name="nome" id="nome" value="<?php echo $user['nome'] ?>">

            <br><br>

            <label for="email">Email: </label>
            <br>
            <input type="text" name="email" id="email" value="<?php echo $user['email'] ?>">

            <br><br>

            <label for="tipo_seg">tipo seguro: </label>
            <br>
            <input type="text" name="tipo_seg" id="tipo_seg" value="<?php echo $user['tipo_seg'] ?>">

            <br><br>

            <label for="estado">estado: </label>
            <br>
            <input type="text" name="estado" id="estado" value="<?php echo $user['estado'] ?>">

            <br><br>

            <label for="empresa">empresa: </label>
            <br>
            <input type="text" name="empresa" id="empresa" value="<?php echo $user['empresa'] ?>">

            <br><br>

            <label for="numero">numero: </label>
            <br>
            <input type="text" name="numero" id="numero" value="<?php echo $user['numero'] ?>">

            <br><br>

            <input type="hidden" name="id" value="<?php echo $id ?>">

            <input type="submit" value="Alterar">
        </form>
        
    <?php else : ?>
        <p>Você não possui acesso a essa página, faça <a href="./../../../index.php">login</a> para continuar</p>
    <?php endif ?>
</body>

</html>
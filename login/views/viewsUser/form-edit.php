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
$sql = "SELECT name, email FROM users WHERE id = $id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!is_array($user)) {
    echo "Nenhum usuário encontrado";
    exit;
}

?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Edição de Usuário</title>
</head>

<body>
    <?php if (isLoggedIn()) : ?>

        <a href="/login/views/viewsUser/listaCadastros.php">voltar</a>
        <h1>Sistema de Cadastro</h1>

        <h2>Edição de Usuário</h2>

        <form action="/login/controllers/controllersUser/edit.php" method="post">
            <label for="name">Nome: </label>
            <br>
            <input type="text" name="name" id="name" value="<?php echo $user['name'] ?>">

            <br><br>

            <label for="email">Email: </label>
            <br>
            <input type="text" name="email" id="email" value="<?php echo $user['email'] ?>">

            <br><br>

            <input type="hidden" name="id" value="<?php echo $id ?>">

            <input type="submit" value="Alterar">
        </form>
        
    <?php else : ?>
        <p>Você não possui acesso a essa página, faça <a href="./../../../index.php">login</a> para continuar</p>
    <?php endif ?>
</body>

</html>
<?php
require './../../../init.php';
session_start();
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">

    <title>Cadastro de Usuários Admin</title>
</head>

<body>
    <header style="margin-right: 5%; display: flex; flex-direction: row; justify-content: center; align-items: center">

        <div>
            <h1>Admin Só Seguros</h1>
        </div>

        <?php if (isLoggedIn()) : ?>

            <div style="margin-top:16px ;margin-left:600px">
                <p>Olá, <?php echo $_SESSION['user_name']; ?>. <a href="./../../../logout.php">Sair</a></p>
            </div>

        <?php endif; ?>

    </header>

    <a href="./../../../index.php">voltar</a>

    <h2>Cadastro de Usuário</h2>

    <form action="/login/controllers/controllersUser/add.php" method="post">
        <label for="name">Nome: </label>
        <br>
        <input type="text" name="name" id="name">

        <br><br>

        <label for="email">Email: </label>
        <br>
        <input type="text" name="email" id="email">

        <br><br>

        <label for="password">Password: </label>
        <br>
        <input type="text" name="password" id="password">

        <input type="submit" value="Cadastrar">
    </form>

</body>

</html>
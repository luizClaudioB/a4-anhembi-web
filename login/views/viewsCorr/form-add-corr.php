<?php
require './../../../init.php';
session_start();
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">

    <title>Cadastro de Corretores Admin</title>
</head>

<body>
    <?php if (isLoggedIn()) : ?>

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

        <h2>Cadastro de Corretores</h2>

        <form action="/login/controllers/controllersCorr/addCorr.php" method="post">
            <label for="nome">Nome: </label>
            <br>
            <input type="text" name="nome" id="nome">

            <br><br>

            <label for="email">Email: </label>
            <br>
            <input type="text" name="email" id="email">

            <br><br>

            <label for="password">Tipo de seguro: </label>
            <br>
            <input type="text" name="tipo_seg" id="tipo_seg">

            <br><br>

            <label for="estado">Estado: </label>
            <br>
            <input type="text" name="estado" id="estado">

            <br><br>

            <label for="password">empresa: </label>
            <br>
            <input type="text" name="empresa" id="empresa">

            <br><br>

            <label for="password">numero: </label>
            <br>
            <input type="text" name="numero" id="numero">

            <input type="submit" value="Cadastrar">
        </form>
        
    <?php else : ?>
        <p>Você não possui acesso a essa página, faça <a href="./../../../index.php">login</a> para continuar</p>
    <?php endif ?>
</body>

</html>
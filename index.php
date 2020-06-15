<?php
session_start();

require 'init.php';
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">

    <title>Admin Só Seguros</title>
</head>

<body>
    <header style="margin-right: 5%; display: flex; flex-direction: row; justify-content: center; align-items: center">

        <div style="margin-right: 2%">
            <h1>Admin Só Seguros</h1>
        </div>

        <?php if (isLoggedIn()) : ?>

            <div>
                <p>Olá, <?php echo $_SESSION['user_name']; ?>. <a href="logout.php">Sair</a></p>
            </div>

        <?php else : ?>

            <div>
                <p>Olá, visitante</p>
            </div>

        <?php endif; ?>

    </header>

    <?php if (isLoggedIn()) : ?>
    <div>
        <div style="display: flex; flex-direction: row; justify-content: center; margin-top: 5%">
            <a href="/login/views/viewsUser/listaCadastros.php" style="font-size:25px; margin-right: 2%">Lista Usuários</a>

            <br>
            <br>

            <a href="/login/views/viewsUser/form-add.php" style="font-size:25px; margin-right: 2%">Cadastrar Usuário</a>

            <br>
            <br>

            <a href="/login/views/viewsCorr/listaCorretores.php" style="font-size:25px; margin-right: 2%">Lista Corretores</a>

            <br>
            <br>

            <a href="/login/views/viewsCorr/form-add-corr.php" style="font-size:25px; margin-right: 2%">Cadastrar Corretor</a>

            <br>
            <br>
        </div>
    </div>

    <?php else : ?>
        <div style="display: flex; flex-direction: column; justify-content: center; margin-top: 5%; margin-left: 42%"> 
        <a href="/login/views/viewsUser/form-add.php">Cadastro</a>

        <h1> Login</h1>

        <form action="login.php" method="post">
            
            <label for="email">Email: </label>
            <br>
            <input type="text" name="email" id="email">

            <br><br>


            <label for="password">Senha: </label>
            <br>
            <input type="password" name="password" id="password">

            <br><br>

            <input type="submit" value="Entrar">
        </form>
        </div>

    <?php endif; ?>

</body>

</html>
<?php
require_once './../../../init.php';
session_start();

// abre a conexão
$PDO = db_connect();

// conta o total de registros
$sql_count = "SELECT COUNT(*) AS total FROM users ORDER BY name ASC";

// seleciona os registros
$sql = "SELECT id, name, email FROM users ORDER BY name ASC";

$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

$stmt = $PDO->prepare($sql);
$stmt->execute();
?>

<!doctype html>
<html style="background-color: #E6A800; display: flex; flex-direction: column; justify-content: center">

<head>
    <meta charset="utf-8">

    <title>Admin Só Seguros</title>
</head>

<body>

    <?php if (isLoggedIn()) : ?>

        <header style=" display:flex">

            <div>
                <h1>Admin Só Seguros</h1>
            </div>

            <div style="margin-top:16px ;margin-left:600px">
                <p>Olá, <?php echo $_SESSION['user_name']; ?>. <a href="./../../../logout.php">Sair</a></p>
            </div>

        </header>

        <a href="./../../../index.php">voltar</a>

        <p><a href="/login/views/viewsUser/form-add.php">Adicionar Novo Usuário</a></p>

        <h2>Lista de Usuários</h2>

        <p>Total de usuários: <?php echo $total ?></p>

        <?php if ($total > 0) : ?>

            <table width="50%" border="1">
                
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>funções</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                        <tr>
                            <td><?php echo $user['name'] ?></td>
                            <td><?php echo $user['email'] ?></td>
                            <td>
                                <a href="/login/views/viewsUser/form-edit.php?id=<?php echo $user['id'] ?>">Editar</a>
                                <a href="/login/controllers/controllersUser/delete.php?id=<?php echo $user['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>

            </table>

        <?php else : ?>

            <p>Nenhum usuário registrado</p>

        <?php endif; ?>

    <?php else : ?>
        <p>Você não possui acesso a essa página, faça <a href="./../../../index.php">login</a> para continuar</p>
    <?php endif ?>
</body>

</html>
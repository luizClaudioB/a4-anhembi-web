<?php
require_once './../../../init.php';
session_start();

// abre a conexão
$PDO = db_connect();

// conta o total de registros
$sql_count = "SELECT COUNT(*) AS total FROM corretores ORDER BY nome ASC";

// seleciona os registros
$sql = "SELECT id, nome, email, tipo_seg, estado, empresa, numero FROM corretores ORDER BY nome ASC";

$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

$stmt = $PDO->prepare($sql);
$stmt->execute();
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">

    <title>Admin Só Seguros</title>
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

        <p><a href="/login/views/viewsCorr/form-add-corr.php">Adicionar Novo Corretor</a></p>

        <h2>Lista de Corretores</h2>

        <p>Total de Corretores: <?php echo $total ?></p>

        <?php if ($total > 0) : ?>

            <table width="50%" border="1">

                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>tipo seguro</th>
                        <th>estado</th>
                        <th>empresa</th>
                        <th>numero</th>
                        <th>funções</th>
                    </tr>
                </thead>

                <tbody>

                    <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                        <tr>
                            <td><?php echo $user['nome'] ?></td>
                            <td><?php echo $user['email'] ?></td>
                            <td><?php echo $user['tipo_seg'] ?></td>
                            <td><?php echo $user['estado'] ?></td>
                            <td><?php echo $user['empresa'] ?></td>
                            <td><?php echo $user['numero'] ?></td>



                            <td>
                                <a href="/login/views/viewsCorr/form-edit-corr.php?id=<?php echo $user['id'] ?>">Editar</a>
                                <a href="/login/controllers/controllersCorr/deleteCorr.php?id=<?php echo $user['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>
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
<?php
require 'init.php';

// recebe dados do formulário Login
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if (empty($email) || empty($password)) {
    echo "Informe email e senha";
    exit;
}

$PDO = db_connect();

$sql = "SELECT id, name FROM users where email = '$email' and password ='$password'";
$stmt = $PDO->prepare($sql);


$stmt->execute();

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($users) <= 0) {
    echo "Email ou senha incorretos, Revise seus dados e tente novamente";
    exit;
}

$user = $users[0];

session_start();
$_SESSION['logged_in'] = true;
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['name'];

header('Location: index.php');

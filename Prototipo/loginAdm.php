<?php
SESSION_start();
include('conexao.php');

if (empty($_POST['login_adm']) || empty($_POST['senha_adm'])) {
    header("location: acessosistema.php");
    exit();
}

$usuario_adm = mysqli_real_escape_string(conexao(), $_POST['login_adm']);
$senha_adm = mysqli_real_escape_string(conexao(), ($_POST['senha_adm']));

$query = "select * from administrador where nome_adm ='{$usuario_adm}' and senha_adm = '{$senha_adm}'";

$result = mysqli_query(conexao(), $query);

$row = mysqli_num_rows($result);

$error = "Login ou Senha incorretos";

if ($row > 0) {
    $_SESSION['login_adm'] = $usuario_adm;
    $_SESSION['senha_adm'] = $senha_adm;
    header('Location: indexAdm.php');
    exit();
} else {
    $_SESSION["invalido"] = $error;
    header("location: acessosistema.php");
}

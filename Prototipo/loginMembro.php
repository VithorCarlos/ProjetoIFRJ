<?php
SESSION_start();
include('conexao.php');

if (empty($_POST['login_membro']) || empty($_POST['senha_membro'])) {
    header("location: acessosistema.php");
    exit();
}

$usuario_membro = mysqli_real_escape_string(conexao(), $_POST['login_membro']);
$senha_membro = mysqli_real_escape_string(conexao(), ($_POST['senha_membro']));

$query = "select * from membro where nome_membro ='{$usuario_membro}' and senha_membro = '{$senha_membro}'";

$result = mysqli_query(conexao(), $query);

$row = mysqli_num_rows($result);

$error = "Usuario ou Senha incorretos";

if ($row > 0) {
    $_SESSION['login_membro'] = $usuario_membro;
    $_SESSION['senha_membro'] = $senha_membro;
    header('Location: indexMembro.php');
    exit();
} else {
    $_SESSION["invalido"] = $error;
    header("location: acessosistema.php");
}

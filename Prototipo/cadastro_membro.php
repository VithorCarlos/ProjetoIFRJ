<?php
require 'funcoes.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $membro = $_POST['nome_membro'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $descricao = $_POST['desc_pedido'];

    if (insert($membro, $email, $telefone, $descricao)) {
        header('location: index.html');
    } else {
        echo "Não foi possível realizar o cadastro";
        die;
    }
}

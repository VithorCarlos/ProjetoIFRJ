<?php
require 'conexao.php';

function insert($membro, $email, $telefone, $descricao)
{
    $link = conexao();

    $query = "insert into pedido_oracao (nome_pedido, email_pedido, telefone_pedido, desc_pedido)
         values ('{$membro}', ('{$email}'), ('{$telefone}'), '{$descricao}')";
         
    mysqli_query($link, $query);

    return true;

    mysqli_close($link);
}

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

function ListarPedidos()
{
    $link = conexao();

    $query = "select * from pedido_oracao";

    $result = mysqli_query($link, $query);

    $viewGeral = array();

    while ($registro = mysqli_fetch_assoc($result)) {
        array_push($viewGeral, $registro);
    }

    if (!$link) {
        mysqli_close($link);
    } else {
        return $viewGeral;
    }
}

function ListarMembros()
{
    $link = conexao();

    $query = "select * from membro";

    $result = mysqli_query($link, $query);

    $viewGeral = array();

    while ($registro = mysqli_fetch_assoc($result)) {
        array_push($viewGeral, $registro);
    }

    if (!$link) {
        mysqli_close($link);
    } else {
        return $viewGeral;
    }
}


function apagar($cod_pedido) {
    $link = conexao();
    $query = "delete from pedido_oracao where cod_pedido = '{$cod_pedido}'";
    return mysqli_query($link, $query);
}   

function banirMembro($cod_membro) {
    $link = conexao();
    $query = "delete from membro where cod_membro = '{$cod_membro}'";
    return mysqli_query($link, $query);
}   
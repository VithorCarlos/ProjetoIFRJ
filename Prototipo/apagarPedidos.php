<?php
require 'funcoes.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $cod_pedido = $_GET['cod_pedido'];

    if (apagar($cod_pedido)) {
        header('Location: index.html');
        exit;
    } else {
        echo "erro ao apagar";
    }
}

<?php
require 'funcoes.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $cod_membro = $_GET['cod_membro'];

    if (banirMembro($cod_membro)) {
        header('Location: visualizarMembros.php');
        exit;
    } else {
        echo "erro ao banir";
    }
}

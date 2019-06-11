<?php
define("SERVER", "localhost");
define("USER", "root");
define("PASS", "");
define("DB", "sibpp");
define("PORT", 3306);

function conexao()
{
    $link = mysqli_connect(SERVER, USER, PASS, DB, PORT);
    mysqli_set_charset($link, "utf8");
    return $link;
}
if (!conexao()) {
    echo "Erro ao conectar";
}

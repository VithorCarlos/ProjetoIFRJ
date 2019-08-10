<?php
include "conexao.php"; 
$link = conexao(); //
    // Alterando o tamanho máximo do arquivo para 5Megabytes
    ini_set('upload_max_filesize','5MB');

    // Pega o nome do aqruivo
    $imagem_evento = $_FILES['imagem_evento']['name'];

    // Define diretório e nome final do arquivo servidor
    // strtolower coloca em minúsculo
    $arqDestino = strtolower('C:/xampp/htdocs/ProjetoIFRJ/Prototipo/images/'.$imagem_evento);

    // Pega o nome do arquivo temporário usado no servidor
    $nome_temp = $_FILES['imagem_evento']['tmp_name'];

    // Move arquivo temporário para o diretório e nome corretos
    if (!move_uploaded_file($nome_temp, $arqDestino) ) {
       // Erro ao mover arquivo
       echo ("<b>Erro de upload do arquivo.</b>");
    }
    else {
        $nome_evento =  $_POST['nome_evento'];
        $data_evento = $_POST['data_evento'];
        $hora_evento =  $_POST['hora_evento'];
        $cep_evento = $_POST['cep_evento'];
        $estado_evento = $_POST['estado_evento'];
        $cidade_evento = $_POST['cidade_evento'];
        $bairro_evento = $_POST['bairro_evento'];
        $rua_evento = $_POST['rua_evento'];
        $complemento_evento = $_POST['complemento_evento'];
        $desc_evento = $_POST['desc_evento'];

        $query = "insert into evento(nome_evento, data_evento, hora_evento, imagem_evento, desc_evento, cep_evento, estado_evento, cidade_evento, bairro_evento, rua_evento, complemento_evento)
        values(?,?,?,?,?,?,?,?,?,?,?)";

        if($prepare = $link->prepare($query)){
            $prepare->bind_param('sssssisssss',$nome_evento, $data_evento, $hora_evento, $imagem_evento, $desc_evento, $cep_evento, $estado_evento, $cidade_evento, $bairro_evento, $rua_evento, $complemento_evento); 
            if($prepare->execute()){
                header ('location: indexAdm.php');
                echo "<b>Produto cadastrado com sucesso<b>";
            } else {
                echo"<b>Falha ao cadastrar!<b>";
            }
          
        }
    }

?>
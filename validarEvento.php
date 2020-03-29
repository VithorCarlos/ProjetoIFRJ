<?php
include('conexao.php');

//Declarando as variáveis
$errors = array(
  "evento_cadastrado" => "Este evento já foi Cadastrado.",
  "descricao_cadastrado" => "Use outra descrição, pois esta já existe."
);

$nome_evento = "";
$data_evento = "";
$hora_evento = "";
$cep_evento = "";
$estado_evento = "";
$cidade_evento = "";
$bairro_evento = "";
$rua_evento = "";
$complemento_evento = "";
$desc_evento = "";

if (isset($_POST['registrar_evento'])) {
  //Receber os dados do formulário (input)
  $nome_evento = mysqli_real_escape_string(conexao(), $_POST['nome_evento']);
  $data_evento = mysqli_real_escape_string(conexao(), $_POST['data_evento']);
  $hora_evento = mysqli_real_escape_string(conexao(), $_POST['hora_evento']);
  $cep_evento = mysqli_real_escape_string(conexao(), $_POST['cep_evento']);
  $estado_evento = mysqli_real_escape_string(conexao(), $_POST['estado_evento']);
  $cidade_evento = mysqli_real_escape_string(conexao(), $_POST['cidade_evento']);
  $bairro_evento = mysqli_real_escape_string(conexao(), $_POST['bairro_evento']);
  $rua_evento = mysqli_real_escape_string(conexao(), $_POST['rua_evento']);
  $complemento_evento = mysqli_real_escape_string(conexao(), $_POST['complemento_evento']);
  $desc_evento = mysqli_real_escape_string(conexao(), $_POST['desc_evento']);


  //Bloquear que dados vazios sejam inseridos.
  if (empty($nome_evento)) {
    array_push($errors, "");
    return false;
  }
  if (empty($data_evento)) {
    array_push($errors, "");
    return false;
  }
  if (empty($hora_evento)) {
    array_push($errors, "");
    return false;
  }
  if (empty($cep_evento)) {
    array_push($errors, "");
    return false;
  }
  if (empty($estado_evento)) {
    array_push($errors, "");
    return false;
  }
  if (empty($cidade_evento)) {
    array_push($errors, "");
    return false;
  }

  if (empty($bairro_evento)) {
    array_push($errors, "");
    return false;
  }

  if (empty($rua_evento)) {
    array_push($errors, "");
    return false;
  }

  if (empty($complemento_evento)) {
    array_push($errors, "");
    return false;
  }

  if (empty($desc_evento)) {
    array_push($errors, "");
    return false;
  }

  //Verificar se já existe.
  $check_evento = "select * from evento where nome_evento='{$nome_evento}' or desc_evento='{$desc_evento}'";
  $result = mysqli_query(conexao(), $check_evento);

  $user = mysqli_fetch_assoc($result);

  //Caso ele exista: diga que está uso.
  if ($user) {
    if ($user['nome_evento'] === $nome_evento) {
      array_push($errors, "Este evento já foi Cadastrado.");
      $_SESSION["evento_existente"] = $errors["evento_cadastrado"];
      return false;
    }

    if ($user['desc_evento'] === $desc_evento) {
      array_push($errors, "Use outra descrição, pois esta já existe.");
      $_SESSION["descricao_existente"] = $errors["descricao_cadastrado"];
      return false;
    }
  }

  //Para não permitir que o formulário seja enviado com erros.
  $row = mysqli_num_rows($errors);

  if ($row == false) {
    header("location: cadastro_evento.php");
  }

  if ($row == 0) {


    $link = conexao(); //
    // Alterando o tamanho máximo do arquivo para 5Megabytes
    ini_set('upload_max_filesize','5MB');

    // Pega o nome do aqruivo
    $imagem_evento = $_FILES['imagem_evento']['name'];

    // Define diretório e nome final do arquivo servidor
    // strtolower coloca em minúsculo
    $arqDestino = strtolower('C:/xampp/htdocs/ProjetoIFRJ/Prototipo/images/'.$imagem_evento);

    $teste = array('png', 'jpg', 'jpeg', 'gif');
  
    // Pega o nome do arquivo temporário usado no servidor
    $nome_temp = $_FILES['imagem_evento']['tmp_name'];

    // Move arquivo temporário para o diretório e nome corretos
    if (!move_uploaded_file($nome_temp, $arqDestino) ) {
       // Erro ao mover arquivo
       echo ("<b>Erro de upload do arquivo.</b>"); 
    }
    else {

        $query = "insert into evento(nome_evento, data_evento, hora_evento, imagem_evento, desc_evento, cep_evento, estado_evento, cidade_evento, bairro_evento, rua_evento, complemento_evento)
        values(?,?,?,?,?,?,?,?,?,?,?)";

        if($prepare = $link->prepare($query)){
            $prepare->bind_param('sssssisssss',$nome_evento, $data_evento, $hora_evento, $imagem_evento, $desc_evento, $cep_evento, $estado_evento, $cidade_evento, $bairro_evento, $rua_evento, $complemento_evento); 
            if($prepare->execute()){
             
              $cadastrado_evento = "<script>alert('Evento cadastrado com Sucesso!');</script>";
              $_SESSION['evento_cadastrado'] = $cadastrado_evento;
              header ('location: indexAdm.php');  
            }         
        }
    }
  }
}

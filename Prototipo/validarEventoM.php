<?php
include ('conexao.php');

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

if (isset($_POST['registrar_eventoM'])) {
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

  //Caso não ocorra nenhum erro, permita que os dados sejam inseridos no banco.
  if ($row == 0) {
    $query = "insert into evento(nome_evento, data_evento, hora_evento, desc_evento, cep_evento, estado_evento, cidade_evento, bairro_evento, rua_evento)
    values('{$nome_evento}', ('{$data_evento}'), ('{$hora_evento}'), '{$desc_evento}', '{$cep_evento}', '{$estado_evento}', '{$cidade_evento}', '{$bairro_evento}', '{$rua_evento}')";
    mysqli_query(conexao(), $query);
    $_SESSION['nome_evento'] = $nome_evento;
    header('location: indexMembro.php');
  }
}

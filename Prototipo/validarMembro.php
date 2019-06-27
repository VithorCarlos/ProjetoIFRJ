<?php
include ('conexao.php');

//Declarando as variáveis
$errors = array(
  "senhas_direferentes" => "As senhas não correspondem",
  "usuario_cadastrado" => "Usuário já cadastrado",
  "email_cadastrado" => "Email já cadastrado",
  "cpf_cadastrado" => "CPF já cadastrado",
  "telefone_cadastrado" => "Telefone já cadastrado"
);

$nome_membro = "";
$email_membro = "";
$cpf_membro = "";
$telefone_membro = "";

if (isset($_POST['registrar_membro'])) {
  //Receber os dados do formulário (input)
  $nome_membro = mysqli_real_escape_string(conexao(), $_POST['nome_membro']);
  $email_membro = mysqli_real_escape_string(conexao(), $_POST['email_membro']);
  $cpf_membro = mysqli_real_escape_string(conexao(), $_POST['cpf_membro']);
  $telefone_membro = mysqli_real_escape_string(conexao(), $_POST['telefone_membro']);
  $senha_membro = mysqli_real_escape_string(conexao(), $_POST['senha_membro']);
  $senha_membro2 = mysqli_real_escape_string(conexao(), $_POST['senha_membro2']);
 

  //Bloquear que dados vazios sejam inseridos.
  if (empty($nome_membro)) {
    array_push($errors, "");
    return false;
  }
  if (empty($cpf_membro)) {
    array_push($errors, "");
    return false;
  }
  if (empty($telefone_membro)) {
    array_push($errors, "");
    return false;
  }
  if (empty($email_membro)) {
    array_push($errors, "");
    return false;
  }
  if (empty($senha_membro)) {
    array_push($errors, "");
    return false;
  }
  if ($senha_membro != $senha_membro2) {
    array_push($errors, "As senhas não correspondem");
    $_SESSION["senhas_diferentes"] = $errors["senhas_direferentes"];
    return false;
  }

  function validarCPF($cpf_membro)
  {
    //O primeiro é o padrão de pesquisa ( Oque ele irá pesquisar), o segundo('') é oque ele irá remover, e o terceiro é aonde irá pesquisar
    $cpf_membro = preg_replace('/[^0-9]/', '', $cpf_membro);
    $cpf_membro = str_pad($cpf_membro, 11, '0', STR_PAD_LEFT);
    $digitoUm = 0;
    $digitoDois = 0;

    //para pegar os dados do cpf

    //O "$valor" vai servir para o decremento, ou seja, contar de 10 até 0. A "," serve para colocar mais de uma 'variavel' em uma condição e dizer oque quer que ele faça.
    for ($i = 0, $valor = 10; $i <= 8; $i++, $valor--) {
      $digitoUm += $cpf_membro[$i] * $valor;
    }
    for ($i = 0, $valor = 11; $i <= 9; $i++, $valor--) {
      if (str_repeat($i, 11 == $cpf_membro)) {  //"str_repeat" > verificar o valor que será repitido, e a quantidade que será repitida. 'A quantidade do valor do cpf, não poderá ser igual a 11. E não pode ser igual ao CPF'
        return false;
      }
      $digitoDois += $cpf_membro[$i] * $valor;
    }

    //Para saber se o resto da divisão é menor do que dois.
    $calculoUm = (($digitoUm % 11) < 2) ? 0 : 11 - ($digitoUm % 11);
    $calculoDois = (($digitoDois % 11) < 2) ? 0 : 11 - ($digitoDois % 11);

    //Começar a fazer as validações e comparar os números com base no calculo do CPF
    if ($calculoUm <> $cpf_membro[9] || $calculoDois <> $cpf_membro[10]) {
      return false;
    }
    return true;
  }

  if (!validarCPF($cpf_membro)) {
    return false;
  }

  //Verificar se o usuário ou email já existe.
  $check_usuario = "select * from membro where nome_membro='{$nome_membro}' or email_membro='{$email_membro}' or cpf_membro='{$cpf_membro}' or telefone_membro='{$telefone_membro}'";
  $result = mysqli_query(conexao(), $check_usuario);

  $user = mysqli_fetch_assoc($result);

  //Caso ele exista: diga que está uso.
  if ($user) {
    if ($user['nome_membro'] === $nome_membro) {
      array_push($errors, "Usuário já cadastrado");
      $_SESSION["login_existente"] = $errors["usuario_cadastrado"];
      return false;
    }

    if ($user['email_membro'] === $email_membro) {
      array_push($errors, "Email já cadastrado");
      $_SESSION["email_existente"] = $errors["email_cadastrado"];
      return false;
    }

    if ($user['cpf_membro'] === $cpf_membro) {
      array_push($errors, "CPF já cadastrado");
      $_SESSION["cpf_existente"] = $errors["cpf_cadastrado"];
      return false;
    }

    if ($user['telefone_membro'] === $telefone_membro) {
      array_push($errors, "Telefone já cadastrado");
      $_SESSION["telefone_existente"] = $errors["telefone_cadastrado"];
      return false;
    }
  }

//Para não permitir que o formulário seja enviado com erros.
  $row = mysqli_num_rows($errors);

  if ($row == false) {
    header("location: cadastro_membro.php");
  }

  //Caso não ocorra nenhum erro, permita que os dados sejam inseridos no banco.
  if ($row == 0) {
    $query = "insert into membro(nome_membro, email_membro, cpf_membro, senha_membro, telefone_membro)
    values('{$nome_membro}', ('{$email_membro}'), ('{$cpf_membro}'), '{$senha_membro}', '{$telefone_membro}')";
    mysqli_query(conexao(), $query);
    $_SESSION['nome_membro'] = $nome_membro;
    header('location: index.html');
  }
}

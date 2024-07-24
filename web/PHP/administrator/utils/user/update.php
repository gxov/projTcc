<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");


//logica de ediçãp para Usuario
if (isset($_POST['update'])) {
  $conn = connect();
  $cod = $_POST["codUpd"];
  $nome = $_POST["nomeUpd"];
  $username = $_POST["usernameUpd"];
  $cpf = $_POST["cpfUpd"];
  $email = $_POST["emailUpd"];
  $senha = $_POST["senhaUpd"];
  $ativo = $_POST["ativoUpd"];
  $tipo = $_POST["tipoUpd"];

  $filename = $_FILES["imagemUserUpd"]["name"];
  $tempname = $_FILES["imagemUserUpd"]["tmp_name"];


  $folder = "C:/xampp/htdocs/projtcc/web/src/fotos/usuario/" . $filename;

  
  $sql = "UPDATE tb_usuarios
  SET nome ='" . $nome . "', username = '". $username . "', cpf = ". $cpf . ", email = '". $email . "', senha = '". $senha . "', ativo = ". $ativo . ", tipo = '". $tipo ."', imagem = '" . $filename . "' 
  WHERE cod = ". $cod;


  $tsql = $conn->prepare($sql);
  $tsql->execute();

  if (move_uploaded_file($tempname, $folder)) {
  } else {
  }
}

?>
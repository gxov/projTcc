<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");
//logica de criação para Usuario



if (isset($_POST['submit'])) {
  $nome = $_POST["nomeUser"];
  $user = $_POST["usernameUser"];
  $cpf = $_POST["cpfUser"];
  $email = $_POST["emailUser"];
  $senha = $_POST["senhaUser"];
  $tipo = $_POST["tipoUser"];

  $filename = $_FILES["fotoUser"]["name"];
  $tempname = $_FILES["fotoUser"]["tmp_name"];
  $folder = "C:/xampp/htdocs/projtcc/web/src/fotos/usuario/" . $filename;

  $conn = connect();
  $sql = "INSERT INTO tb_usuarios (nome, username, cpf, email, senha, tipo, foto, ativo) VALUES ('" . $nome . "', '" . $user . "', " . $cpf . ", '" . $email . "', '" . $senha . "', '" . $tipo . "', '" . $filename . "', true);";


  $tsql = $conn->prepare($sql);
  $tsql->execute();

  if (move_uploaded_file($tempname, $folder)) {
  } else {
  }
}

?>
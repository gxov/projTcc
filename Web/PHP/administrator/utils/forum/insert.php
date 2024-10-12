<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");
//logica de criação para Usuario



if (isset($_POST['submit'])) {
  $nome = $_POST["nomeForum"];
  $cpf = $_POST["cpfForum"];
  $email = $_POST["emailForum"];
  $senha = md5($_POST["senhaForum"]);
  $tipo = $_POST["tipoForum"];

  $filename = $_FILES["imagemForum"]["name"];
  $tempname = $_FILES["imagemForum"]["tmp_name"];
  $folder = "C:/xampp/htdocs/projtcc/web/src/fotos/usuario/" . $filename;

  $conn = connect();
  $sql = "INSERT INTO tb_usuarios (ativo, dtinicio, nome, descricao) VALUES (true, '" . $nome . "', " . $cpf . ", '" . $email . "', '" . $senha . "', '" . $tipo . "', '" . $filename . "', true);";


  $tsql = $conn->prepare($sql);
  $tsql->execute();

  if (move_uploaded_file($tempname, $folder)) {
  } else {
  }
}

?>
<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");
//logica de criação para livro



if (isset($_POST['submit'])) {
  $titulo = $_POST["nomeAutor"];
  $desc = $_POST["descricaoAutor"];

  $filename = basename($_FILES["imgAutor"]["name"]);
  $tempname = $_FILES["imgAutor"]["tmp_name"];
  $folder = "C:/xampp/htdocs/projtcc/Web/SRC/fotos/autores/" . $filename;

  $conn = connect();
  $sql = "INSERT INTO tb_autores(nome, ativo, descricao, imagem) VALUES ('" . $titulo . "', true, '" . $desc . "', '" . $filename . "');";


  $tsql = $conn->prepare($sql);
  $tsql->execute();

  if (move_uploaded_file($tempname, $folder)) {
  } else {
  }
}

?>
<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");
//logica de criação para livro



if (isset($_POST['submit'])) {
  $titulo = $_POST["tituloLivro"];
  $desc = $_POST["descricaoLivro"];

  $filename = $_FILES["capaLivro"]["name"];
  $tempname = $_FILES["capaLivro"]["tmp_name"];
  $folder = "C:/xampp/htdocs/projtcc/Web/SRC/fotos/autor/" . $filename;

  $conn = connect();
  $sql = "INSERT INTO tb_autores(nome, ativo, descricao) VALUES ('" . $titulo . "', true, '" . $desc . "');";


  $tsql = $conn->prepare($sql);
  $tsql->execute();

  // if (move_uploaded_file($tempname, $folder)) {
  // } else {
  // }
}

?>
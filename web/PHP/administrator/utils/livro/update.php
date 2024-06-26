<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");
//logica de criação para livro



if (isset($_POST['update'])) {
  $cod = $_POST["codUpd"];
  $titulo = $_POST["tituloUpd"];
  $ativo = $_POST["ativoUpd"];
  $desc = $_POST["descricaoLivroUpd"];

  $filename = $_FILES["capaLivroUpd"]["name"];
  $tempname = $_FILES["capaLivroUpd"]["tmp_name"];
  $folder = "C:/xampp/htdocs/projtcc/web/src/capas/" . $filename;

  $conn = connect();
  $sql = "UPDATE tb_livros
  SET nome ='" . $titulo . "', ativo =". $ativo .", descricao ='" . $desc . "', imagem = '" . $filename . "' 
  WHERE cod = ".$cod;


  $tsql = $conn->prepare($sql);
  $tsql->execute();

  if (move_uploaded_file($tempname, $folder)) {
  } else {
  }
}

?>
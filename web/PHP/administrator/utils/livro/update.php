<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");


//logica de ediçãp para livro
if (isset($_POST['update'])) {
  $conn = connect();
  $cod = $_POST["codUpd"];
  $titulo = $_POST["tituloUpd"];
  $ativo = $_POST["ativoUpd"];
  $desc = $_POST["descricaoLivroUpd"];

  $filename1 = $_FILES["capaLivroUpd"]["name"];
  $tempname1 = $_FILES["capaLivroUpd"]["tmp_name"];

  $filename2 = $_FILES["capaArqUpd"]["name"];
  $tempname2 = $_FILES["capaArqUpd"]["tmp_name"];

  $folder1 = "C:/xampp/htdocs/projtcc/web/src/capas/" . $filename1;
  $folder2 = "C:/xampp/htdocs/projtcc/web/src/livros/" . $filename1;

  if (move_uploaded_file($tempname1, $folder1) && move_uploaded_file($tempname2, $folder2)) {
  } else {
  }

  $sql = "UPDATE tb_livros
  SET nome ='" . $titulo . "', ativo = ". $ativo .", descricao = '" . $desc . "', arquivo='".$filename2."' imagem = '" . $filename1 . "' 
  WHERE cod = ".$cod;


  $tsql = $conn->prepare($sql);
  $tsql->execute();

  
}

?>
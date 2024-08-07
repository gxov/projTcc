<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");


//logica de ediçãp para livro
if (isset($_POST['update'])) {
  $conn = connect();
  $cod = $_POST["codUpd"];
  $titulo = $_POST["tituloUpd"];
  $ativo = $_POST["ativoUpd"];
  $desc = $_POST["descricaoLivroUpd"];

  // $filename = $_FILES["capaLivroUpd"]["name"];
  // $tempname = $_FILES["capaLivroUpd"]["tmp_name"];


  // $folder = "C:/xampp/htdocs/projtcc/web/src/fotos/autor/" . $filename;

  // if (move_uploaded_file($tempname, $folder)) {
  //   echo "success";
  // } else {
  //   echo "fail";
  // }

  $sql = "UPDATE tb_autores
  SET nome ='" . $titulo . "', ativo = ". $ativo .", descricao = '" . $desc . "' 
  WHERE cod = ".$cod;


  $tsql = $conn->prepare($sql);
  $tsql->execute();

  
}

?>
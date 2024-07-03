<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");


//logica de ediçãp para livro
if (isset($_POST['update'])) {
  $conn = connect();
  $cod = $_POST["codUpd"];
  $titulo = $_POST["tituloUpd"];
  $ativo = $_POST["ativoUpd"];
  $desc = $_POST["descricaoLivroUpd"];

  echo $_FILES;

  $filename = $_FILES["capaUpd"]["name"];
  $tempname = $_FILES["capaUpd"]["tmp_name"];


  $folder = "C:/xampp/htdocs/projtcc/web/src/capas/" . $filename;

  if (move_uploaded_file($tempname, $folder)) {
    echo "success";
  } else {
    echo "fail";
  }

  $sql = "UPDATE tb_livros
  SET nome ='" . $titulo . "', ativo = ". $ativo .", descricao = '" . $desc . "', imagem = '" . $filename . "' 
  WHERE cod = ".$cod;


  $tsql = $conn->prepare($sql);
  $tsql->execute();

  
}

?>
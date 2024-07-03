<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");


//logica de ediçãp para Usuario
if (isset($_POST['update'])) {
  $conn = connect();
  $cod = $_POST["codUpd"];
  $titulo = $_POST["tituloUpd"];
  $ativo = $_POST["ativoUpd"];
  $desc = $_POST["descricaoUsuarioUpd"];

  $filename = $_FILES["capaUsuarioUpd"]["name"];
  $tempname = $_FILES["capaUsuarioUpd"]["tmp_name"];


  $folder = "C:/xampp/htdocs/projtcc/web/src/fotos/usuario/" . $filename;

  
  $sql = "UPDATE tb_usuarios
  SET nome ='" . $titulo . "', ativo = ". $ativo .", descricao = '" . $desc . "', imagem = '" . $filename . "' 
  WHERE cod = ".$cod;


  $tsql = $conn->prepare($sql);
  $tsql->execute();

  if (move_uploaded_file($tempname, $folder)) {
    echo "success";
  } else {
    echo "fail";
  }
}

?>
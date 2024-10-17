<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");


//logica de ediçãp para Usuario
if (isset($_POST['update'])) {
  $conn = connect();
  $cod = $_POST["codUpd"];
  $nome = $_POST["nomeUpd"];
  $desc = $_POST["descricaoUpd"];
  $ativo = $_POST["ativoUpd"];

  
  $sql = "UPDATE tb_foruns
  SET nome ='" . $nome . "', descricao = '". $desc . "', ativo = ". $ativo . " 
  WHERE cod = ". $cod;

  $tsql = $conn->prepare($sql);
  $tsql->execute();
}

?>
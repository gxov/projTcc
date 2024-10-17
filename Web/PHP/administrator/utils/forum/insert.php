<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");
//logica de criação para Usuario



if (isset($_POST['submit'])) {
  $nome = $_POST["nomeForum"];
  $desc = $_POST["descricaoForum"];
  unset($_POST['submit']);
  $conn = connect();
  $sql = "INSERT INTO tb_foruns (ativo, nome, descricao) VALUES (true, '" . $nome . "', '" . $desc . "');";


  $tsql = $conn->prepare($sql);
  $tsql->execute();

  header("Location: " . $_SERVER['PHP_SELF']);
  
  $tsql->close();
  $conn->close();
  exit(); 
}

?>
<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");

if (isset($_POST['delete'])) {
    $cod = $_POST["codDelete"];
  
    $conn = connect();
    $sql = "DELETE FROM tb_livros WHERE cod = ".$cod;

    $tsql = $conn->prepare($sql);
    $tsql->execute();
  }


?>
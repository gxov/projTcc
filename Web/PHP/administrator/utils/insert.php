<?php
include_once ("connect.php");
//logica de criação para livro
if ($_POST["tituloLivro"] != null && $_POST["capaLivro"] != null && $_POST["descricaoLivro"] != null) {
  $conn = connect();
  $sql = "INSERT INTO " . $table . "(nome, ativo, descricao, imagem) VALUES ('" . $_POST["tituloLivro"] . "', true, '" . $_POST["descricaoLivro"] . "', " . $POST["capaLivro"]. ");";


  $tsql = $conn->prepare($sql);
  $tsql->execute();
}

?>
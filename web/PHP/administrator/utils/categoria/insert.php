<?php
include_once("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");
//logica de criação para livro

if (isset($_POST['submit'])) {
  $nome = $_POST["nome"];
  $tipo = $_POST["tipo"];

  $conn = connect();

  if ($tipo == "livro") {
    $sql = "INSERT INTO tb_categorias(nome, ativo) VALUES (?, true)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nome);
    $stmt->execute();

  } elseif ($tipo == "forum") {
    $sql = "INSERT INTO tb_forumcategorias(nome, ativo) VALUES (?, true)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nome);
    $stmt->execute();
  }

  header("Location: " . $_SERVER['PHP_SELF']);

  $stmt->close();
  $conn->close();
  exit();
}

?>
<?php
include_once("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");
//logica de criação para livro

if (isset($_POST['submit'])) {
  $titulo = $_POST["tituloLivro"];
  $desc = $_POST["descricaoLivro"];
  $autor = $_POST["autorLivro"];

  $filename = basename($_FILES["capaLivro"]["name"]);
  $tempname = $_FILES["capaLivro"]["tmp_name"];
  $folder = "C:/xampp/htdocs/projtcc/web/src/capas/" . $filename;

  $conn = connect();

  $sql = "INSERT INTO tb_livros(nome, ativo, descricao, imagem) VALUES (?, true, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $titulo, $desc, $filename);

  if ($stmt->execute()) {
      if (move_uploaded_file($tempname, $folder)) {
          $sql2 = "SELECT cod FROM tb_livros ORDER BY cod DESC LIMIT 1";
          $stmt2 = $conn->prepare($sql2);
          $stmt2->execute();
          $stmt2->bind_result($id);
          $stmt2->fetch();
          $stmt2->close();
          if ($id) { 
              $sql3 = "INSERT INTO tb_livros_autores(codlivro, codautor) VALUES (?, ?)";
              $stmt3 = $conn->prepare($sql3);
              $stmt3->bind_param("ii", $id, $autor);
              $stmt3->execute();
              $stmt3->close();
          }
      } else {
          echo "Failed to upload the file.";
      }
  } else {
      echo "Failed to insert the book.";
  }

  $stmt->close();
  $conn->close();
}

?>
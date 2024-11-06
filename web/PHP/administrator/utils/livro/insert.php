<?php
include_once("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");
//logica de criação para livro

if (isset($_POST['submit'])) {
  $titulo = $_POST["tituloLivro"];
  $desc = $_POST["descricaoLivro"];
  $autor = $_POST["autorLivro"];
  $categorias = $_POST["categoriasLivro"];

  $filename1 = basename($_FILES["capaLivro"]["name"]);
  $tempname1 = $_FILES["capaLivro"]["tmp_name"];
  $folder1 = "C:/xampp/htdocs/projtcc/web/src/capas/" . $filename1;

  $filename2 = basename($_FILES["arqLivro"]["name"]);
  $tempname2 = $_FILES["arqLivro"]["tmp_name"];
  $folder2 = "C:/xampp/htdocs/projtcc/web/src/livros/" . $filename2;

  $conn = connect();

  $sql = "INSERT INTO tb_livros(nome, ativo, descricao, imagem, arquivo) VALUES (?, true, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $titulo, $desc, $filename1, $filename2);

  if ($stmt->execute()) {
    $sql2 = "SELECT cod FROM tb_livros ORDER BY cod DESC LIMIT 1";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute();
    $stmt2->bind_result($id);
    $stmt2->fetch();
    $stmt2->close();
    if (isset($id)) {

      $sql3 = "INSERT INTO tb_livros_autores(codlivro, codautor) VALUES (?, ?)";
      $stmt3 = $conn->prepare($sql3);
      $stmt3->bind_param("ii", $id, $autor);
      $stmt3->execute();
      $stmt3->close();
    }
    if (move_uploaded_file($tempname1, $folder1) && move_uploaded_file($tempname2, $folder2)) {
      if ($categorias) {
        $categorias2 = explode(',', $categorias);
        $sql4 = "INSERT INTO tb_categorias_livros(codlivro, codcategoria) VALUES (?, ?)";


        foreach ($categorias2 as $categoria) {
          $categoria = trim($categoria);
          if (!empty($categoria)) {
            $stmt4 = $conn->prepare($sql4);
            $stmt4->bind_param("is", $id, $categoria);

            if (!$stmt4->execute()) {
              throw new Exception("Erro ao inserir categoria: " . $stmt4->error);
            }

          }

          $stmt4->close();
        }

      } else {
        echo "Failed to upload the file.";
      }
    }
  } else {
    echo "Failed to insert the book.";
  }
  header("Location: " . $_SERVER['PHP_SELF']);

  $stmt->close();
  $conn->close();
  exit();
}

?>
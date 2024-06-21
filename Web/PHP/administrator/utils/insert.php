<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $sv = "localhost";
  $us = "root";
  $psw = "";
  $db = "db_0426";

  $conn = mysqli_connect($sv, $us, $psw, $db);

  if ($conn->connect_error) {
    die("Falha ao conectar ao banco de dados: " . $conn->connect_error);
  }

  $isbn = mysqli_real_escape_string($conn, $_POST["isbn"]);
  $titulo = mysqli_real_escape_string($conn, $_POST["titulo"]);
  $autor = mysqli_real_escape_string($conn, $_POST["autor"]);


  $ex = $conn->prepare("INSERT INTO tb_livros VALUES ('$isbn', '$titulo', '$autor')");
  $ex->execute();

  // if ($conn->query($sql) === TRUE) {
  //   echo "<script>window.location.reload();</script>";
  // }

  $conn->close();
}

?>
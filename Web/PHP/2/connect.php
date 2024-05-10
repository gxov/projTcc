<?php $sv = "localhost";
$us = "root";
$psw = "";
$db = "db_0426";

$conn = new mysqli($sv, $us, $psw, $db);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT isbn, titulo, autor FROM tb_livros";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<div class='livroRow'><div class='livroCodMin'> " . $row["isbn"] . " </div><div class='livroTituloMin'> " . $row["titulo"] . " </div><div class='livroAutorMin'> " . $row["autor"] . "</div></div>";
  }
} else {
  echo "<div class='livroRow'><div class='livroCodMin'> NULL </div><div class='livroTituloMin'> NULL </div><div class='livroAutorMin'> NULL </div></div>";
}
$conn->close();

?>
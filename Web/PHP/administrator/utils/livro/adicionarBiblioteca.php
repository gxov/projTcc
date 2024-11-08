<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['id'])) {
    $codlivro = $_POST['codLivro'];
    $codbiblioteca = $_POST['codBiblioteca'];

    $conn = connect();

    // Check if the book is already in the selected library
    $sqlCheck = "SELECT cod FROM tb_livros_bibliotecas WHERE codlivro = ? AND codbiblioteca = ?";
    $stmtCheck = $conn->prepare($sqlCheck);
    $stmtCheck->bind_param("ii", $codlivro, $codbiblioteca);
    $stmtCheck->execute();
    $stmtCheck->store_result();

    if ($stmtCheck->num_rows > 0) {
        echo "This book is already in the selected library.";
    } else {
        $sqlInsert = "INSERT INTO tb_livros_bibliotecas (codbiblioteca, codlivro) VALUES (?, ?)";
        $stmtInsert = $conn->prepare($sqlInsert);
        $stmtInsert->bind_param("ii", $codbiblioteca, $codlivro);

        if ($stmtInsert->execute()) {
            echo "Book successfully added to the library!";
        } else {
            echo "Error: Could not add the book to the library.";
        }

        $stmtInsert->close();
    }

    $stmtCheck->close();
    $conn->close();
    header('Location: http://localhost/projTcc/Web/PHP/bibliotecas.php');
}
?>
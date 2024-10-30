<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codlivro = $_POST['codLivro'];       // Book ID
    $codbiblioteca = $_POST['codBiblioteca']; // User-selected Library (Biblioteca) ID

    $conn = connect();

    // Check if the book is already in the selected library
    $sqlCheck = "SELECT cod FROM tb_livros_bibliotecas WHERE codlivro = ? AND codbiblioteca = ?";
    $stmtCheck = $conn->prepare($sqlCheck);
    $stmtCheck->bind_param("ii", $codlivro, $codbiblioteca);
    $stmtCheck->execute();
    $stmtCheck->store_result();

    if ($stmtCheck->num_rows > 0) {
        // Book is already in this library, so show an error or message
        echo "This book is already in the selected library.";
    } else {
        // Add the book to the selected library
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
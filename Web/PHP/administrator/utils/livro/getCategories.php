<?php function getBookCategories($conn, $bookId) {
    $categoryName = null;
    $sqlC = "SELECT c.nome FROM tb_categorias c 
             INNER JOIN tb_categorias_livros lc ON c.cod = lc.codcategoria 
             WHERE lc.codlivro = ?";
    $stmtC = $conn->prepare($sqlC);
    $stmtC->bind_param("i", $bookId);
    $stmtC->execute();
    $stmtC->bind_result($categoryName);
    $categories = [];
    while ($stmtC->fetch()) {
        $categories[] = $categoryName;
    }
    $stmtC->close();
    return $categories;
}

?>
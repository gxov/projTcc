<?php
include_once("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");
include_once("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/livro/getCategories.php");

$conn = connect();
$id = $_GET["id"];

if (isset($id)) {
    $idL = $id;

    $sqlA1 = "SELECT a.cod, a.nome FROM tb_autores a 
              JOIN tb_livros_autores la ON la.codautor = a.cod 
              WHERE la.codlivro = ?";
    $stmtA1 = $conn->prepare($sqlA1);
    $stmtA1->bind_param("i", $idL);
    $stmtA1->execute();
    $stmtA1->bind_result($idA, $nomeA);
    $stmtA1->fetch();
    $stmtA1->close();

    $sqlB = "SELECT nome, descricao, imagem FROM tb_livros WHERE cod = ?";
    $stmtB = $conn->prepare($sqlB);
    $stmtB->bind_param("i", $idL);
    $stmtB->execute();
    $stmtB->bind_result($title, $desc, $img);
    $stmtB->fetch();
    $stmtB->close();

    if ($title) {

        $categories = getBookCategories($conn, $idL);


        $result = '
        <div class="size5 pZero grid">
            <img class="livroCapa" src="../SRC/capas/' . htmlspecialchars($img) . '">
        </div>
        <div class="size7 livroInfoMain">
            <div class="livroTituloSection flexColumn contSection size12">
                <div class="livroTitulo">' . htmlspecialchars($title) . '</div>
                <div class="flexColumn widthMax">
                    <div class="livroAutor">
                        <a href="autor.php?id=' . $idA . '">'. htmlspecialchars($nomeA) . '</a>
                    </div>
                </div>
            </div>
            <div class="contSection borderBottom">
                <div class="size12 livroRowCategorias">';
        foreach ($categories as $category) {
            $result .= '<div class="badgeCategoria">' . htmlspecialchars($category) . '</div>';
        }
        $result .= '</div></div>';


        $result .= '
        <div class="contSection livroBtnRow">
            <button class="livroBtn" onclick="mostrarBibliotecas()">
                Adicionar à Biblioteca
            </button>
        </div>';


        $result .= '
        <form id="bibliotecas" class="livroBibliotecasForm" method="POST" action="administrator/utils/livro/adicionarBiblioteca.php">
            <input type="hidden" name="codLivro" value="' . htmlspecialchars($idL) . '">
            <div class="livroBibliotecas">';
        

        $sql = "SELECT cod, nome FROM tb_bibliotecas WHERE codusuario = ? AND ativo = 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $_SESSION['id']);
        $stmt->execute();
        $stmt->bind_result($bibliotecaCod, $bibliotecaNome);

        while ($stmt->fetch()) {
            $result .= '<input type="radio" name="codBiblioteca" value="' . htmlspecialchars($bibliotecaCod) . '">' . htmlspecialchars($bibliotecaNome) . '</input><br>';
        }

        $result .= '
            <input type="submit" value="Adicionar à Biblioteca">
            </div>
        </form>';


        $result .= '
        <div class="contSection livroDesc">
            ' . nl2br(htmlspecialchars($desc)) . '
        </div>
    </div>';

        echo $result;
    }

    $conn->close();
}
?>
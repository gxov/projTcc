<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");

$conn = connect();

if (isset($_SESSION['id'])) {
    $idU = $_SESSION['id'];


    $sqlBibliotecas = "
        SELECT cod, nome, descricao, ativo 
        FROM tb_bibliotecas 
        WHERE codusuario = ? AND ativo = 1"; 
    $stmtBibliotecas = $conn->prepare($sqlBibliotecas);
    $stmtBibliotecas->bind_param("i", $idU); 
    $stmtBibliotecas->execute();
    $stmtBibliotecas->store_result();

    if ($stmtBibliotecas->num_rows > 0) {
        $stmtBibliotecas->bind_result($bibliotecaCod, $bibliotecaNome, $bibliotecaDesc, $bibliotecaAtivo);

        while ($stmtBibliotecas->fetch()) {

            echo '
                <div class="bibliotecaSection">
                    <div class="sectionTitle"> Bibliotecas </div>
                    <h3>' . htmlspecialchars($bibliotecaNome) . '</h3>
                    <div class="bibliotecaDesc">' . nl2br(htmlspecialchars($bibliotecaDesc)) . '</div>
                    <h3>Livros nesta biblioteca:</h3>';


            $sqlLivros = "
                SELECT l.nome, l.descricao, l.imagem 
                FROM tb_livros_bibliotecas lb 
                JOIN tb_livros l ON lb.codlivro = l.cod 
                WHERE lb.codbiblioteca = ?";
            $stmtLivros = $conn->prepare($sqlLivros);
            $stmtLivros->bind_param("i", $bibliotecaCod);
            $stmtLivros->execute();
            $stmtLivros->store_result();

            if ($stmtLivros->num_rows > 0) {
                $stmtLivros->bind_result($livroNome, $livroDesc, $livroImg);

                // Display books for the current library
                while ($stmtLivros->fetch()) {
                    echo '
                        <div class="livroItem">
                            <div class="livroImagem">
                                <img src="../SRC/fotos/livros/' . htmlspecialchars($livroImg) . '">
                            </div>
                            <div class="livroInfo">
                                <h4 class="livroNome">' . htmlspecialchars($livroNome) . '</h4>
                                <p class="livroDesc">' . nl2br(htmlspecialchars($livroDesc)) . '</p>
                            </div>
                        </div>';
                }
            } else {
                echo '<p>Nenhum livro nesta biblioteca.</p>';
            }
            $stmtLivros->close();

            echo '</div>';
        }
    } else {
        echo '<p>O usuário não possui bibliotecas ativas.</p>';
    }

    $stmtBibliotecas->close();
    $conn->close();
}
?>
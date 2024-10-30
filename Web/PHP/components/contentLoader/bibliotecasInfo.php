<?php
include_once("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");

$conn = connect();

if (isset($_SESSION['id'])) {
    $idU = $_SESSION['id'];


    $sqlBibliotecas = "
        SELECT cod, nome, ativo 
        FROM tb_bibliotecas 
        WHERE codusuario = ? AND ativo = 1";
    $stmtBibliotecas = $conn->prepare($sqlBibliotecas);
    $stmtBibliotecas->bind_param("i", $idU);
    $stmtBibliotecas->execute();
    $stmtBibliotecas->store_result();

    if ($stmtBibliotecas->num_rows > 0) {
        $stmtBibliotecas->bind_result($bibliotecaCod, $bibliotecaNome, $bibliotecaAtivo);

        while ($stmtBibliotecas->fetch()) {
            if ($bibliotecaAtivo == true) {
                echo '
                <div class="sectionTitle"> Bibliotecas </div>
                <div class="bibliotecaSection flex" style="flex-direction: row-reverse;">
                    <div class="forumCommentSection size4">
                        <form  method="POST" enctype="multipart/form-data" action="">
                            <div class="controlTitulo">
                                <t3 style="font-weight:bold">Criar Biblioteca</t3>
                            </div>
                            <div class="controlInputSection flexColumn">
                                <label class="controlLabel" for="nome">Nome</label>
                                <div class="flex">
                                    <input class="controlInput size6" type="text" name="nome" id="nome" required>
                                    <input class="controlBtn" type="submit" name="submit" value="Confirmar">
                                </div>
                            </div>
                        </form>
                        <form  method="POST" enctype="multipart/form-data" action="">
                            <div class="controlTitulo">
                                <t3 style="font-weight:bold">Deletar Biblioteca</t3>
                            </div>
                            <div class="controlInputSection flexColumn">
                                <label class="controlLabel" for="codDel">Código da biblioteca</label>
                                <div class="flex">
                                    <input class="controlInput size6" type="text" name="nome" id="nome" required>
                                    <input class="controlBtn" type="submit" name="submitDel" value="Confirmar">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="size8">
                    <h3>' . htmlspecialchars($bibliotecaNome) . '</h3>
                    <h3>Livros nesta biblioteca:</h3>
                    ';


                $sqlLivros = "
                SELECT l.cod, l.nome, l.descricao, l.imagem 
                FROM tb_livros_bibliotecas lb 
                JOIN tb_livros l ON lb.codlivro = l.cod 
                WHERE lb.codbiblioteca = ?";
                $stmtLivros = $conn->prepare($sqlLivros);
                $stmtLivros->bind_param("i", $bibliotecaCod);
                $stmtLivros->execute();
                $stmtLivros->store_result();

                if ($stmtLivros->num_rows > 0) {
                    $stmtLivros->bind_result($id, $livroNome, $livroDesc, $livroImg);
                    echo '<div class="grid size12" style="row-gap: 1rem; column-gap: 1rem; padding-right: 2rem; grid-template-columns: 50% 50%;  ">';
                    // Display books for the current library
                    while ($stmtLivros->fetch()) {
                        echo '
                        <div class="sectionCardRow flex size12" style="margin:0">
                            <div class="sectionCardColumnCapa">
                                <img class="sectionCardColumnImg" src="../SRC/capas/' . htmlspecialchars($livroImg) . '">
                            </div>
                            <div class="sectionCardRowContent">
                                <div class="sectionCardRowTitulo">
                                    <a href="produto.php?id=' . $id . '">' . htmlspecialchars($livroNome) . '</a>
                                </div>
                            </div>
                        </div>';
                    }
                } else {
                    echo '<p>Nenhum livro nesta biblioteca.</p></div>';
                }
                $stmtLivros->close();

                echo '</div></div></div>';
            }
        }
    } else {
        echo '<p>O usuário não possui bibliotecas ativas.</p>';
    }

    $stmtBibliotecas->close();
    $conn->close();
}
?>
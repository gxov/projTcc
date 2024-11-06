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
                        <a href="autor.php?id=' . $idA . '">' . htmlspecialchars($nomeA) . '</a>
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
        </div>';

        echo $result;
        if (isset($_SESSION['id'])) {
            echo '
        <form class="livroReviewSection flexColumn" method="POST" action="">
            <div class="flex">
                <input type="hidden" name="avaliacaoId" value="' . $idL . '">
                <textarea class="forumInput size8" name="avaliacaoCont" placeholder="Faça um comentário!" required style="resize: none;"></textarea>
                <div class="flexColumn" style="margin: 0 0 0 1rem"><label for="avaliacaoNota" class="controlLabel"> Nota: </label>
                <input type="number" name="avaliacaoNota" class="flex forumInput size4" style="height: fit-content"></div>
            </div>
            <button class="forumBtn size2" type="submit" name="avaliacaoSubmit">Publicar</button>    
        </form>
        <div class="livroReviewSection">';
            $sqlAvals = "SELECT a.cod, a.descricao, a.nota, u.nome, u.username, u.imagem 
                FROM tb_avaliacoes a
                JOIN tb_usuarios u ON a.codusuario = u.cod
                WHERE a.codlivro = ?
                ORDER BY a.cod DESC";
            $stmtAvals = $conn->prepare($sqlAvals);
            $stmtAvals->bind_param("i", $idL);
            $stmtAvals->execute();
            $stmtAvals->bind_result($avalId, $avalContent, $avalNota, $avalAuthorNm, $avalAuthorUs, $avalAuthorImage);
            $stmtAvals->store_result();
            if ($stmtAvals->num_rows > 0) {
                while ($stmtAvals->fetch()) {
                    echo '
                <div class="forumComment flex">';
                    if($avalAuthorImage != ""){
                        echo'<img class="forumCommentImage" src="../SRC/fotos/usuario/' . $avalAuthorImage . '">';
                    }else{
                        echo '<svg class="commentUserAvatar" data-v-5cba5096="" data-v-dd104bd2="" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="avatar">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2m8-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8">
                        </path>
                    </svg>';
                    }
                    echo '<div class="commentContent size10 flexColumn"><span><strong>' . htmlspecialchars($avalAuthorNm) . '</strong> <st1>'.$avalAuthorUs.'</st1></span>
                    <span class="avaliacaoNota">'.nl2br(htmlspecialchars($avalNota)).'
                    ' . nl2br(htmlspecialchars($avalContent)) . '</div>';

                    if ($_SESSION['tipo'] == 'ADM') {
                        echo '<form action="" method="POST"><input type="hidden" name="avalIdDelete" value="' . $avalId . '"><input type="hidden" name="livroCod" value="' . $idL . '"><button class="deleteComment" type="submit" name="deleteSubmit">Deletar</button></form>';
                    }
                    echo '</div>';
                }
                echo '</div>';
            } else {
                if (isset($_SESSION['id'])) {
                    echo '<p>Sem comentários ainda, seja o primeiro a comentar!</p></div>';
                } else {
                    echo '<p>Sem comentários ainda, faça login para comentar!</p></div';
                }
            }
            echo '</div>';
        }
        echo '</div>';
    }

    $conn->close();
}
?>
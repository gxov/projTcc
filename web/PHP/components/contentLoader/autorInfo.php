<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/livro/getCategories.php");

$conn = connect();

if (isset($_GET["id"])) {
    $idA = $_GET["id"];

    $sqlL1 = "SELECT codlivro FROM tb_livros_autores WHERE codautor = ?";
    $stmtL1 = $conn->prepare($sqlL1);
    $stmtL1->bind_param("i", $idA);
    $stmtL1->execute();
    $stmtL1->bind_result($idL);
    $stmtL1->fetch();
    $stmtL1->close();

    $sqlL2 = "SELECT nome, imagem, descricao FROM tb_livros WHERE cod = ?";
    $stmtL2 = $conn->prepare($sqlL2);
    $stmtL2->bind_param("i", $idL);
    $stmtL2->execute();
    $stmtL2->store_result();
    $resultL = '';
    if ($stmtL2->num_rows > 0) {
        $stmtL2->bind_result($nomeL, $imgL, $descL);
        while ($stmtL2->fetch()) {
            $categories = getBookCategories($conn, $idL);
            $resultL .= '

            <div class="sectionCardRow flex size5">
            <div class="sectionCardColumnCapa">
                <img class="sectionCardColumnImg" src="../SRC/capas/' . htmlspecialchars($imgL) . '">
            </div>
            <div class="sectionCardRowContent">
                <div class="sectionCardRowTitulo"><a href="produto.php?id='.$idL.'">'.$nomeL.'</a></div>
                <div class="sectionCardRowCategories">';
                foreach ($categories as $category) {
                    $resultL .= '<div class="sectionCardRowBadge">' . htmlspecialchars($category) . '</div>';
                }
                $resultL .= '</div>
                <div class="sectionRowDesc">'.$descL.'</div>
            </div>
        </div>
            ';
        }
        $stmtL2->close();
    }


    $sqlA = "SELECT nome, descricao, imagem
FROM tb_autores
WHERE cod = " . $idA;

    $stmtA = $conn->prepare($sqlA);
    $stmtA->execute();
    $stmtA->store_result();
    $resultA = "";

    if ($stmtA->num_rows > 0) {
        $stmtA->bind_result($nome, $desc, $img);
        while ($stmtA->fetch()) {
            $resultA .= '
                <div class="size3 pZero grid">
                    <img class="autorImagem" src="../SRC/fotos/autores/' . htmlspecialchars($img) . '">
                </div>
                <div class="size9 livroInfoMain">
                    <div class="livroTituloSection borderBottom flexColumn contSection size8">
                        <div class="livroTitulo">' . htmlspecialchars($nome) . '</div>
                        <div class="flexColumn widthMax">
                        </div>
                    </div>
                    <div class="contSection livroDesc">
                        ' . nl2br(htmlspecialchars($desc)) . '
                    </div>
                </div>
                <div>
                    <div class="contSection autorLivrosRow size12">
                        <div class="autorLivrosTitle size8">
                        Obras
                        </div>
                        <div class="flex">
                        '.$resultL.'
                        </div>
                    </div>
                    
                </div>';
        }

        echo $resultA;
    } else {

    }
    ;
    $stmtA->close();
    $conn->close();
}
;
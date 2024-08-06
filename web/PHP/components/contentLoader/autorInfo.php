<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");


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
            $resultL .= '
            <div class="size12 flex autorCardLivro">
                <div class="">
                </div>
                <div class="flex">
                    <div class="">
                        <img class="livroCapa" src="../SRC/capas/' . htmlspecialchars($imgL) . '">
                    </div>
                    <div class="">
                        <div class="">
                        '.$nomeL.'
                        </div>
                        <div class="">
                        '.$descL.'
                        </div>
                    </div>
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
                <div class="size5 pZero grid">
                    <img class="livroCapa" src="../SRC/capas/' . htmlspecialchars($img) . '">
                </div>
                <div class="size7 livroInfoMain">
                    <div class="livroTituloSection borderBottom flexColumn contSection size8">
                        <div class="livroTitulo">' . htmlspecialchars($nome) . '</div>
                        <div class="flexColumn widthMax">
                        </div>
                    </div>
                    <div class="contSection livroBtnRow">
                        '.$resultL.'
                    </div>
                    <div class="contSection livroDesc">
                        ' . nl2br(htmlspecialchars($desc)) . '
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
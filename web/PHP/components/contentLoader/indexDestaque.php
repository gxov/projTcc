<?php
include_once("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/livro/getCategories.php");

$conn = connect();

$sqlWeek = "SELECT cod, nome, descricao, imagem
FROM tb_livros
ORDER BY nome
LIMIT 3";
$stmtW = $conn->prepare($sqlWeek);
$stmtW->execute();
$stmtW->store_result();
$items = "";

if ($stmtW->num_rows > 0) {


    $items .= '
    <div class="size6">
    <div class="sectionTitle">
        Destaques da Semana
    </div>
    <div class="sectionContent flexColumn">';
    $stmtW->bind_result($id, $title, $desc, $img);

    while ($row = $stmtW->fetch()) {
        $sqlA1 = "SELECT codautor FROM tb_livros_autores WHERE codlivro = ?";
        $stmtA1 = $conn->prepare($sqlA1);
        $stmtA1->bind_param("i", $id);
        $stmtA1->execute();
        $stmtA1->bind_result($idA);
        $stmtA1->fetch();
        $stmtA1->close();

        $sqlA2 = "SELECT nome FROM tb_autores WHERE cod = ?";
        $stmtA2 = $conn->prepare($sqlA2);
        $stmtA2->bind_param("i", $idA);
        $stmtA2->execute();
        $stmtA2->bind_result($nomeA);
        $stmtA2->fetch();
        $stmtA2->close();

        $categories = getBookCategories($conn, $id);

        $items .= '
        <div class="sectionCardRow flex size11">
            <div class="sectionCardColumnCapa">
                <img class="sectionCardColumnImg" src="../SRC/capas/' . $img . '">
            </div>
            <div class="sectionCardRowContent">
                <div class="sectionCardRowTitulo"><a href="produto.php?id=' . $id . '">' . htmlspecialchars($title) . '</a></div>
                <div class="sectionCardAuthor">
                    <a href="autor.php?id=' . $idA . '">' . htmlspecialchars($nomeA) . '</a>
                </div>
                <div class="sectionCardRowCategories">';
                    foreach ($categories as $category) {
                        $items .= '<div class="sectionCardRowBadge">' . htmlspecialchars($category) . '</div>';
                    }
                    $items .= '
                </div>
                <div class="sectionRowDesc">' . substr(htmlspecialchars($desc), 0, 250) . '...</div>
            </div>
        </div>';
    }
    ;
    $items .= '</div>
    </div>';
}

$sqlMonth = "SELECT cod, nome, descricao, imagem
FROM tb_livros
ORDER BY nome DESC
LIMIT 3";
$stmtM = $conn->prepare($sqlMonth);
$stmtM->execute();
$stmtM->store_result();
;
if ($stmtM->num_rows > 0) {
    $items .= '
    <div class="size6">
    <div class="sectionTitle">
        Destaques do Mês
    </div>
    <div class="sectionContent flexColumn">';
    $stmtM->bind_result($id, $title, $desc, $img);
    while ($row = $stmtM->fetch()) {
        $sqlA1 = "SELECT codautor FROM tb_livros_autores WHERE codlivro = ?";
        $stmtA1 = $conn->prepare($sqlA1);
        $stmtA1->bind_param("i", $id);
        $stmtA1->execute();
        $stmtA1->bind_result($idA);
        $stmtA1->fetch();
        $stmtA1->close();

        $sqlA2 = "SELECT nome FROM tb_autores WHERE cod = ?";
        $stmtA2 = $conn->prepare($sqlA2);
        $stmtA2->bind_param("i", $idA);
        $stmtA2->execute();
        $stmtA2->bind_result($nomeA);
        $stmtA2->fetch();
        $stmtA2->close();

        $categories = getBookCategories($conn, $id);


         $items .= '
        <div class="sectionCardRow flex size11">
            <div class="sectionCardColumnCapa">
                <img class="sectionCardColumnImg" src="../SRC/capas/' . $img . '">
            </div>
            <div class="sectionCardRowContent">
                <div class="sectionCardRowTitulo"><a href="produto.php?id=' . $id . '">' . htmlspecialchars($title) . '</a></div>
                <div class="sectionCardAuthor">
                    <a href="autor.php?id=' . $idA . '">' . htmlspecialchars($nomeA) . '</a>
                </div>
                <div class="sectionCardRowCategories">';
                    foreach ($categories as $category) {
                        $items .= '<div class="sectionCardRowBadge">' . htmlspecialchars($category) . '</div>';
                    }
                    $items .= '
                </div>
                <div class="sectionRowDesc">' . substr(htmlspecialchars($desc), 0, 450) . '...</div>
            </div>
        </div>';
    }
    ;
    $items .= '</div>
    </div>';
}
;

echo $items;
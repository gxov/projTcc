<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");


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
        $items .= '
        <div class="sectionCardRow flex size11">
        <div class="sectionCardColumnCapa">
            <img class="sectionCardColumnImg" src="../SRC/capas/' . $img . '">
        </div>
        <div class="sectionCardRowContent">
            <div class="sectionCardRowTitulo"><a href="produto.php?id=' . $id . '">
                    ' . $title . '
                </a></div>
            <div class="sectionCardAuthor">
            Nome do autor
            </div>
            <div class="sectionCardRowCategories">
            <div class="sectionCardRowBadge">
                        Categoria
                    </div>
            </div>
            <div class="sectionRowDesc">
                ' . $desc . '
            </div>
        </div>
        </div>
        ';
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
        $items .= '
        <div class="sectionCardRow flex size11">
        <div class="sectionCardColumnCapa">
            <img class="sectionCardColumnImg" src="../SRC/capas/' . $img . '">
        </div>
        <div class="sectionCardRowContent">
            <div class="sectionCardRowTitulo"><a href="produto.php?id=' . $id . '">
                    ' . $title . '
                </a></div>
                <div class="sectionCardAuthor">
            Nome do autor
            </div>
            <div class="sectionCardRowCategories">
            <div class="sectionCardRowBadge">
                        Categoria
                    </div>
            </div>
            <div class="sectionRowDesc">
                ' . $desc . '
            </div>
        </div>
        </div>
        ';
    }
    ;
    $items .= '</div>
    </div>';
};

echo $items;
<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");

$conn = connect();

$sql = "SELECT cod, nome, descricao, imagem
        FROM tb_autores
        ORDER BY nome
        LIMIT 3";
$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt->store_result();
$items = "";

if ($stmt->num_rows > 0) {
    $items .= '
        <div class="size5">
            <div class="sectionTitle">
                Autores
            </div>
            <div class="sectionContent flexColumn forumSection">';
    $stmt->bind_result($id, $title, $desc, $img);

    while ($row = $stmt->fetch()) {
        $items .= '
                <div class="sectionCardRow flex size5">
                    <div class="sectionCardColumnCapa">
                        <img class="sectionCardColumnImg" src="../SRC/capas/' . $img . '">
                    </div>
                    <div class="flexColumn">
                    <div class="sectionCardRowTitulo">
                        <a href="autor.php?id=' . $id . '">
                            ' . $title . '
                        </a>
                    </div>
                    <div class="sectionCardRowCategories">
                        <div class="sectionCardRowBadge">
                            Categoria
                        </div>
                    </div>
                    <div class="sectionRowDesc">
                        ' . $desc . '
                    </div>
                    <div class="forumStats flex">
                        2
                        <svg data-v-9ba4cb7e="" data-v-89359c03="" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                    </div>
                    </div>
                </div>';
    }

    $items .= '
            </div>
        </div>';
}

echo $items;
?>
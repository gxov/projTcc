<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");

$conn = connect();

$sql = "SELECT cod, nome, descricao, imagem
        FROM tb_autores
        ORDER BY RAND()
        LIMIT 2";
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

    while ($stmt->fetch()) {
        $sqlL1 = "SELECT codlivro FROM tb_livros_autores WHERE codautor = ?";
        $stmtL1 = $conn->prepare($sqlL1);
        $stmtL1->bind_param("i", $id);
        $stmtL1->execute();
        $stmtL1->store_result();
        $stmtL1->bind_result($idL);

        $livros = "";

        if ($stmtL1->num_rows > 0) {
           

            while ($stmtL1->fetch()) {
                $sqlL2 = "SELECT nome, imagem FROM tb_livros WHERE cod = ?";
                $stmtL2 = $conn->prepare($sqlL2);
                $stmtL2->bind_param("i", $idL);
                $stmtL2->execute();
                $stmtL2->bind_result($nomeL, $imgL);
                $stmtL2->fetch();
                $stmtL2->close();

                $livros .= '<div class="sectionCardBook size4 flexColumn">
                    <a href="produto.php?id=' . htmlspecialchars($idL) . '">
                        <img class="sectionCardColumnImg" src="../SRC/capas/' . htmlspecialchars($imgL) . '">
                    </a>
                </div>';
            }
        }

        $stmtL1->close();

        $items .= '
            <div class="sectionCardRow flex size12">
                <div class="flex size7">
                    <div class="sectionCardColumnCapa size5">
                        <img class="sectionCardColumnImgAuth" src="../SRC/fotos/autores/' . htmlspecialchars($img) . '">
                    </div>
                    <div class="sectionCardAuthor flexColumn size7">
                        <div class="sectionCardRowTitulo">
                            <a href="autor.php?id=' . htmlspecialchars($id) . '">
                                ' . htmlspecialchars($title) . '
                            </a>
                        </div>
                        <div class="sectionRowDesc">
                            ' . substr(htmlspecialchars($desc), 0, 250) . '...
                        </div>
                    </div>
                </div>
                <div class="flexColumn size4">
                    <div class="sectionCardBooksTitle">
                        Obras
                    </div>
                    <div class="sectionCardBooks">
                        ' . $livros . '
                    </div>
                </div>
            </div>';
    }

    $items .= '
            </div>
        </div>';
}

echo $items;

$stmt->close();
$conn->close();
?>

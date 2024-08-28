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

        $livros = "";

        if ($stmtL1->num_rows > 0) {
            $stmtL1->bind_result($idL);

            while ($stmtL1->fetch()) {
                $sqlL2 = "SELECT nome, imagem FROM tb_livros WHERE cod = ?";
                $stmtL2 = $conn->prepare($sqlL2);
                $stmtL2->bind_param("i", $idL);
                $stmtL2->execute();
                $stmtL2->bind_result($nomeL, $imgL);
                $stmtL2->fetch();
                $stmtL2->close();

                $livros .= '<div class="sectionCardBook size4 flexColumn">
                    <img class="sectionCardColumnImg" src="../SRC/capas/' . htmlspecialchars($imgL) . '">
                <div>
                    <st1>
                        <a href="autor.php?id=' . htmlspecialchars($idL) . '"> ' . htmlspecialchars($nomeL) . ' </a>
                    </st1>
                </div>
                </div>';
            }
        }

        $stmtL1->close();

        $items .= '
            <div class="sectionCardRow flex size12">
                <div class="flex size7">
                    <div class="sectionCardColumnCapa size5">
                        <img class="sectionCardColumnImg" src="../SRC/fotos/autores/' . htmlspecialchars($img) . '">
                    </div>
                    <div class="sectionCardAuthor flexColumn size7">
                        <div class="sectionCardRowTitulo">
                            <a href="autor.php?id=' . htmlspecialchars($id) . '">
                                ' . htmlspecialchars($title) . '
                            </a>
                        </div>
                        <div class="sectionRowDesc">
                            ' . htmlspecialchars($desc) . '
                        </div>
                    </div>
                </div>
                <div class="sectionCardBooks flex size4">
                    ' . $livros . '
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

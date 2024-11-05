<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/livro/getCategories.php");

$conn = connect();

$sql = "SELECT cod, nome, descricao, dtinicio
        FROM tb_foruns
        ORDER BY nome
        LIMIT 3";
$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt->store_result();
$items = "";

if ($stmt->num_rows > 0) {
    $items .= '
        <div class="size7">
            <div class="sectionTitle">
                Fóruns
            </div>
            <div class="sectionContent flexColumn forumSection">';
    $stmt->bind_result($id, $title, $desc, $date);

    $categories = getForumCategories($conn, $id);
    
    while ($row = $stmt->fetch()) {
        $items .= '
                <div class="sectionCardRow flex size11">
                    <div class="flexColumn size5" style="gap:4px">
                    <div class="sectionCardRowTitulo">
                        <a href="forum.php?id=' . $id . '">
                            ' . $title . '
                        </a>
                    </div>
                    <div class="sectionCardRowCategories">
                        ';
                        foreach ($categories as $category) {
                            $items .= '<div class="sectionCardRowBadge">' . htmlspecialchars($category) . '</div>';
                        }
                        $items .= '
                    </div>
                    
                    </div>
                    <div class="sectionRowDesc size6">
                        ' . $desc . '
                    </div>
                </div>';
    }
    
    $items .= '
            </div>
        </div>';
}

echo $items;
?>

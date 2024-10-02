<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/livro/getCategories.php");

$conn = connect();

if (isset($_GET["id"])) {
    $idU = $_GET["id"];

    $sqlU = "SELECT nome, username, descricao, imagem
FROM tb_usuarios
WHERE cod = " . $idU;

    $stmtU = $conn->prepare($sqlU);
    $stmtU->execute();
    $stmtU->store_result();
    $resultU = "";

    if ($stmtU->num_rows > 0) {
        $stmtU->bind_result($nome, $username, $desc, $img);
        while ($stmtU->fetch()) {
            $resultU .= '
                <div class="size3 pZero grid">
                    <img class="autorImagem" src="../SRC/fotos/usuario/' . htmlspecialchars($img) . '">
                </div>
                <div class="size9 livroInfoMain">
                    <div class="livroTituloSection borderBottom flexColumn contSection size8">
                        <div class="userNome"><span>' . htmlspecialchars($nome) . '</span>' . $username .'</div> 
                        <div class="flexColumn widthMax">
                        </div>
                    </div>
                    <div class="contSection livroDesc">
                        ' . nl2br(htmlspecialchars($desc)) . '
                    </div>
                </div>';
        }

        echo $resultU;
    } else {

    }
    ;
    $stmtU->close();
    $conn->close();
}
;
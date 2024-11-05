<?php
include_once("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");
include_once("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/livro/getCategories.php");

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
            $resultU .= '<div class="size3 pZero grid" style="justify-items: center;">';
            if ($img == null) {
                $resultU .= '<svg class="userPicture" data-v-5cba5096="" data-v-dd104bd2="" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" class="icon large text-icon-contrast text-undefined" id="avatar">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2m8-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8">
                    </path>
                    </svg>';
            } else {
                $resultU .= '<img class="autorImagem" src="../SRC/fotos/usuario/' . htmlspecialchars($img) . '">';
            }
            $resultU .= '</div>
                <div class="size9 livroInfoMain">
                    <div class="livroTituloSection borderBottom flexColumn contSection size8">
                        <div class="userNome"><span>' . htmlspecialchars($nome) . '</span>' . $username . '</div> 
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
    
if($_SESSION['id'] == $_GET['id']){
    echo 'teste';
}
    $stmtU->close();
    $conn->close();
}
;
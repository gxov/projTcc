<?php
include_once("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");


if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "No forum post specified.";
    exit;
}

$postId = intval($_GET['id']);
$conn = connect();


$sqlPost = "SELECT cod, nome, descricao, dtinicio 
            FROM tb_foruns WHERE cod = ?";
$stmtPost = $conn->prepare($sqlPost);
$stmtPost->bind_param("i", $postId);
$stmtPost->execute();
$stmtPost->store_result();
$stmtPost->bind_result($postId, $postTitle, $postContent, $postDate);

if ($stmtPost->num_rows > 0) {
    $stmtPost->fetch();

    echo '
    <div class="forumPost size6 flexColumn">
        <span class="forumTitle">' . htmlspecialchars($postTitle) . '</span>
        <span class="forumDate">Criado ' . date("j-m-y", strtotime($postDate)) . '</span>
        <div class="forumDesc">' . nl2br(htmlspecialchars($postContent)) . '</div>
        </div>';


    $sqlComments = "SELECT c.cod, c.conteudo, c.dtpostagem, u.cod, u.username, u.nome, u.imagem 
                    FROM tb_comentarios c
                    JOIN tb_usuarios u ON c.codusuario = u.cod
                    WHERE c.codforum = ?
                    ORDER BY c.cod DESC";
    $stmtComments = $conn->prepare($sqlComments);
    $stmtComments->bind_param("i", $postId);
    $stmtComments->execute();
    $stmtComments->bind_result($commentId, $commentContent, $commentDate, $commentAuthorCod, $commentAuthorUs, $commentAuthorNm, $commentAuthorImage);
    $stmtComments->store_result();
    echo '
    <div class="size5 forumCommentSection">
        <div class="forumSubtitle flex alignCenter"> Comentários </div>';
    if (isset($_SESSION['id'])) {
        echo '<form class="flexColumn" method="post" action="">
            <input type="hidden" name="commId" value="' . $postId . '">
            <textarea class="forumInput size12" name="commCont" placeholder="Faça um comentário!" required style="resize: none;"></textarea>
            <button class="forumBtn size2" type="submit" name="commSubmit">Publicar</button>
        </form>';
    }
    if ($stmtComments->num_rows > 0) {
        echo '<div class="forumCommentsList">';
        while ($stmtComments->fetch()) {
            echo '
            <div class="forumComment livroReview flex">';


            if ($commentAuthorImage != "") {
                echo '<div class="flexColumn alignCenter textAlignCenter avalAuthorSection">
                    <st1>' . nl2br(htmlspecialchars($commentDate)) . '</st1><img class="forumCommentImage size11" src="../SRC/fotos/usuario/' . $commentAuthorImage . '"><span class="reviewAuthor size12"><a class="flexColumn" href="usuario.php?id=' . $commentAuthorCod . '"><strong>' . htmlspecialchars($commentAuthorNm) . '</strong> <st1>' . $commentAuthorUs . '</st1></a></span></div>';
            } else {
                echo '<div class="flexColumn alignCenter textAlignCenter avalAuthorSection">
                    <st1>' . nl2br(htmlspecialchars($commentDate)) . '</st1><svg class="commentUserAvatar size11" data-v-5cba5096="" data-v-dd104bd2="" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="avatar">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2m8-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8">
                    </path>
                </svg><span class="reviewAuthor size3"><a class="flexColumn" href="usuario.php?id=' . $commentAuthorCod . '"><strong>' . htmlspecialchars($commentAuthorNm) . '</strong> <st1>' . $commentAuthorUs . '</st1></a></span></div>';
            }

            echo '<div class="commentContent size9 flexColumn">
                    ' . nl2br(htmlspecialchars($commentContent)) . '</div>';
            if ($_SESSION['tipo'] == 'ADM' || $commentAuthorCod == $_SESSION['id']) {
                echo '<form action="" method="POST"><input type="hidden" name="commIdDelete" value="' . $commentId . '"><input type="hidden" name="forumCod" value="' . $postId . '"><button class="deleteComment" type="submit" name="deleteSubmit">Deletar</button></form>';
            }
            echo '</div>';
        }
        echo '</div></div>';
    } else {
        if (isset($_SESSION['id'])) {
            echo '<p>Sem comentários ainda, seja o primeiro a comentar!</p></div>';
        } else {
            echo '<p>Sem comentários ainda, faça login para comentar!</p></div';
        }
    }
    $stmtComments->close();

} else {
    echo "Forum post not found.";
}

$stmtPost->close();
$conn->close();
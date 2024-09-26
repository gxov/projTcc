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


    $sqlComments = "SELECT c.conteudo, c.dtpostagem, u.nome 
                    FROM tb_comentarios c
                    JOIN tb_usuarios u ON c.codusuario = u.cod
                    WHERE c.codforum = ?
                    ORDER BY c.dtpostagem ASC";
    $stmtComments = $conn->prepare($sqlComments);
    $stmtComments->bind_param("i", $postId);
    $stmtComments->execute();
    $stmtComments->bind_result($commentContent, $commentDate, $commentAuthor);
    $stmtComments->store_result();
    echo '
    <div class="size5 forumCommentSection">
        <div class="forumSubtitle flex alignCenter"> Comentários </div>
        <form class="flexColumn" method="post" action="administrator/utils/forum/addComment.php">
            <input type="hidden" name="commId" value="' . $postId . '">
            <textarea class="forumInput size12" name="commCont" placeholder="Faça um comentário!" required style="resize: none;"></textarea>
            <button class="forumBtn size2" type="submit" name="commSubmit">Publicar</button>
        </form>';

    if ($stmtComments->num_rows > 0) {
        echo '<ul class="commentsList">';
        while ($stmtComments->fetch()) {
            echo '
            <li class="comment">
                <p><strong>' . htmlspecialchars($commentAuthor) . '</strong> on ' . date("F j, Y", strtotime($commentDate)) . '</p>
                <div class="commentContent">' . nl2br(htmlspecialchars($commentContent)) . '</div>
            </li>';
        }
        echo '</ul></div>';
    } else {
        echo '<p>Sem comentários ainda, seja o primeiro a comentar!</p></div>';
    }
    $stmtComments->close();

} else {
    echo "Forum post not found.";
}

$stmtPost->close();
$conn->close();
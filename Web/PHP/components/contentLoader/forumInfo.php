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
    <div class="forumPost flexColumn">
        <span class="forumTitle">' . htmlspecialchars($postTitle) . '</span>
        <span class="forumDate">Criado ' . date("j-m-y, H:i", strtotime($postDate)) . '</span>
        <div class="forumDesc">' . nl2br(htmlspecialchars($postContent)) . '</div>
        <div class="forumCommentSection"><div class="forumSubtitle"> Comentários </div>';


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


    if ($stmtComments->num_rows > 0) {
        echo '<ul class="commentsList">';
        while ($stmtComments->fetch()) {
            echo '
            <li class="comment">
                <p><strong>' . htmlspecialchars($commentAuthor) . '</strong> on ' . date("F j, Y, g:i a", strtotime($commentDate)) . '</p>
                <div class="commentContent">' . nl2br(htmlspecialchars($commentContent)) . '</div>
            </li>';
        }
        echo '</ul>';
    } else {
        echo '<p>No comments yet. Be the first to comment!</p>';
    }
    $stmtComments->close();


    echo '
        <form class="commentForm" method="post" action="add_comment.php">
            <input type="hidden" name="postId" value="' . $postId . '">
            <textarea name="commentContent" placeholder="Add a comment..." required></textarea>
            <button type="submit" name="submitComment">Post Comment</button>
        </form>
    </div>
    </div>';
} else {
    echo "Forum post not found.";
}

$stmtPost->close();
$conn->close();
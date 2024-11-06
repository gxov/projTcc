<?php
include_once("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");
$conn = connect();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['deleteSubmit'])) {
        $forumId = $_POST['forumCod'];
        $commId = $_POST['commIdDelete'];
        $query = "DELETE FROM tb_comentarios WHERE cod = ?";

        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("i", $commId);
            if ($stmt->execute()) {

                header("Location: forum.php?id=" . $forumId);
                exit();
            } else {
            }
            $stmt->close();
        } else {
        }
    } else {
    }
} else {
}

$conn->close();
?>
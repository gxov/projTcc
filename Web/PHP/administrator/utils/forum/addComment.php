<?php
include_once("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");
$conn = connect();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_SESSION['id']) && isset($_POST['commSubmit'])) {

        $userId = $_SESSION['id'];
        $forumId = $_GET['id'];
        $content = trim($_POST['commCont']);
        $date = date("Y-m-d");

        $query = "INSERT INTO tb_comentarios (codforum, codusuario, conteudo, dtpostagem) VALUES (?, ?, ?, ?)";

        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("iiss", $forumId, $userId, $content, $date);
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
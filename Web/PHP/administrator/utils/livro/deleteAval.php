<?php
include_once("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");
$conn = connect();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['deleteSubmit'])) {
        $livroId = $_POST['livroCod'];
        $avalId = $_POST['avalIdDelete'];
        $query = "DELETE FROM tb_avaliacoes WHERE cod = ?";

        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("i", $avalId);
            if ($stmt->execute()) {

                header("Location: produto.php?id=" . $livroId);
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
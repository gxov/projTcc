<?php
include_once("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");
$conn = connect();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_SESSION['id']) && isset($_POST['avaliacaoSubmit'])) {

        $userId = $_SESSION['id'];
        $livroId = $_POST['avaliacaoId'];
        $content = trim($_POST['avaliacaoCont']);
        $nota = $_POST['avaliacaoNota'];

        $query = "INSERT INTO tb_avaliacoes (codlivro, codusuario, descricao, nota) VALUES (?, ?, ?, ?)";

        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param("iiss", $livroId, $userId, $content, $date);
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
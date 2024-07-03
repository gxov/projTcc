<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");

session_start();

if (isset($_POST['login'])) {
    $value = $_POST['loginValue'];
    $password = $_POST['loginPassword'];
    $conn = connect();

    $sql = "SELECT cod, username, senha FROM tb_usuarios WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $value, $value);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $username, $hashed_password);
        $stmt->fetch();

        if ($hashed_password = $password) {
            $_SESSION['username'] = $username;
        } else {
        }
    } else {
    }

    $stmt->close();
    $conn->close();
}
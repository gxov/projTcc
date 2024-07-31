<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");
session_start();
if (isset($_POST['login'])) {
    $conn = connect();
    $value = $_POST['loginValue'];
    $password = md5($_POST['loginPassword']);
    
    $sql = "SELECT cod, username, senha, tipo FROM tb_usuarios WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $value, $value);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $username, $hashed_password, $tipo);
        $stmt->fetch();

        if ($password == $hashed_password) {
            $_SESSION['tipo'] = $tipo;
            $_SESSION['username'] = $username;
        } else {
            header("location: login.php");
        }
    } else {
    }
}
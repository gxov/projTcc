<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");

if (isset($_POST['register'])) {
    $conn = connect();
    $username = $_POST['registerUsername'];
    $email = $_POST['registerEmail'];
    $password = password_hash($_POST['registerPassword'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO tb_usuarios 
    (username, email, senha, ativo, tipo) 
    VALUES 
    (?, ?, ?, true, 'USR')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
    } else {
    }

    $stmt->close();
    $conn->close();
}
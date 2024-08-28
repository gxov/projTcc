<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");

if (isset($_POST['register'])) {
    $conn = connect();
    $username = $_POST['registerUsername'];
    $email = $_POST['registerEmail'];
    $password = md5($_POST['registerPassword']);
    $passwordCnf = md5($_POST['registerPasswordCnf']);

    if($password == $passwordCnf){
    $sql = "INSERT INTO tb_usuarios 
    (username, email, senha, ativo, tipo) 
    VALUES 
    (?, ?, ?, true, 'USR')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
    } else {
    }
    };

    $stmt->close();
    $conn->close();
}
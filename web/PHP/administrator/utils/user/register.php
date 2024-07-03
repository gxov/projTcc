<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");

if (isset($_POST['register'])) {
    $username = $_POST['registerUsername'];
    $password = password_hash($_POST['registerPassword'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO tb_usuarios 
    (nome, username, cpf, email, senha, ativo, tipo) 
    VALUES 
    (?, ?, ?, ?, ?, true, 'USR')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiss", $username, $password);

    if ($stmt->execute()) {
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
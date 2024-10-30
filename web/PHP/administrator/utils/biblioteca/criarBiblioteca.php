<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['submit'])) {
        $nome = $_POST["nome"];
        unset($_POST['submit']);
        $conn = connect();
        $sql = "INSERT INTO tb_bibliotecas (ativo, nome, codusuario) VALUES (true, ".$nome.", ".$_SESSION['cod'].");";

        $tsql = $conn->prepare($sql);
        $tsql->execute();

        $tsql->close();
        $conn->close();
        exit();
    }
}
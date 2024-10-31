<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $nome = $_POST["nome"];
        unset($_POST['submit']);
        $conn = connect();
        $sql = "INSERT INTO tb_bibliotecas (ativo, nome, codusuario) VALUES (true, '".$nome."', ".$_SESSION['id'].");";

        $tsql = $conn->prepare($sql);
        $tsql->execute();

        $tsql->close();
        $conn->close();
        exit();
    }
    if (isset($_POST['submitDel'])){
        $cod = $_POST["cod"];
        unset($_POST['submitDel']); 
        $conn = connect();
        $sql = "DELETE FROM tb_livros_bibliotecas WHERE codbiblioteca=".$cod.";";
        $tsql = $conn->prepare($sql);
        $tsql->execute();

        $sql2 = "DELETE FROM tb_bibliotecas WHERE cod=".$cod.";";
        $tsql2 = $conn->prepare($sql2);
        $tsql2->execute();

        $tsql->close();
        $conn->close();
        exit();
    }
}
<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");

if (isset($_POST['update'])) {
    $conn = connect();
    
    $cod = $_POST["codUpd"];
    $nome = $_POST["nomeUpd"];
    $ativo = $_POST["ativoUpd"];

    $table = $_POST["tipoUpd"];

    // Update fields for `tb_livros`
    if ($table === 'livro') {

        // Update `tb_livros`
        $sql = "UPDATE tb_categorias
                SET nome = ?, ativo = ?
                WHERE cod = ?";

        $tsql = $conn->prepare($sql);
        $tsql->bind_param("sii", $nome, $ativo, $cod);
        $tsql->close();

    }

    elseif ($table === 'forum') {
        $sql = "UPDATE tb_categoriasforum
                SET nome = ?, ativo = ?
                WHERE cod = ?";

        $tsql = $conn->prepare($sql);
        $tsql->bind_param("sii", $titulo, $ativo, $cod);
        $tsql->close();

    }

    $conn->close();
}
?>
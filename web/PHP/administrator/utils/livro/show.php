<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");
//logica de criação para livro



function show()
{
    echo "asdadsa";
    $cod = $_POST["codDelete"];
    $conn = connect();

    $sql = "SELECT titulo, ativo FROM tb_livros WHERE cod =" . $cod;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        ?>
        <script>
            var codInt = document.getElementById("codDelete");
            var ativo = document.getElementById("ativoDelete");
            var titulo = document.getElementById("tituloDelete");



        </script>
        <?php
        while ($row = $result->fetch_assoc()) {
            foreach ($row as $key => $dado) {
                if ($key == 'titulo') {

                    ?>
                    <script>
                       titulo.value = <?php $dado; ?>
                    </script>
                    <?php

                } elseif ($key == 'ativo') {
                    ?>
                    <script>
                       ativo.value = <?php $dado; ?>
                    </script>
                    <?php
                }
                ;
            }
        }
    }
}


?>
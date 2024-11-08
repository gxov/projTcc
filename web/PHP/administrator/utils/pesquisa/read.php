<?php
include_once("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");
function select($table)
{
    $conn = connect();
    switch ($table) {
        case "tb_autores":
            $columns = "cod, ativo, nome, imagem";
            $ln = "autor";
            $fl = "fotos/autores";
            break;
        case "tb_livros":
            $columns = "cod, ativo, nome, descricao, imagem";
            $ln = "produto";
            $fl = "capas";
            break;
        case "tb_usuarios":
            $columns = "cod, ativo, nome, username, imagem";
            $ln = "usuario";
            $fl = "fotos/usuario";
            break;
        case "tb_foruns":
            $columns = "cod, ativo, nome, descricao";
            $ln = "forum";
            break;

    }
    ;
    $sql = "SELECT " . $columns . "  FROM " . $table;
    $result = $conn->prepare($sql);
    $result->execute();

    $items = "";

    switch ($table) {
        case "tb_foruns":
            $result->bind_result($cod, $ativo, $nome, $descricao);
            break;
        case "tb_livros":
            $result->bind_result($cod, $ativo, $nome, $descricao, $imagem);
            break;
        case "tb_usuarios":
            $result->bind_result($cod, $ativo, $nome, $username, $imagem);
            break;
        case "tb_autores":
            $result->bind_result($cod, $ativo, $nome, $imagem);
            break;
    }
    ;
    while ($result->fetch()) {

        if ($ativo = 1) {
            $items .= "<div class='sectionCardRow flex size11'>";

            if (isset($imagem)) {
                $items .= "<div class='sectionCardColumnCapa'>
                        <img class='sectionCardColumnImg' src='../SRC/" . $fl . "/" . $imagem . "'>
                        </div>";
                if ($imagem == "") {
                    "<div class='sectionCardColumnCapa'>
                        <svg class='acessoUserFoto' data-v-5cba5096='' data-v-dd104bd2='' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' id='avatar'>
                        <path stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2m8-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8'>
                        </path>
                        </svg>
                        </div>";
                }

            }
            ;
            $items .= "<div class='sectionCardRowTitulo'><a href='" . $ln . ".php?id=" . $cod . "'>" . $nome;
            if (isset($username)) {
                $items .= "<st1>" . $username . "</st1>";
            }
            $items .= "</a></div>";
            $items .= "</div>";
        }
    }
    ;
    ;

    echo $items;
}
;
function selectFiltered($table)
{

    switch ($table) {
        case "tb_autores":
            $columns = "cod, ativo, nome, descricao, imagem";
            $ln = "autor";
            $fl = "fotos/autores";
            break;
        case "tb_livros":
            $columns = "cod, ativo, nome, descricao, imagem";
            $ln = "produto";
            $fl = "capas";
            break;
        case "tb_usuarios":
            $columns = "cod, ativo, nome, username, imagem";
            $ln = "usuario";
            $fl = "fotos/usuario";
            break;
        case "tb_foruns":
            $columns = "cod, ativo, nome, descricao";
            $ln = "forum";
            break;

    }

    $dom = new DOMDocument('1.0', 'iso-8859-1');
    $dom->validateOnParse = true;

    $filteredValue = $_GET["search"];
    $conn = connect();

    $split = explode('=', $filteredValue, 6);

    if (count($split) > 1) {
        $sql = '';
        $sql = 'SELECT '.$columns.' FROM ' . $table . ' WHERE ' . $split[0] . ' LIKE ' . "'%" . $split[1] . "%';";

        $result = $conn->prepare($sql);
        $result->execute();
        switch ($table) {
            case "tb_foruns":
                $result->bind_result($cod, $ativo, $nome, $descricao);
                break;
            case "tb_livros":
                $result->bind_result($cod, $ativo, $nome, $descricao, $imagem);
                break;
            case "tb_usuarios":
                $result->bind_result($cod, $ativo, $nome, $username, $imagem);
                break;
            case "tb_autores":
                $result->bind_result($cod, $ativo, $nome, $descricao, $imagem);
                break;
        };
    } else {
        $sql = 'SELECT '.$columns.' FROM ' . $table . " WHERE nome LIKE '%" . $filteredValue . "%' OR cod LIKE '%" . $filteredValue . "%';";

        $result = $conn->prepare($sql);
        $result->execute();
        switch ($table) {
            case "tb_foruns":
                $result->bind_result($cod, $ativo, $nome, $descricao);
                break;
            case "tb_livros":
                $result->bind_result($cod, $ativo, $nome, $descricao, $imagem);
                break;
            case "tb_usuarios":
                $result->bind_result($cod, $ativo, $nome, $username, $imagem);
                break;
            case "tb_autores":
                $result->bind_result($cod, $ativo, $nome, $descricao, $imagem);
                break;
        }
        ;
    }


    $filteredItems = '';

    while ($result->fetch()) {

        if ($ativo = 1) {
            $filteredItems .= "<div class='sectionCardRow flex size11'>";

            if (isset($imagem)) {
                $filteredItems .= "<div class='sectionCardColumnCapa'>
                    <img class='sectionCardColumnImg' src='../SRC/" . $fl . "/" . $imagem . "'>
                    </div>";
                if ($imagem == "") {
                    "<div class='sectionCardColumnCapa'>
                    <svg class='acessoUserFoto' data-v-5cba5096='' data-v-dd104bd2='' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' id='avatar'>
                    <path stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2m8-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8'>
                    </path>
                    </svg>
                    </div>";
                }

            }
            ;
            $filteredItems .= "<div class='sectionCardRowContent'><div class='sectionCardRowTitulo'><a href='" . $ln . ".php?id=" . $cod . "'>" . $nome;
            if (isset($username)) {
                $filteredItems .= "<br><st1>" . $username . "</st1>";
            }
            $filteredItems .= "</a></div>";
            if (isset($descricao)){
                $filteredItems .= "<div class='sectionRowDesc'>".$descricao."</div>";
            }
            
            $filteredItems .= "</div></div>";
        }
    }
    ;

    echo $filteredItems;
}
;


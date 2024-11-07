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
        };
        while ($result->fetch()) {

            if ($ativo = 1) {
                $items .= "<div class='sectionCardRow flex size5'>";

                if (isset($imagem)) {
                    $items .= "<div class='sectionCardColumnCapa'>
                        <img class='sectionCardColumnImg' src='../SRC/".$fl."/" . $imagem . "'>
                        </div>";
                    if ($imagem == ""){
                        "<div class='sectionCardColumnCapa'>
                        <svg class='acessoUserFoto' data-v-5cba5096='' data-v-dd104bd2='' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' id='avatar'>
                        <path stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2m8-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8'>
                        </path>
                        </svg>
                        </div>";
                    }
                    
                };
                $items .="<div class='sectionCardRowTitulo'><a href='".$ln.".php?id=".$cod."'>".$nome;
                if(isset($username)){$items .="<st1>".$username."</st1>";}
                $items .="</a></div>";
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

    $dom = new DOMDocument('1.0', 'iso-8859-1');
    $dom->validateOnParse = true;

    $filteredValue = $_GET["search"];
    $conn = connect();

    $split = explode('=', $filteredValue, 6);

    if (count($split) > 1) {
        $sql = '';
        $sql = 'SELECT * FROM ' . $table . ' WHERE ' . $split[0] . ' LIKE ' . "'%" . $split[1] . "%';";

        $tsql = $conn->prepare($sql);
        $tsql->execute();
        $result = $tsql->get_result();
    } else {
        $sql = 'SELECT * FROM ' . $table . " WHERE nome LIKE '%" . $filteredValue . "%' OR cod LIKE '%" . $filteredValue . "%';";

        $tsql = $conn->prepare($sql);
        $tsql->execute();
        $result = $tsql->get_result();
    }


    $filteredItems = '';

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $filteredItems .= "<div class='tableBookRow tableForumSpacing' style='height: 100px'>";
            foreach ($row as $key => $dado) {
                if ($key == 'ativo' && $dado == '1') {
                    $dado = 'true';
                } elseif ($key == 'ativo' && $dado == '0') {
                    $dado = 'false';
                }
                ;

                if ($key == 'cod') {
                    $filteredItems .= "<div id='" . $key . "' class='tableValue'><a target='_blank' href='forum.php?id=" . $dado . "'>" . $dado . " </a></div>";
                } elseif ($key != 'senha' and $key != 'dtnasc') {
                    $filteredItems .= "<div id='" . $key . "' class='tableValue'> " . $dado . " </div>";
                }
            }
            ;
            $filteredItems .= "</div>";
        }
        ;
    } else {
    }
    ;

    echo $filteredItems;
}
;


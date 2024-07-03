<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");

function select($table)
{
    $conn = connect();
    $sql = "SELECT * FROM " . $table;
    $result = $conn->query($sql);

    $items = "";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $items .= "<div class='tableBookRow'>";
            foreach ($row as $key => $dado) {
                if ($key == 'ativo' && $dado == '1') {
                    $dado = 'sim';
                } elseif ($key == 'ativo' && $dado == '0') {
                    $dado = 'não';
                }
                ;

                if ($key == 'imagem') {
                    $items .= "<div id='" . $key . "' class='tableValue'><a target='_blank' href='http://localhost:8089/projTcc/Web/src/fotos/usuario/" . $dado . "'>" . $dado . " </a></div>";
                } elseif ($key != 'senha') {
                    $items .= "<div id='" . $key . "' class='tableValue'> " . $dado . " </div>";
                }
            }
            ;
            $items .= "</div>";
        }
        ;
    } else {
        $items .= "<div class='tableBookRow'>";
        $items = "<div><div class='tableValue'> NULL </div><div class='tableValue'> NULL </div><div class='tableValue'> NULL </div></div>";
        $items .= "</div>";
    }
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
        $sql = 'SELECT * FROM ' . $table . ' WHERE nome LIKE ' . "'%" . $filteredValue . "%' OR cod LIKE " . "'%" . $filteredValue . "%';";

        $tsql = $conn->prepare($sql);
        $tsql->execute();
        $result = $tsql->get_result();
    }


    $filteredItems = '';

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $filteredItems .= "<div class='tableBookRow'>";
            foreach ($row as $key => $dado) {
                if ($key == 'ativo' && $dado == '1') {
                    $dado = 'true';
                } elseif ($key == 'ativo' && $dado == '0') {
                    $dado = 'false';
                };
                
                if ($key == 'imagem') {
                    $filteredItems .= "<div id='" . $key . "' class='tableValue'><a target='_blank' href='http://localhost:8089/projtcc/web/src/fotos/usuario/" . $dado . "'>" . $dado . " </a></div>";
                } elseif ($key != 'senha') {
                    $filteredItems .= "<div id='" . $key . "' class='tableValue'> " . $dado . " </div>";
                }
            };
            $filteredItems .= "</div>";
        };
    } else {
        $filteredItems .= "<div class='tableBookRow'>";
        $filteredItems .= "
            <div class='tableValue'> NULL </div>
            <div class='tableValue'> NULL </div>
            <div class='tableValue'> NULL </div>
            <div class='tableValue'> NULL </div>
            <div class='tableValue'> NULL </div>";
        $filteredItems .= "</div>";
    }
    ;

    echo $filteredItems;
}
;

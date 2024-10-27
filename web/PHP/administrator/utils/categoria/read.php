<?php
include_once("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");

function select($table1, $table2)
{
    $conn = connect();
    
    $sql = "
        SELECT cod, nome, ativo FROM $table1
        UNION
        SELECT cod, nome, ativo FROM $table2
        ORDER BY nome ASC;
    ";
    
    $result = $conn->query($sql);
    $items = "";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $items .= "<div class='tableBookRow tableCatSpacing'>";
            foreach ($row as $key => $dado) {
                if ($key == 'ativo' && $dado == '1') {
                    $dado = 'sim';
                } elseif ($key == 'ativo' && $dado == '0') {
                    $dado = 'não';
                }

                $items .= "<div id='" . $key . "' class='tableValue'>" . htmlspecialchars($dado) . "</div>";
            }
            $items .= "</div>";
        }
    } else {
        $items = "<div>No results found</div>";
    }

    echo $items;
}

function selectFiltered($table1, $table2)
{
    $conn = connect();
    $filteredValue = $_GET["search"];

    $sql = "
        SELECT cod, nome, ativo FROM $table1 WHERE nome LIKE ? OR cod LIKE ?
        UNION
        SELECT cod, nome, ativo FROM $table2 WHERE nome LIKE ? OR cod LIKE ?
        ORDER BY nome ASC;
    ";

    $tsql = $conn->prepare($sql);
    $likeValue = "%" . $filteredValue . "%";
    
    $tsql->bind_param("ssss", $likeValue, $likeValue, $likeValue, $likeValue);
    $tsql->execute();
    $result = $tsql->get_result();

    $filteredItems = "";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $filteredItems .= "<div class='tableBookRow tableCatSpacing'>";
            foreach ($row as $key => $dado) {
                if ($key == 'ativo' && $dado == '1') {
                    $dado = 'sim';
                } elseif ($key == 'ativo' && $dado == '0') {
                    $dado = 'não';
                }

                $filteredItems .= "<div id='" . $key . "' class='tableValue'>" . htmlspecialchars($dado) . "</div>";
            }
            $filteredItems .= "</div>";
        }
    } else {
        $filteredItems = "<div>No results found for '$filteredValue'</div>";
    }

    echo $filteredItems;
}

?>

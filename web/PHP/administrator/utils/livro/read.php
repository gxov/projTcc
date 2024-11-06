<?php
include_once("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");



function select($table)
{
    $conn = connect();
    $sql = "SELECT * FROM " . $table;
    $result = $conn->query($sql);

    $items = "";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $idprod = null;
            $items .= "<div class='tableBookRow tableBookSpacing'>";
            foreach ($row as $key => $dado) {
                if ($table == 'tb_livros' && $key == 'cod') {
                    $sqlA1 = "SELECT codautor FROM tb_livros_autores WHERE codlivro = ?";
                    $stmtA1 = $conn->prepare($sqlA1);
                    $stmtA1->bind_param("i", $dado);
                    $stmtA1->execute();
                    $stmtA1->bind_result($idA);
                    $stmtA1->fetch();
                    $idprod = $dado;
                    $stmtA1->close();

                    $sqlC = "SELECT c.nome FROM tb_categorias c 
                             INNER JOIN tb_categorias_livros lc ON c.cod = lc.codcategoria 
                             WHERE lc.codlivro = ?";
                    $stmtC = $conn->prepare($sqlC);
                    $stmtC->bind_param("i", $dado);
                    $stmtC->execute();
                    $stmtC->bind_result($categoryName);
                    $categories = [];
                    while ($stmtC->fetch()) {
                        $categories[] = $categoryName;
                    }
                    $stmtC->close();

                    
                }
                ;

                if ($key == 'ativo' && $dado == '1') {
                    $dado = 'sim';
                } elseif ($key == 'ativo' && $dado == '0') {
                    $dado = 'não';
                }
                ;

                if ($key == 'imagem') {
                    $items .= "<div id='" . $key . "' class='tableValue'><a target='_blank' href='../src/capas/" . $dado . "'>" . $dado . " </a></div>";
                } elseif ($table == 'tb_livros' && $key == 'nome') {
                    $items .= "<div id='" . $key . "' class='tableValue'> <a href='produto.php?id=" . $idprod . "'> " . $dado . " </a> </div>";
                } elseif ($table == 'tb_livros' && $key == 'arquivo') {
                    $items .= "<div id='" . $key . "' class='tableValue'> <a target='_blank' href='../src/livros/" . $dado . "'> " . $dado . " </a> </div>";
                } else {
                    $items .= "<div id='" . $key . "' class='tableValue'> " . $dado . " </div>";
                }
                
                

            }
            if (!empty($categories)) {
                $items .= "<div class='tableValue' id='categories'><ul style='overflow-y: scroll;margin: 0; padding-left: 20px;'>";
                foreach ($categories as $category) {
                    $items .= "<li>" . htmlspecialchars($category) . "</li>";
                }
                $items .= "</ul></div>";
            } else {
                $items .= "<div class='tableValue' id='categories'>Sem categorias</div>";
            }
            ;
            if ($table == 'tb_livros') {
                $items .= "<div class='tableValue' id='codautor'> <a href='autor.php?id=" . $idA . "'>" . $idA . "</a></div>";
                $items .= "</div>";
            }
            
            
            ;
        }
        ;
    } else {
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
            $filteredItems .= "<div class='tableBookRow tableBookSpacing'>";
            foreach ($row as $key => $dado) {
                if ($table == 'tb_livros' && $key == 'cod') {
                    $sqlA1 = "SELECT codautor FROM tb_livros_autores WHERE codlivro = ?";
                    $stmtA1 = $conn->prepare($sqlA1);
                    $stmtA1->bind_param("i", $dado);
                    $stmtA1->execute();
                    $stmtA1->bind_result($idA);
                    $stmtA1->fetch();
                    $stmtA1->close();
                    $idprod = $dado;
                }



                if ($key == 'ativo' && $dado == '1') {
                    $dado = 'true';
                } elseif ($key == 'ativo' && $dado == '0') {
                    $dado = 'false';
                }
                ;

                if ($key == 'imagem') {
                    $filteredItems .= "<div id='" . $key . "' class='tableValue'><a target='_blank' href='projtcc/web/src/capas/" . $dado . "'>" . $dado . " </a></div>";
                } elseif ($table == 'tb_livros' && $key == 'nome') {
                    $filteredItems .= "<div id='" . $key . "' class='tableValue'> <a href='produto.php?id='" . $idprod . "'> " . $dado . " </a> </div>";
                } else {
                    $filteredItems .= "<div id='" . $key . "' class='tableValue'> " . $dado . " </div>";
                }
            }
            ;
            if ($table == 'tb_livros') {
                $filteredItems .= "<div class='tableValue' id='codautor'> <a href='autor.php?id=" . $idA . "'>" . $idA . "</a></div>";
                $filteredItems .= "</div>";
            }
            ;
        }
        ;
    } else {

    }
    ;

    echo $filteredItems;
}
;


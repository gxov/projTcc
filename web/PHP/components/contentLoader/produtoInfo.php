<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/livro/getCategories.php");

$conn = connect();

if (isset($_GET["id"])) {
    $idL = $_GET["id"];

    $sqlA1 = "SELECT codautor FROM tb_livros_autores WHERE codlivro = ?";
    $stmtA1 = $conn->prepare($sqlA1);
    $stmtA1->bind_param("i", $idL);
    $stmtA1->execute();
    $stmtA1->bind_result($idA);
    $stmtA1->fetch();
    $stmtA1->close();
    
    $sqlA2 = "SELECT nome FROM tb_autores WHERE cod = ?";
    $stmtA2 = $conn->prepare($sqlA2);
    $stmtA2->bind_param("i", $idA);
    $stmtA2->execute();
    $stmtA2->bind_result($nomeA);
    $stmtA2->fetch();
    $stmtA2->close();


    $sqlB = "SELECT nome, descricao, imagem
FROM tb_livros
WHERE cod = " . $idL;

    $stmtB = $conn->prepare($sqlB);
    $stmtB->execute();
    $stmtB->store_result();
    $result = "";

    if ($stmtB->num_rows > 0) {
        $stmtB->bind_result($title, $desc, $img);
        while ($stmtB->fetch()) {
            $categories = getBookCategories($conn, $idL);
            $result .= '
                <div class="size5 pZero grid">
                    <img class="livroCapa" src="../SRC/capas/' . htmlspecialchars($img) . '">
                </div>
                <div class="size7 livroInfoMain">
                    <div class="livroTituloSection flexColumn contSection size12">
                        <div class="livroTitulo">' . htmlspecialchars($title) . '</div>
                        <div class="flexColumn widthMax">
                        
                        <div class="livroAutor">
                            <a href="autor.php?id='. $idA .'">
                            '. $nomeA .'
                            </a>
                        </div>
                        <div class="livroUserInfo">
                            <div class="livroAvaliacaoSection">
                                <svg data-v-4c681a64="" xmlns="http://www.w3.org/2000/svg" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="svgAvaliacao"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="m12 2 3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01z">
                                    </path>
                                </svg>
                                9.06
                            </div>
                            <div class="livroAvaliacaoSection">
                                <svg data-v-4c681a64="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    class="svgAvaliacao">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 21-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                                </svg>
                                2.000
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="contSection borderBottom">
                        <div class="size12 livroRowCategorias">';
                        foreach ($categories as $category) {
                            $result .= '<div class="badgeCategoria">' . htmlspecialchars($category) . '</div>';
                        }
                        $result .= '
                        </div>
                    </div>
                    <div class="contSection livroBtnRow">
                        <button class="livroBtn">
                            Adicionar á Biblioteca
                        </button>
                        <button class="livroBtn2">
                            <svg data-v-4c681a64="" data-v-a7c5fe37="" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24" class="svgLivroBtn">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="contSection livroDesc">
                        ' . nl2br(htmlspecialchars($desc)) . '
                    </div>
                </div>';
        }

        echo $result;
    }else{

    }
    ;
    $stmtB->close();
    $conn->close();
}
;
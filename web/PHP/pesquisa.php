<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link href="../CSS/styleRecursos.css" rel="stylesheet">
    <link href="../CSS/styleComponentes.css" rel="stylesheet">
    <link href="../CSS/style.css" rel="stylesheet">
    <link rel="icon" href="../SRC/svg/logo.png" />
    <?php
    session_start();
    include_once("administrator/utils/pesquisa/read.php");
    ?>


</head>

<body class="conteudo">
    <!-- side nav -->

    <div class="sideNavTransition sideNav contFluid sideNavHide flexColumn sideNavShow" id="sideNav"
        style="opacity: 1; width: 0;">
        <?php include_once("components/sidenav.php"); ?>
    </div>
    <div class="contFluid mainContent overflowHide" id="main">

        <!-- cabeçalho -->
        <?php include_once('components/topnav.php') ?>

        <div class="contBackground overflowHide">
        </div>
        <!-- conteúdo -->
        <div class="contFluid" style="margin-top: -8%;">
            <div class="contMainBorder contSection">
                <div class="size12 controlResultsContainer">
                    <div class="searchPageBarContainer justifyContCent flex">
                        <form method="GET" action="" class="searchPageBarOut">
                            <input type="text" name="search" class="searchPageBarIn">
                            <input type="submit" value="" class="flex"
                                style="background:none; border: none; position: absolute;">
                            </input>
                        </form>
                    </div>
                    <div class="flexColumn size12">
                        <div class="flex">
                            <div class="pesquisaScroll size6">
                                <div id="results">

                                    <?php
                                    if (isset($_GET['search'])) {
                                        selectFiltered("tb_autores");
                                    } else {
                                        select("tb_autores");
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="pesquisaScroll size6">
                                <div id="results">

                                    <?php
                                    if (isset($_GET['search'])) {
                                        selectFiltered("tb_livros");
                                    } else {
                                        select("tb_livros");
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="pesquisaScroll size6">
                                <div id="results">

                                    <?php
                                    if (isset($_GET['search'])) {
                                        selectFiltered("tb_usuarios");
                                    } else {
                                        select("tb_usuarios");
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="pesquisaScroll size6">
                                <div id="results">

                                    <?php
                                    if (isset($_GET['search'])) {
                                        selectFiltered("tb_foruns");
                                    } else {
                                        select("tb_foruns");
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rodapé
        <div class="contSection">
            rodapé
        </div> -->
    </div>
    </div>
    <script src="../JS/interface.js"></script>
    <script src="../JS/user.js"></script>
</body>

</html>
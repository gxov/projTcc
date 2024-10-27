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
    include_once("administrator/utils/categoria/read.php");
    include_once("administrator/utils/categoria/insert.php");
    include_once("administrator/utils/categoria/delete.php");
    include_once("administrator/utils/categoria/update.php");
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
                <div class="size8 controlResultsContainer">
                    <div class="searchPageBarContainer justifyContCent flex">
                        <form method="GET" action="" class="searchPageBarOut">
                            <input type="text" name="search" class="searchPageBarIn">
                            <input type="submit" value="" class="flex"
                                style="background:none; border: none; position: absolute;">
                            </input>
                        </form>
                    </div>
                    <div>
                        <div style="width: 100% !important" class="tableSection">
                            <div class="containerComplement tableCatSpacing">
                                <div class="tableCodMin">
                                    cod
                                </div>
                                <div class="tableTituloMin">
                                    nome
                                </div>
                                <div class="tableTituloMin">
                                    ativo
                                </div>
                            </div>
                        </div>
                        <div style="width: 100% !important" id="results">

                            <?php
                            if (isset($_GET['search'])) {
                                selectFiltered("tb_categorias", "tb_forumcategorias");
                            } else {
                                select("tb_categorias", "tb_forumcategorias");
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="size4">
                    <div class="controlAcessButtons flex">
                        <button id="adminCreateBtn" class="controlShowBtn controlShowBorder" style="z-index: 7;"
                            onclick="controlShow('create')">
                            Criar
                        </button>
                        <button id="adminUpdateBtn" class="controlShowBtn controlShowBorder"
                            style="z-index: 6; margin-left: -2px" onclick="controlShow('update')">
                            Atualizar
                        </button>
                        <button id="adminDeleteBtn" class="controlShowBtn controlShowBorder"
                            style="z-index: 5; margin-left: -2px" onclick="controlShow('delete')">
                            Deletar
                        </button>
                    </div>


                    <div id="adminCreate" class="controlEditContainer controlBackgroundStart">
                        <div class="controlTitulo">
                            <t3>Criar</t3>
                        </div>
                        <form method="POST" enctype="multipart/form-data" action="" class="controlForm flexColumn">
                            <div class="controlInputSection">
                                <label class="controlLabel" for="nome">Nome:</label>
                                <input class="controlInput size12" type="text" name="nome" id="nome" required>
                            </div>
                            <div class="controlInputSection flex">
                                <div class="size5 flexColumn">
                                    <label class="controlLabel" for="tipo">Tipo:</label>
                                    <div class="flex">
                                        Livro
                                        <input class="controlRadio size10" type="radio" value="livro" name="tipo"
                                            id="tipo" required>
                                    </div>
                                    <div class="flex">
                                        Fórum
                                        <input class="controlRadio size10" type="radio" value="forum" name="tipo"
                                            id="tipo" required>
                                    </div>
                                </div>
                            </div>
                            <div class="controlInputSection flexColumn">
                                <div>
                                    <input class="controlBtn" type="submit" name="submit" value="Criar">
                                    <input class="controlBtn" type="reset" value="Limpar">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="adminUpdate" style="display: none;" class="controlEditContainer controlBackgroundMiddle">
                        <div class="controlTitulo">
                            <t3>Atualizar</t3>
                        </div>
                        <form method="POST" action="" class="controlForm flexColumn">
                            <div class="controlInputSection flex">
                                <div class="size6">
                                    <label class="controlLabel" for="codUpd">Código da Categoria:</label>
                                    <input class="controlInput size10" type="text" name="codUpd">
                                </div>
                            </div>

                            <div class="controlInputSection flex">
                                <div class="size5 flexColumn">
                                    <label class="controlLabel" for="tipoUpd">Tipo:</label>
                                    <div class="flex">
                                        Livro
                                        <input class="controlRadio size10" type="radio" value="1" name="tipoUpd"
                                            id="tipoUpd" required>
                                    </div>
                                    <div class="flex">
                                        Fórum
                                        <input class="controlRadio size10" type="radio" value="2" name="tipoUpd"
                                            id="tipoUpd" required>
                                    </div>
                                </div>

                                <div class="size5 flexColumn">
                                    <label class="controlLabel" for="ativoUpd">Ativo:</label>
                                    <div class="flex">
                                        Sim
                                        <input class="controlRadio size10" type="radio" value="true" name="ativoUpd"
                                            id="ativoUpd" required>
                                    </div>
                                    <div class="flex">
                                        Não
                                        <input class="controlRadio size10" type="radio" value="false" name="ativoUpd"
                                            id="ativoUpd" required>
                                    </div>
                                </div>
                            </div>

                            <div class="controlInputSection">
                                <label class="controlLabel" for="nomeUpd">Nome:</label>
                                <input class="controlInput size12" type="text" name="nomeUpd" id="nomeUpd" required>
                            </div>

                            <div class="controlInputSection flexColumn">
                                <div>
                                    <input class="controlBtn" type="submit" name="update" value="Atualizar">
                                    <input class="controlBtn" type="reset" value="Limpar">
                                </div>
                            </div>
                        </form>

                    </div>
                    <div id="adminDelete" style="display: none;" class="controlEditContainer controlBackgroundEnd">
                        <div class="controlTitulo">
                            <t3>Deletar</t3>
                        </div>
                        <form method="POST" action="" class="controlForm flexColumn">
                            <div class="controlInputSection flex">
                                <div class="size6">
                                    <label class="controlLabel" for="codDelete">Código da categoria:</label>
                                    <input class="controlInput size10" type="text" name="codDelete">
                                </div>
                            </div>
                            <div class="controlInputSection flexColumn">
                                <div>
                                    <input class="controlBtn" type="submit" name="delete" value="Deletar">
                                    <input class="controlBtn" type="reset" value="Limpar">
                                </div>
                            </div>
                        </form>
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
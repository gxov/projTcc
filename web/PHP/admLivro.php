<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="../CSS/styleRecursos.css" rel="stylesheet">
    <link href="../CSS/styleComponentes.css" rel="stylesheet">
    <link href="../CSS/style.css" rel="stylesheet">
    <link rel="icon" href="../SRC/svg/logo.png" />
    <?php
    session_start();
    include_once ("administrator/utils/livro/read.php");
    include_once ("administrator/utils/livro/insert.php");
    include_once ("administrator/utils/livro/delete.php");
    include_once ("administrator/utils/livro/update.php");
    ?>


</head>

<body class="conteudo">
    <!-- side nav -->

    <div class="sideNavTransition sideNav contFluid sideNavHide flexColumn sideNavShow" id="sideNav"
        style="opacity: 1; width: 0;">
        <div class="sideNavClose alignSlfEnd">
            <span onclick="closeNav()">
                <svg data-v-4c681a64="" data-v-a31e942f="" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24" class="svgSideNavClose">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M18 6 6 18M6 6l12 12"></path>
                </svg>
            </span>
        </div>
        <div class="contSection sideNavSection size10">
            <a href="index.php">
                Início
            </a>
        </div>
        <div class="contSection sideNavSection size10">
            Busca
        </div>
        <div class="contSection sideNavSection size10">
            Comunidade
        </div>
        <div class="contSection sideNavSection size10">
            <a href="admLivro.php">
                Administrador - Livros </a>


        </div>
        <div class="contSection sideNavSection size10">
            <a href="admUser.php">
                Administrador - Usuários </a>
        </div>
    </div>
    <div class="contFluid mainContent overflowHide" id="main">

        <!-- cabeçalho -->
        <div class="contFluid mainNav" id="mainNav">
            <div class="mainNavBackground" id="mainNavBg">
                <div class="contSection alignCenter">
                    <div class="size2 flex">
                        <div class="sideNavBtn">
                            <span onclick="openNav()">
                                <img class="svgMenu" src="../SRC/svg/menu.svg" />
                            </span>
                        </div>
                        <a class="logoLink flex" href="index.php">
                            <div class="logoSection flex">
                                <svg class="logoSvgSection" width="60px" height="50px" viewBox="0 0 76.636292 60.752193"
                                    version="1.1" id="svg1" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                                    xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
                                    <g inkscape:label="Camada 1" inkscape:groupmode="layer" id="layer1"
                                        transform="translate(-94.289385,-66.425482)">
                                        <path class="logoSvgFill"
                                            style="fill-opacity:1;stroke:none;stroke-width:0.264583;stroke-opacity:1"
                                            d="m 94.968459,127.17767 23.789281,-1.40688 15.94901,-26.855332 20.63397,-32.48998 -17.14227,1.023193 -17.11057,28.456837 z"
                                            id="path1" sodipodi:nodetypes="ccccccc" inkscape:export-filename="logo.svg"
                                            inkscape:export-xdpi="96" inkscape:export-ydpi="96" />
                                        <path class="logoSvgFill"
                                            style="fill-opacity:1;stroke:none;stroke-width:0.280543;stroke-opacity:1"
                                            d="m 142.23352,120.88683 -36.22808,-42.417426 10.58765,-0.821741 44.61507,40.936227 z"
                                            id="path2" sodipodi:nodetypes="ccccc" inkscape:export-filename="logo.svg"
                                            inkscape:export-xdpi="96" inkscape:export-ydpi="96" />
                                        <path class="logoSvgFill"
                                            style="fill-opacity:1;stroke:none;stroke-width:0.264583;stroke-opacity:1"
                                            d="m 94.289386,100.72461 1.944145,4.44175 83.005599,-15.459091 -4.16782,-12.015026 z"
                                            id="path3" sodipodi:nodetypes="ccccc" />
                                    </g>
                                </svg>
                                <div class="logoText">
                                    C<span class="logoTextHighlight">LIB</span>.NET
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="size9 flex justifyContEnd">
                        <div class="searchBarOut">
                            <input type="text" class="searchBarIn">
                            <a href="#" class="flex" style="position: absolute;">
                                <img src="../SRC/svg/search.svg" class="svgSearch" alt="lupa de pesquisa">
                            </a>
                        </div>
                    </div>
                    <?php
                    include_once ("components/usermenu.php");
                    ?>
                </div>
            </div>
        </div>

        <div class="contBackground overflowHide">
        </div>
        <!-- conteúdo -->
        <div class="contFluid" style="margin-top: -8%;">
            <div class="contMainBorder contSection">
                <div class="size8 controlResultsContainer">
                    <div class="searchPageBarContainer justifyContCent flex">
                        <form method="GET" action="admLivro.php" class="searchPageBarOut">
                            <input type="text" name="search" class="searchPageBarIn">
                            <input type="submit" value="" class="flex"
                                style="background:none; border: none; position: absolute;">
                            </input>
                        </form>
                    </div>
                    <div class="tableSection">
                        <div class="containerComplement tableBookSpacing">
                            <div class="tableCodMin">
                                cod
                            </div>
                            <div class="tableTituloMin">
                                nome
                            </div>
                            <div class="tableAutorMin">
                                descricao
                            </div>
                            <div class="tableAutorMin">
                                ativo
                            </div>
                            <div class="tableAutorMin">
                                imagem
                            </div>
                        </div>
                    </div>
                    <div id="results">

                        <?php
                        if ($_GET["search"] != NULL) {
                            selectFiltered("tb_livros");
                        } else {
                            select("tb_livros");
                        }
                        ?>
                    </div>
                </div>
                <div class="size4">
                    <div class="controlAcessButtons flex">
                        <div id="adminCreateBtn" class="controlShowBtn controlShowBorder" style="z-index: 7;"
                            onclick="controlShow('create')">
                            criar
                        </div>
                        <div id="adminUpdateBtn" class="controlShowBtn controlShowBorder"
                            style="z-index: 6; margin-left: -2px" onclick="controlShow('update')">
                            atualizar
                        </div>
                        <div id="adminDeleteBtn" class="controlShowBtn controlShowBorder"
                            style="z-index: 5; margin-left: -2px" onclick="controlShow('delete')">
                            deletar
                        </div>
                    </div>


                    <div id="adminCreate" class="controlEditContainer controlBackgroundStart">
                        <div class="controlTitulo">
                            <t3>Criar</t3>
                        </div>
                        <form method="POST" enctype="multipart/form-data" action="" class="controlForm flexColumn">
                            <div class="controlInputSection">
                                <label class="controlLabel" for="tituloLivro">Título:</label>
                                <input class="controlInput size12" type="text" name="tituloLivro" id="tituloLivro"
                                    required>
                            </div>
                            <div class="controlInputSection">
                                <label class="controlLabel" for="descricaoLivro">Descrição</label>
                                <textarea class="controlInput size12" name="descricaoLivro" id="descricaoLivro"
                                    required> </textarea>
                            </div>
                            <div class="controlInputSection flex">
                                <div class="size11 flexColumn">
                                    <label class="controlLabel" for="capaLivro">Imagem da capa:</label>
                                    <input class="controlInputTransparent size11" type="file" name="capaLivro"
                                        id="capaLivro" required>
                                    <st1>OBS: Arquivos devem ter dimensão de no mínimo 300x600</st1>
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
                                    <form method="GET">
                                        <label class="controlLabel" for="codUpd">Código do livro:</label>
                                        <input class="controlInput size10" type="text" name="codUpd">
                                        <form>
                                </div>
                            </div>

                            <div class="controlInputSection">
                                <label class="controlLabel" for="tituloUpd">Título:</label>
                                <input class="controlInput size12" type="text" name="tituloUpd" id="tituloUpd" required>
                            </div>
                            <div class="controlInputSection">
                                <label class="controlLabel" for="descricaoLivroUpd">Descrição</label>
                                <textarea class="controlInput size12" name="descricaoLivroUpd" id="descricaoLivroUpd"
                                    required> </textarea>
                            </div>
                            <div class="controlInputSection flex">
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

                                <div class="size7 flexColumn">
                                    <label class="controlLabel" for="capaLivroUpd">Imagem da capa:</label>
                                    <input class="controlInputTransparent size11" type="file" name="capaLivroUpd"
                                        required>
                                    <st1>OBS: Arquivos devem ter dimensão de no mínimo 300x600</st1>
                                </div>
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
                        <form method="POST" action="admLivro.php" class="controlForm flexColumn">
                            <div class="controlInputSection flex">
                                <div class="size6">
                                    <label class="controlLabel" for="codDelete">Código do livro:</label>
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
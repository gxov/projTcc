<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="../../CSS/styleRecursos.css" rel="stylesheet">
    <link href="../../CSS/styleComponentes.css" rel="stylesheet">
    <link href="../../CSS/style.css" rel="stylesheet">
    <link rel="icon" href="../../SRC/svg/logo.png" />
    <?php
    include_once ("utils/user/read.php");
    include_once ("utils/user/insert.php");
    include_once ("utils/user/delete.php");
    include_once ("utils/user/update.php");
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
            Início
        </div>
        <div class="contSection sideNavSection size10">
            Busca
        </div>
        <div class="contSection sideNavSection size10">
            Comunidade
        </div>
        <div class="contSection sideNavSection size10">
            Contato
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
                                <img class="svgMenu" src="../../SRC/svg/menu.svg" />
                            </span>
                        </div>
                        <a class="logoLink flex" href="../index.html">
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
                    </div>
                    <div class="size1 grid">
                        <div class="acessoUser">
                            <a onclick="openUserNav()">
                                <svg class="acessoUserFoto" data-v-5cba5096="" data-v-dd104bd2=""
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    class="icon large text-icon-contrast text-undefined" id="avatar">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2m8-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8">
                                    </path>
                                </svg>
                            </a>
                        </div>
                        <div class="userMenuDiv" id="userAccess" style="display: none;">
                            <div class="userMenuCont flex">
                                <div class="userMenuItem userMenuAccess flexColumn alignCenter">
                                    <svg class="userMenuPicture" data-v-5cba5096="" data-v-dd104bd2=""
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        class="icon large text-icon-contrast text-undefined" id="avatar">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2m8-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8">
                                        </path>
                                    </svg>
                                    Usuário
                                </div>
                                <div
                                    class="userMenuItem flex alignSlfCent justifyContCent alignCenter flex userConfigAccess">
                                    <svg class="svgConfigAccess" data-v-9ba4cb7e="" data-v-8a0f6996=""
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" class="feather feather-book-open icon" viewBox="0 0 24 24"
                                        style="color: currentcolor;">
                                        <path
                                            d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2zm20 0h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z">
                                        </path>
                                    </svg>
                                    Bibliotecas
                                </div>
                                <div
                                    class="userMenuItem flex alignSlfCent justifyContCent alignCenter flex userConfigAccess">
                                    <svg class="svgConfigAccess" data-v-9ba4cb7e="" data-v-8a0f6996=""
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon"
                                        style="color: currentcolor;">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2"
                                            d="m3 21 5-5m-4-4 8 8c3-3 1-5 1-5l6-6h2l-6-6v2l-6 6s-2-2-5 1"></path>
                                    </svg>
                                    Histórico
                                </div>
                                <div
                                    class="userMenuItem flex alignSlfCent justifyContCent alignCenter flex userConfigAccess">
                                    <svg class="svgConfigAccess" data-v-9ba4cb7e="" data-v-8a0f6996=""
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24" class="icon" style="color: currentcolor;">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 21-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z">
                                        </path>
                                    </svg>
                                    Seguindo
                                </div>
                                <div
                                    class="userMenuItem flex alignSlfCent justifyContCent alignCenter flex userConfigAccess">
                                    <svg class="svgConfigAccess" data-v-5cba5096="" data-v-62f4b649=""
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        class="icon text-icon-contrast text-undefined mr-3">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6"></path>
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 1 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 1 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 3.417 1.415 2 2 0 0 1-.587 1.415l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1">
                                        </path>
                                    </svg>
                                    Configurações
                                </div>
                                <!-- <div class="userMenuItem">
                                    <span onclick="mudarTema('Azul')">
                                        <div style="background-color: #3fa0a4;">
                                            c1
                                        </div>
                                    </span>
                                </div>
                                <div class="userMenuItem">
                                    <span onclick="mudarTema('Laranja')">
                                        <div style="background-color: #bc3131;">
                                            c2
                                        </div>
                                    </span>
                                </div> -->
                            </div>
                        </div>
                    </div>
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
                        <form method="GET" action="user.php" class="searchPageBarOut">
                            <input type="text" name="search" class="searchPageBarIn">
                            <input type="submit" value="" class="flex"
                                style="background:none; border: none; position: absolute;">
                            <img src="../../SRC/svg/search.svg" class="svgSearch" alt="lupa de pesquisa">
                            </input>
                        </form>
                    </div>
                    <div class="tableSection">
                        <div class="containerComplement">
                            <div class="tableCodMin">
                                cod
                            </div>
                            <div class="tableTituloMin">
                                nome
                            </div>
                            <div class="tableTituloMin">
                                username
                            </div>
                            <div class="tableTituloMin">
                                cpf
                            </div>
                            <div class="tableTituloMin">
                                email
                            </div>
                            <div class="tableAutorMin">
                                ativo
                            </div>
                            <div class="tableTituloMin">
                                tipo
                            </div>
                            <div class="tableAutorMin">
                                foto
                            </div>
                        </div>
                    </div>
                    <div id="results">

                        <?php
                        if ($_GET["search"] != NULL) {
                            selectFiltered("tb_usuarios");
                        } else {
                            select("tb_usuarios");
                        }
                        ?>
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
                                    <label class="controlLabel" for="nomeUser">Nome:</label>
                                    <input class="controlInput size12" type="text" name="nomeUser" id="nomeUser"
                                        required>
                                </div>
                                <div class="controlInputSection">
                                    <label class="controlLabel" for="usernameUser">Username:</label>
                                    <input class="controlInput size12" type="text" name="usernameUser" id="usernameUser"
                                        required>
                                </div>
                                <div class="controlInputSection">
                                    <label class="controlLabel" for="cpfUser">CPF</label>
                                    <input class="controlInput size12" type="text" name="cpfUser" id="cpfUser" required>
                                </div>
                                <div class="controlInputSection">
                                    <label class="controlLabel" for="emailUser">E-mail:</label>
                                    <input class="controlInput size12" type="text" name="emailUser" id="emailUser"
                                        required>
                                </div>
                                <div class="controlInputSection">
                                    <label class="controlLabel" for="senhaUser">Senha:</label>
                                    <input class="controlInput size12" type="text" name="senhaUser" id="senhaUser"
                                        required>
                                </div>
                                <div class="controlInputSection flex">
                                    <div class="size7 flexColumn">
                                        <label class="controlLabel" for="fotoUser">Foto de perfil:</label>
                                        <input class="controlInputTransparent size11" type="file" name="fotoUser"
                                            id="fotoUser" required>
                                    </div>
                                    <div class="size5 flexColumn">
                                        <label class="controlLabel" for="tipoUser">Tipo:</label>
                                        <div class="flex">
                                            Administrador
                                            <input class="controlRadio size10" type="radio" value="ADM" name="tipoUser"
                                                id="tipoUser" required>
                                        </div>
                                        <div class="flex">
                                            Usuário Verificado
                                            <input class="controlRadio size10" type="radio" value="VER" name="tipoUser"
                                                id="tipoUser" required>
                                        </div>
                                        <div class="flex">
                                            Usuário Regular
                                            <input class="controlRadio size10" type="radio" value="USR" name="tipoUser"
                                                id="tipoUser" required>
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
                        <div id="adminUpdate" style="display: none;"
                            class="controlEditContainer controlBackgroundMiddle">
                            <div class="controlTitulo">
                                <t3>Atualizar</t3>
                            </div>
                            <form method="POST" enctype="multipart/form-data" action="" class="controlForm flexColumn">
                                <div class="controlInputSection flex">
                                    <div class="size6">
                                        <form method="GET">
                                            <label class="controlLabel" for="codUpd">Código do Usuário:</label>
                                            <input class="controlInput size10" type="text" name="codUpd">
                                            <form>
                                    </div>
                                </div>

                                <div class="controlInputSection">
                                    <label class="controlLabel" for="nomeUpd">Nome:</label>
                                    <input class="controlInput size12" type="text" name="nomeUpd" id="nomeUpd" required>
                                </div>
                                <div class="controlInputSection">
                                    <label class="controlLabel" for="usernameUpd">Username:</label>
                                    <input class="controlInput size12" type="text" name="usernameUpd" id="usernameUpd"
                                        required>
                                </div>
                                <div class="controlInputSection">
                                    <label class="controlLabel" for="cpfUpd">CPF:</label>
                                    <input class="controlInput size12" type="text" name="cpfUpd" id="cpfUpd" required>
                                </div>
                                <div class="controlInputSection">
                                    <label class="controlLabel" for="emailUpd">E-mail:</label>
                                    <input class="controlInput size12" type="text" name="emailUpd" id="emailUpd"
                                        required>
                                </div>
                                <div class="controlInputSection">
                                    <label class="controlLabel" for="senhaUpd">senha:</label>
                                    <input class="controlInput size12" type="password" name="senhaUpd" id="senhaUpd"
                                        required>
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
                                            <input class="controlRadio size10" type="radio" value="false"
                                                name="ativoUpd" id="ativoUpd" required>
                                        </div>
                                    </div>
                                    <div class="size5 flexColumn">
                                        <label class="controlLabel" for="tipoUpd">Tipo:</label>
                                        <div class="flex">
                                            Administrador
                                            <input class="controlRadio size10" type="radio" value="ADM" name="tipoUpd"
                                                id="tipoUpd" required>
                                        </div>
                                        <div class="flex">
                                            Usuário Verificado
                                            <input class="controlRadio size10" type="radio" value="VER" name="tipoUpd"
                                                id="tipoUpd" required>
                                        </div>
                                        <div class="flex">
                                            Usuário Regular
                                            <input class="controlRadio size10" type="radio" value="USR" name="tipoUpd"
                                                id="tipoUpd" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="controlInputSection flex">
                                    <div class="size7 flexColumn">
                                        <label class="controlLabel" for="fotoUserUpd">Foto de perfil:</label>
                                        <input class="controlInputTransparent size11" type="file" name="fotoUserUpd"
                                            id="fotoUserUpd" required>
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
                            <form method="POST" action="" class="controlForm flexColumn">
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
        </div>
        <!-- rodapé
        <div class="contSection">
            rodapé
        </div> -->
    </div>
    </div>
    <script src="../../JS/interface.js"></script>
    <script src="../../JS/user.js"></script>
</body>

</html>
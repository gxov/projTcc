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
    include_once("administrator/utils/forum/read.php");
    include_once("administrator/utils/forum/insert.php");
    include_once("administrator/utils/forum/delete.php");
    include_once("administrator/utils/forum/update.php");
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
                        <form method="GET" action="admUser.php" class="searchPageBarOut">
                            <input type="text" name="search" class="searchPageBarIn">
                            <input type="submit" value="" class="flex"
                                style="background:none; border: none; position: absolute;">
                            </input>
                        </form>
                    </div>
                    <div class="adminScroll">
                        <div class="tableSection">
                            <div class="containerComplement tableUserSpacing">
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
                                <div>
                                    dtcriacao
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
                                    imagem
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
                                <label class="controlLabel" for="nomeUser">Nome:</label>
                                <input class="controlInput size12" type="text" name="nomeUser" id="nomeUser" required>
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
                                <input class="controlInput size12" type="text" name="emailUser" id="emailUser" required>
                            </div>
                            <div class="controlInputSection">
                                <label class="controlLabel" for="senhaUser">Senha:</label>
                                <input class="controlInput size12" type="text" name="senhaUser" id="senhaUser" required>
                            </div>
                            <div class="controlInputSection flex">
                                <div class="size7 flexColumn">
                                    <label class="controlLabel" for="imagemUser">Foto de perfil:</label>
                                    <input class="controlInputTransparent size11" type="file" name="imagemUser"
                                        id="imagemUser">
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
                    <div id="adminUpdate" style="display: none;" class="controlEditContainer controlBackgroundMiddle">
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
                                <input class="controlInput size12" type="text" name="emailUpd" id="emailUpd" required>
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
                                        <input class="controlRadio size10" type="radio" value="false" name="ativoUpd"
                                            id="ativoUpd" required>
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
                                    <label class="controlLabel" for="imagemUserUpd">imagem de perfil:</label>
                                    <input class="controlInputTransparent size11" type="file" name="imagemUserUpd"
                                        id="imagemUserUpd">
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
    <script src="../JS/interface.js"></script>
    <script src="../JS/user.js"></script>
</body>

</html>
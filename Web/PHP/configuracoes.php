<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliotecas</title>
    <link href="../CSS/styleRecursos.css" rel="stylesheet">
    <link href="../CSS/styleComponentes.css" rel="stylesheet">
    <link href="../CSS/style.css" rel="stylesheet">
    <link rel="icon" href="../SRC/svg/logo.png" />
    <?php
    session_start();
    include_once("administrator/utils/user/updateSelf.php");
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
            <div class="contMainBorder contSection flexColumn">
                <div class="bibliotecaSection flex">
                    <div class="size4">
                        <div class="sectionTitle"> Atualizar perfil </div>
                        <form method="POST" enctype="multipart/form-data" action="">
                            <div class="controlInputSection flexColumn">
                                <label class="controlLabel" for="nome">Nome</label>
                                <input class="controlInput size6" type="text" name="nome" id="nome" required>
                                <label class="controlLabel" style="margin-top: 1rem;" for="CPF">CPF</label>
                                <input class="controlInput size6" type="text" name="CPF" id="CPF">
                                <label class="controlLabel" style="margin-top: 1rem;" for="dtnasc">Data de nascimento</label>
                                <input class="controlInput size6" type="date" name="dtnasc" id="dtnasc">
                                <label class="controlLabel" style="margin-top: 1rem;" for="email">E-mail</label>
                                <input class="controlInput size6" type="text" name="email" id="email" required>
                                <label class="controlLabel" style="margin-top: 1rem;" for="foto">Foto</label>
                                <input class="size6" type="file" name="foto" id="foto">
                                <label class="controlLabel" style="margin-top: 1rem;" for="descricao">Descricao</label>
                                <textarea class="forumInput size12" name="descricao" required style="resize: none;"></textarea>
                                <input class="controlBtn size2" type="submit" style="margin-top: 1rem;" name="submit"
                                    value="Confirmar">
                            </div>
                        </form>
                    </div>
                    <div class="size4">
                        <div class="sectionTitle"> Atualizar senha </div>
                        <form method="POST" enctype="multipart/form-data" action="">
                            <div class="controlInputSection flexColumn">
                                <label class="controlLabel" for="senhaAt">Senha atual</label>
                                <input class="controlInput size6" type="text" name="senhaAt" id="senhaAt" required>
                                <label class="controlLabel" style="margin-top: 1rem;" for="senhaNv">Senha nova</label>
                                <input class="controlInput size6" type="text" name="senhaNv" id="senhaNv" required>
                                <input class="controlBtn size2" style="margin-top: 1rem;" type="submit" name="submitSen"
                                    value="Confirmar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="size12 livroContent">
            </div>

            <!-- rodapé -->
            <!-- <div class="contSection">
                rodapé
            </div> -->
        </div>
    </div>
    <script src="../JS/interface.js"></script>
    <script src="../JS/user.js"></script>
</body>

</html>
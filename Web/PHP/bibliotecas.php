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
    include_once("administrator/utils/biblioteca/criarBiblioteca.php");
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

                    <?php
                    if ($_SESSION['id']) {
                        include_once ("components/contentLoader/bibliotecasInfo.php");
                    } else {
                        header('Location: index.php');
                    }
                    ;
                    ?>
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
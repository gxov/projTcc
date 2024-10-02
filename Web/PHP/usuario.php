<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../CSS/styleRecursos.css" rel="stylesheet">
    <link href="../CSS/styleComponentes.css" rel="stylesheet">
    <link href="../CSS/style.css" rel="stylesheet">
    <link rel="icon" href="../SRC/svg/logo.png" />
    <?php
    session_start();
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

                    <?php
                    if ($_GET['id']) {
                        include_once ("components/contentLoader/userInfo.php");
                    } else {
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
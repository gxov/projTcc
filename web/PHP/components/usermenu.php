<?php
include_once("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");

if (isset($_SESSION['username'])) {

    $conn = connect();
    $sql = "SELECT imagem FROM tb_usuarios WHERE username = '" . $_SESSION['username'] . "'";
    $result = $conn->prepare($sql);
    $result->execute();
    $result->store_result();

    if ($result->num_rows > 0) {
        $result->bind_result($image);
        $result->fetch();
        ?>
        <div class="size1 grid">
            <div class="acessoUser">
                <a onclick="openUserNav()">
                    <?php
                    if ($image == null) {
                        echo '<svg class="acessoUserFoto" data-v-5cba5096="" data-v-dd104bd2=""
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="icon large text-icon-contrast text-undefined" id="avatar">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"
                            d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2m8-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8">
                        </path>
                    </svg>';
                    } else {
                        echo '
        <img class="acessoUserFoto" src="../SRC/fotos/usuario/' .
                            $image .
                            '">
        </img>';
                    } ?>
                </a>
            </div>
            <div class="userMenuDiv" id="userAccess" style="display: none;">
                <div class="userMenuCont flex">
                    <div class="userMenuItem userMenuAccess flexColumn alignCenter">
                        <?php
                        if ($image == null) {
                            echo '<a class="flexColumn" href="usuario.php?id='.$_SESSION['id'].'"><svg class="userMenuPicture" data-v-5cba5096="" data-v-dd104bd2="" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" class="icon large text-icon-contrast text-undefined" id="avatar">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2m8-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8">
                    </path>
                    </svg>' . $_SESSION['username'] . '</a>';
                        } else {
                            echo '<a class="flexColumn" href="usuario.php?id=' . $_SESSION['id'] . '">
                <img style="height: 7rem; width: 7rem;" class="userMenuPicture" src="../SRC/fotos/usuario/' .
                                $image .
                                '">
                </img>' . $_SESSION['username'] . '</a>';
                        } ?>
                    </div>
                    <a href="bibliotecas.php" class="userMenuItem flex alignSlfCent justifyContCent alignCenter flex userConfigAccess">
                        <svg class="svgConfigAccess" data-v-9ba4cb7e="" data-v-8a0f6996="" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" class="feather feather-book-open icon" viewBox="0 0 24 24"
                            style="color: currentcolor;">
                            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2zm20 0h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z">
                            </path>
                        </svg>
                        Bibliotecas
                    </a>
                    <?php
                    if ($_SESSION['tipo'] == 'ADM') {
                        ?>
                        <div class="logoutForm">
                        </div>
                        <div class="userMenuScroll justifyContCent flexColumn">
                            <a href="admUser.php" style="margin-top: 8rem"
                                class="userMenuItem flex alignSlfCent justifyContCent alignCenter flex userConfigAccess">
                                <svg class="svgConfigAccess" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512" fill="var(--font)">
                                    <path
                                        d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4l54.1 0 109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109 0-54.1c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7L352 176c-8.8 0-16-7.2-16-16l0-57.4c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                </svg>
                                Usuários
                            </a>
                            <a href="admForum.php"
                                class="userMenuItem flex alignSlfCent justifyContCent alignCenter flex userConfigAccess">
                                <svg class="svgConfigAccess" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512" fill="var(--font)">
                                    <path
                                        d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4l54.1 0 109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109 0-54.1c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7L352 176c-8.8 0-16-7.2-16-16l0-57.4c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                </svg>
                                Fóruns
                            </a>
                            <a href="admAutor.php"
                                class="userMenuItem flex alignSlfCent justifyContCent alignCenter flex userConfigAccess">
                                <svg class="svgConfigAccess" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512" fill="var(--font)">
                                    <path
                                        d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4l54.1 0 109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109 0-54.1c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7L352 176c-8.8 0-16-7.2-16-16l0-57.4c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                </svg>
                                Autores
                            </a>
                            <a href="admLivro.php"
                                class="userMenuItem flex alignSlfCent justifyContCent alignCenter flex userConfigAccess">
                                <svg class="svgConfigAccess" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512" fill="var(--font)">
                                    <path
                                        d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4l54.1 0 109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109 0-54.1c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7L352 176c-8.8 0-16-7.2-16-16l0-57.4c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                </svg>
                                Livros
                            </a>
                            <a href="admCategoria.php"
                                class="userMenuItem flex alignSlfCent justifyContCent alignCenter flex userConfigAccess">
                                <svg class="svgConfigAccess" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512" fill="var(--font)">
                                    <path
                                        d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4l54.1 0 109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109 0-54.1c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7L352 176c-8.8 0-16-7.2-16-16l0-57.4c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                </svg>
                                Categorias
                            </a>
                        </div>
                        <?php
                    } elseif ($_SESSION['tipo'] == 'VER') { ?>
                        <div class="logoutForm">
                        </div>
                        <div class="userMenuScroll justifyContCent flexColumn">
                            <div class="userMenuItem flex alignSlfCent justifyContCent alignCenter flex userConfigAccess">
                            <svg class="svgConfigAccess" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512" fill="var(--font)">
                                    <path
                                        d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4l54.1 0 109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109 0-54.1c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7L352 176c-8.8 0-16-7.2-16-16l0-57.4c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                </svg>
                                Autores
                            </div>
                            <div class="userMenuItem flex alignSlfCent justifyContCent alignCenter flex userConfigAccess">
                            <svg class="svgConfigAccess" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512" fill="var(--font)">
                                    <path
                                        d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4l54.1 0 109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109 0-54.1c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7L352 176c-8.8 0-16-7.2-16-16l0-57.4c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                </svg>
                                Livros
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                    <div class="logoutForm">
                    </div>
                    <div class="userMenuItem pZero flex alignSlfCent justifyContCent alignCenter flexColumn userConfigAccess">
                        <form action="administrator/utils/user/logout.php" class="flexColumn" method="$_POST">
                            <button type="submit" class="logoutBtn flex alignCenter" value="SAIR">
                                <svg data-v-9ba4cb7e="" data-v-5866404a="" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" fill="none" viewBox="0 0 24 24"
                                    class="icon text-icon-contrast text-undefined mr-2">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4m7 14 5-5-5-5m5 5H9">
                                    </path>
                                </svg>
                                SAIR
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {

    }
} else {
    ?>
    <div class="size1 grid">
        <div class="acessoUser">
            <a onclick="openUserNav()">
                <svg class="acessoUserFoto" data-v-5cba5096="" data-v-dd104bd2="" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" class="icon large text-icon-contrast text-undefined" id="avatar">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2m8-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8">
                    </path>
                </svg>
            </a>
        </div>
        <div class="userMenuDiv" id="userAccess" style="display: none;">
            <div class="userMenuCont flex">
                <div class="userMenuItem userMenuAccess flexColumn alignCenter">
                    <svg class="userMenuPicture" data-v-5cba5096="" data-v-dd104bd2="" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" class="icon large text-icon-contrast text-undefined" id="avatar">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2m8-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8">
                        </path>
                    </svg>
                    <a href="cadastro.php">Entre/Crie uma conta
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php
}

<?php
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");

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
        <img class="acessoUserFoto" src="http://localhost/projTcc/Web/src/fotos/usuario/' .
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
                            echo '<svg class="userMenuPicture" data-v-5cba5096="" data-v-dd104bd2="" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" class="icon large text-icon-contrast text-undefined" id="avatar">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2m8-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8">
                    </path>
                    </svg>';
                        } else {
                            echo '
                <img style="height: 7rem; width: 7rem;" class="userMenuPicture" src="http://localhost/projTcc/Web/src/fotos/usuario/' .
                                $image .
                                '">
                </img>';
                        }
                        echo $_SESSION['username'] ?>
                    </div>
                    <div class="userMenuItem flex alignSlfCent justifyContCent alignCenter flex userConfigAccess">
                        <svg class="svgConfigAccess" data-v-9ba4cb7e="" data-v-8a0f6996="" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" class="feather feather-book-open icon" viewBox="0 0 24 24"
                            style="color: currentcolor;">
                            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2zm20 0h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z">
                            </path>
                        </svg>
                        Bibliotecas
                    </div>
                    <div class="userMenuItem flex alignSlfCent justifyContCent alignCenter flex userConfigAccess">
                        <svg class="svgConfigAccess" data-v-9ba4cb7e="" data-v-8a0f6996="" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" class="icon" style="color: currentcolor;">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m3 21 5-5m-4-4 8 8c3-3 1-5 1-5l6-6h2l-6-6v2l-6 6s-2-2-5 1"></path>
                        </svg>
                        Histórico
                    </div>
                    <div class="userMenuItem flex alignSlfCent justifyContCent alignCenter flex userConfigAccess">
                        <svg class="svgConfigAccess" data-v-9ba4cb7e="" data-v-8a0f6996="" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24" class="icon" style="color: currentcolor;">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 21-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z">
                            </path>
                        </svg>
                        Seguindo
                    </div>
                    <div class="userMenuItem flex alignSlfCent justifyContCent alignCenter flex userConfigAccess">
                        <svg class="svgConfigAccess" data-v-5cba5096="" data-v-62f4b649="" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" class="icon text-icon-contrast text-undefined mr-3">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6"></path>
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 1 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 1 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 3.417 1.415 2 2 0 0 1-.587 1.415l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1">
                            </path>
                        </svg>
                        Configurações
                    </div>
                    <div class="userMenuItem alignSlfCent justifyContCent flex userConfigAccess">
                        <form action="administrator/utils/user/logout.php" method="$_POST">
                            <input type="submit" class="logoutBtn" value="SAIR">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
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

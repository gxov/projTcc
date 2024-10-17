<?php
session_start();
include_once ("C:/xampp/htdocs/projtcc/web/PHP/administrator/utils/connect.php");
$conn = connect();

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $query = "SELECT * FROM tb_usuarios WHERE token_recuperacao = '$token' AND token_expires >= " . date("U");
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nova_senha = md5($_POST['nova_senha']);
            $query = "UPDATE tb_usuarios SET senha = '$nova_senha', token_recuperacao = NULL, token_expires = NULL WHERE token_recuperacao = '$token'";
            mysqli_query($conn, $query);
            $_SESSION['recuperacao_sucesso'] = 'Senha redefinida com sucesso!';
            header('Location: login.php');
            exit();
        }
    } else {
        $_SESSION['recuperacao_erro'] = 'Token inválido ou expirado.';
        header('Location: resetPass.php');
        exit();
    }
} else {
    header('Location: resetPass.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha</title>
    <link href="../CSS/styleRecursos.css" rel="stylesheet">
    <link href="../CSS/styleComponentes.css" rel="stylesheet">
    <link href="../CSS/style.css" rel="stylesheet">
    <link rel="icon" href="../SRC/svg/logo.png" />
    <?php include_once("administrator/utils/user/register.php")

        ?>
</head>

<body class="conteudo">
    <!-- side nav -->
    <div class="sideNavTransition sideNav contFluid sideNavHide flex sideNavShow" id="sideNav"
        style="opacity: 1; width: 0;">
        <div class="sideNavClose">
            <span onclick="closeNav()">
                <svg data-v-4c681a64="" data-v-a31e942f="" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24" class="svgSideNavClose">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M18 6 6 18M6 6l12 12"></path>
                </svg>
            </span>
        </div>
        <div class="contSection">

        </div>
    </div>
    <div class="contFluid mainContent overflowHide" id="main">
        <!-- conteúdo -->
        <div class="contFluid">
            <div class="contSection contMain" style="background: none ;justify-content: center;">
                <div class="size5 loginSectionBorder">

                    <form action="" method="post">
                        <label for="nova_senha">Nova Senha:</label>
                        <input type="password" id="nova_senha" name="nova_senha" required minlength="8">
                        <button type="submit" class="button-submit">Redefinir Senha</button>
                    </form>
                    <!-- <form action="administrator/utils/user/resetPass.php" method="POST"
                        class="size12 loginSection grid">
                        <div class="loginTitle justifySlfCent">
                            Recuperar Senha
                        </div>
                        <div class="loginInputSection flexColumn">
                            <span class="textAlignCenter">Um e-mail de confirmação foi enviado para o e-mail da sua
                                conta</span><br>
                            <label for="resetPassword">Senha</label>
                            <input type="text" name="resetPassword" class="loginInputBox">
                            <st1>Insira uma nova Senha</st1>
                        </div>
                        <div class="loginBtnSection">
                            <input type="submit" value="Confirmar" name="resetPassConf" class="loginBtn size11 flex">
                        </div>
                    </form> -->

                    <?php
                    if (isset($_SESSION['recuperacao_erro'])) {
                        echo '<div class="error-message">' . $_SESSION['recuperacao_erro'] . '</div>';
                        unset($_SESSION['recuperacao_erro']);
                    }
                    if (isset($_SESSION['recuperacao_sucesso'])) {
                        echo '<div class="success-message">' . $_SESSION['recuperacao_sucesso'] . '</div>';
                        unset($_SESSION['recuperacao_sucesso']);
                    }
                    ?>
                    <div class="loginCadSection flexColumn textAlignCenter">
                        <div><a href="index.php">Voltar para a tela inicial</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="../JS/header.js"></script>
</body>

</html>
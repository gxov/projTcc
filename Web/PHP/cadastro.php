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
                    <div class="size12 loginSection grid">
                        <div class="loginTitle justifySlfCent">
                            Crie sua conta
                        </div>
                        <div class="loginInputSection flexColumn">
                            <label for="user">Nome de Usuário</label>
                            <input type="text" class="loginInputBox">
                        </div>
                        <div class="loginInputSection flexColumn">
                            <label for="email">E-mail</label>
                            <input type="text" class="loginInputBox">
                        </div>
                        <div class="loginInputSection flexColumn">
                            <label for="senha">Senha</label>
                            <input type="text" class="loginInputBox">
                        </div>
                        <div class="loginInputSection flexColumn">
                            <label for="senha">Confirme sua senha</label>
                            <input type="text" class="loginInputBox">
                        </div>
                        <div class="loginBtnSection">
                            <div class="loginBtnSection">
                                <input type="submit" value="" name="login" class="loginBtn size11 flex">
                            </div>
                        </div>
                    </div>
                    <div class="loginCadSection">
                        Já tem uma conta? <a class="loginLink" href="login.php">Faça login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="../JS/header.js"></script>
</body>

</html>
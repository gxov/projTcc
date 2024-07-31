<div class="sideNavClose alignSlfEnd">
    <span onclick="closeNav()">
        <svg data-v-4c681a64="" data-v-a31e942f="" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
            viewBox="0 0 24 24" class="svgSideNavClose">
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
<?php
if(isset($_SESSION['tipo'])){
if($_SESSION['tipo'] == 'ADM'){
    echo '
    <div class="contSection sideNavSection size10">
    <a href="admLivro.php">
        Administrador - Livros </a>


</div>
<div class="contSection sideNavSection size10">
    <a href="admUser.php">
        Administrador - Usuários </a>
</div>
    ';

}else{

}
}
?>
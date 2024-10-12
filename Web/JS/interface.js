const mainNav = document.getElementById('mainNav');
const mainNavBg = document.getElementById('mainNavBg');
const sideNav = document.getElementById('sideNav');
const mainCont = document.getElementById('main');
var r = document.querySelector(':root');
var toggle = false;

function funct() {
    if (window.scrollY <= 10) {
        mainNavBg.className = "mainNavBackgroundTransition mainNavBackgroundTransparente"
    } else {
        mainNavBg.className = "mainNavBackgroundTransition mainNavBackground"
    }
}

funct();
window.onscroll = function () { funct() }

function openNav() {
    sideNav.style.opacity = 1;
    sideNav.style.width = "15%";
    mainCont.className = "contFluid mainContent mainContentFloat"
    mainCont.style.width = "85%";
    mainNav.style.width = "85%";
}

function closeNav() {
    sideNav.style.width = "0%";
    mainCont.className = "contFluid mainContent mainContentFloat"
    mainCont.style.width = "100%";
    mainNav.style.width = "100%";
    sideNav.style.opacity = 0;
}

// Para página de search
var pageName = location.pathname.split("/").slice(-1);

// Menu de acesso
function openUserNav() {
    contdiv = document.getElementById("userAccess");
    switch (toggle) {
        case true:
            contdiv.style.display = "none";
            toggle = false;
            break;
        case false:
            contdiv.style.display = "block";
            toggle = true;
            break;
    }
}

// Para temas
function mudarTema(tipo) {
    var rs = getComputedStyle(r);
    switch (tipo) {
        case 'Azul':
            r.style.setProperty('--corPrimaria', '#3fa0a4');
            r.style.setProperty('--corSecundaria', '#286080');
            r.style.setProperty('--corSecundaria2', '#2860808e');
            r.style.setProperty('--bgPrimaria', '#0b1014');
            r.style.setProperty('--bgSecundaria', '#1d242a');
            r.style.setProperty('--bgTerciaria', '#324955');
            r.style.setProperty('--bgLogin', '#2e3b43');
            r.style.setProperty('--bgInput', '#3b454a');
            break;
        case 'Laranja':
            r.style.setProperty('--corPrimaria', '#ea4f36');
            r.style.setProperty('--corSecundaria', '#bc3131');
            r.style.setProperty('--corSecundaria2', '#bc31318e');
            r.style.setProperty('--bgPrimaria', '#090a14');
            r.style.setProperty('--bgSecundaria', '#10141f');
            r.style.setProperty('--bgTerciaria', '#243542');
            r.style.setProperty('--bgLogin', '#1d2230');
            r.style.setProperty('--bgInput', '#4d4948');
            break;
    }
}


var acc = document.getElementsByClassName("accordeonTrigger");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
        var panel = this.nextElementSibling;
        if (panel.style.height === "100%") {
            panel.style.height = "0%";
            panel.style.opacity = "0";
        } else {
            panel.style.height = "100%";
            panel.style.opacity = "1";
        }
    });
};


//Botões tela de adm

function controlShow(tipo) {
    let createDiv = document.getElementById("adminCreate");
    let updateDiv = document.getElementById("adminUpdate");
    let deleteDiv = document.getElementById("adminDelete");

    let createBtn = document.getElementById("adminCreateBtn");
    let updateBtn = document.getElementById("adminUpdateBtn");
    let deleteBtn = document.getElementById("adminDeleteBtn");

    switch (tipo) {
        case 'create':
            console.log(createDiv);
            createDiv.style.display = 'block';
            updateDiv.style.display = 'none';
            deleteDiv.style.display = 'none';

            createBtn.style.zIndex = '8';
            updateBtn.style.zIndex = '7';
            deleteBtn.style.zIndex = '6';
            break;
        case 'update':
            console.log(updateDiv);
            updateDiv.style.display = 'block';
            createDiv.style.display = 'none';
            deleteDiv.style.display = 'none';

            updateBtn.style.zIndex = '8';
            createBtn.style.zIndex = '7';
            deleteBtn.style.zIndex = '6';
            break;
        case 'delete':
            console.log(deleteDiv);
            deleteDiv.style.display = 'block';
            createDiv.style.display = 'none';
            updateDiv.style.display = 'none';

            deleteBtn.style.zIndex = '8';
            updateBtn.style.zIndex = '7';
            createBtn.style.zIndex = '6';
            break;
    }
};

function mostrarBibliotecas(){
let bibliotecasForm = document.getElementById("bibliotecas");
bibliotecasForm.style.display = 'flex';
}
const mainNav = document.getElementById('mainNav');
const mainNavBg = document.getElementById('mainNavBg');
const sideNav = document.getElementById('sideNav');
const mainCont = document.getElementById('main');

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
    sideNav.style.width = "20%";
    mainCont.className = "contFluid mainContent mainContentFloat"
    mainCont.style.width = "80%";
}

function closeNav() {
    sideNav.style.width = "0%";
    mainCont.className = "contFluid mainContent mainContentFloat"
    mainCont.style.width = "100%";
    sideNav.style.opacity = 0;
}


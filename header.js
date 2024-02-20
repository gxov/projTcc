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
    sideNav.classList.remove("sideNavHide")
    mainCont.className = "contFluid mainContent mainContentFloat"
    sideNav.style.width = "20%";
    mainCont.style.width = "80%";
}


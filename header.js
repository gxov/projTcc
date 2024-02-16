const mainNav = document.getElementById('mainNav');
const sideNav = document.getElementById('sideNav');
const mainCont = document.getElementById('main');
const mainNavHgt = mainNav.offsetTop;

function funct() {
    if (window.scrollY == 0) {
        mainNav.className = "container-fluid navTransparente"
        mainNav.removeAttribute("mainNav")
    } else {
        mainNav.removeAttribute("navTransparente")
        mainNav.className = "container-fluid mainNav"
    }
}

window.onscroll = function () { funct() }

function openNav() {
    sideNav.className = sideNav.className + " sideNavShow"
    mainCont.className = "container-fluid mainContent mainContentFloat"
    sideNav.style.width = "20%";
    mainCont.style.width = "80%";
}


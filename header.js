const mainNav = document.getElementById('mainNav');
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
    document.getElementById("navSide").style.width = "250px";
}
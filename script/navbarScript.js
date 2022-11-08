let clapboard = document.querySelector("nav .clapboard")
let icon = document.querySelector("nav .clapboard .icon")
let navbarLinks = document.querySelector("nav .links")
let clapboardClass = "fa-solid fa-clapperboard icon"
let closeClass = "fa-solid fa-xmark"

function toggleNavBar() {
    if(icon.className == clapboardClass) {
        icon.className = closeClass
        navbarLinks.style.display = "flex"
    } else {
        icon.className = clapboardClass
        navbarLinks.style.display = "none"
    }
}

function checkIfWeCanReturnToNormalNavBar() {
    if(window.outerWidth >= 908) {
        navbarLinks.style.display = "flex"
        if(icon.className == closeClass){
            icon.className = clapboardClass
        }
    } else {
        navbarLinks.style.display = "none"
    }

    
}

window.addEventListener('resize', checkIfWeCanReturnToNormalNavBar)
let clapboard = document.querySelector("nav .clapboard button")
let icon = document.querySelector("nav .clapboard .icon")
let navbarLinks = document.querySelector("nav .links")
let clapboardClass = "fa-solid fa-clapperboard icon"
let closeClass = "fa-solid fa-xmark icon"

function toggleNavBar() {
    let visiblity = navbarLinks.getAttribute("data-visible")

    if(visiblity === "false"){
        navbarLinks.setAttribute("data-visible", true)
        navbarLinks.setAttribute("aria-expanded", true)
        changeIcon()
    } else {
        navbarLinks.setAttribute("data-visible", false)
        navbarLinks.setAttribute("aria-expanded", false)
        changeIcon()
    }
}

function changeIcon(){
    let expanded = navbarLinks.getAttribute("aria-expanded")
    if(expanded === "false"){
        icon.className = clapboardClass
    } else {
        icon.className = closeClass
    }
}
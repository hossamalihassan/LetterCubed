let clapboard = document.querySelector("nav .clapboard button")
let icon = document.querySelector("nav .clapboard .icon")
let navbarLinks = document.querySelector("nav .links")

let clapboardClass = ""
let closeClass = ""
let clapboardClassFadeIn = "fa-solid fa-clapperboard icon animate__animated animate__bounceIn"
let clapboardClassFadeOut = "fa-solid fa-clapperboard icon animate__animated animate__bounceOut"
let closeClassFadeIn = "fa-solid fa-xmark icon animate__animated animate__bounceIn"
let closeClassFadeOut = "fa-solid fa-xmark icon animate__animated animate__bounceOut"

function toggleNavBar() {
    let visiblity = navbarLinks.getAttribute("data-visible")

    if(visiblity === "false"){
        clapboardClass = clapboardClassFadeOut
        closeClass = closeClassFadeIn
        navbarLinks.setAttribute("data-visible", true)
        navbarLinks.setAttribute("aria-expanded", true)
        changeIcon()
    } else {
        clapboardClass = clapboardClassFadeIn
        closeClass = closeClassFadeOut
        navbarLinks.setAttribute("data-visible", false)
        navbarLinks.setAttribute("aria-expanded", false)
        changeIcon()
    }
}

function changeIcon(){
    console.log(clapboardClass + " " + closeClass)
    let expanded = navbarLinks.getAttribute("aria-expanded")
    if(expanded === "false"){
        icon.className = clapboardClass
        clapboardClass = ""
    } else {
        icon.className = closeClass
        closeClass = ""
    }
}
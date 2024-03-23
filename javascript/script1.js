const menuHamburger = document.querySelector(".menu-barre")
const navLinks = document.querySelector(".nav-links")

menuHamburger.addEventListener('click',()=>{
    navLinks.classList.toggle('mobile-menu')
})
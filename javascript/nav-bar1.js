const menuHamburger = document.querySelector(".menu-barre")
const navLinks = document.querySelector(".nav-links")

menuHamburger.addEventListener('click',()=>{
    navLinks.classList.toggle('mobile-menu')
})
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 100) { // Changer 100 selon vos besoins
        navbar.classList.add('shrink');
        navbar.classList.add('shrink2');
    } else {
        navbar.classList.remove('shrink');
        navbar.classList.remove('shrink2');
    }
});
document.getElementById("resetButton").addEventListener("click", function() {
    document.getElementById("textInput").value = ""; // Efface le contenu de l'input
});
// Fonction pour rediriger vers la page.html
function redirectToPage() {
    window.location.href = "recherche.php";
}

// Ecouteur d'événement pour le clic sur le bouton ou l'appui sur la touche Entrée
document.getElementById("submitButton").addEventListener("click", redirectToPage);
document.getElementById("textInput").addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
        redirectToPage();
    }
});

// Catégorie

const menuDeroulant = document.querySelector(".menu-deroulant")
const Categorie = document.getElementById("menu-deroulant");

function updatePosition() {
    const position = Categorie.getBoundingClientRect();
    console.log(`Left: ${position.left}`);
    menuDeroulant.style.left = `${position.left}px`;
}

// Update position initially
updatePosition();

// Listen for 'scroll' and 'resize' events to update the position
window.addEventListener("scroll", updatePosition);
window.addEventListener("resize", updatePosition);



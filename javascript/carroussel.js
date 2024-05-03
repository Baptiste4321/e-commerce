// Fonction pour initialiser un carrousel
const initSlider = (section, i) => {
    const imageList = section.querySelector(`.carroussel${i} .liste-img${i}`);
    const slideButtons = section.querySelectorAll(".boutton-defilement");
    const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;

    slideButtons.forEach(button => {
        button.addEventListener("click", () => {
            const direction = button.id === `av-carroussel${i}` ? -1 : 1;
            const scrollAmount = imageList.clientWidth * direction;
            imageList.scrollBy({ left: scrollAmount, behavior: "smooth" });
        });
    });

    const handleSlideButtons = () => {
        slideButtons[0].style.display = imageList.scrollLeft <= 0 ? "none" : "block";
        slideButtons[1].style.display = imageList.scrollLeft >= maxScrollLeft ? "none" : "block";
    };

    imageList.addEventListener("scroll", () => {
        handleSlideButtons();
    });
};

// Initialisation des carrousels sur la page
window.addEventListener("load", () => {
    const carousel1 = document.getElementById("LePlusAcheté");
    const carousel2 = document.getElementById("PourVous");

    if (carousel1) {
        initSlider(carousel1, 1);
    }

    if (carousel2) {
        initSlider(carousel2, 2);
    }
    else {
        console.log("Aucun carrousel...");
    }
});

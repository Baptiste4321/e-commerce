// Fonction pour initialiser un carrousel
const initSlider = (section, i) => {
    const imageList = section.querySelector(".carroussel${i} .liste-img")
    const slideButtons = section.querySelectorAll(".boutton-defilement")
    const sliderScrollbar = section.querySelector("${section} .scrollbar-carroussel")
    const scrollbarThumb = sliderScrollbar.querySelector(".scrollbar-thumb")
    const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth

    scrollbarThumb.addEventListener("mousedown", (e) => {
        const startX = e.clientX;
        const thumbPosition = scrollbarThumb.offsetLeft;

        const handleMouseMove = (e) => {
            const deltaX = e.clientX - startX;
            const newThumbPosition = thumbPosition + deltaX;
            const maxThumbPosition = sliderScrollbar.getBoundingClientRect().width - scrollbarThumb.offsetWidth;

            const boundedPosition = Math.max(0, Math.min(maxThumbPosition, newThumbPosition));
            const scrollPosition = (boundedPosition / maxThumbPosition) * maxScrollLeft

            scrollbarThumb.style.left = `${boundedPosition}px`;
            imageList.scrollLeft = scrollPosition;
        }

        const handleMouseUp = () => {
            section.removeEventListener("mousemove", handleMouseMove);
            section.removeEventListener("mouseup", handleMouseUp);
        }

        section.addEventListener("mousemove", handleMouseMove);
        section.addEventListener("mouseup", handleMouseUp);
    })
    slideButtons.forEach(button =>{
        button.addEventListener("click", () => {
            const direction = button.id === `av-carroussel${i}` ? -1 : 1;
            const scrollAmount = imageList.clientWidth * direction;
            imageList.scrollBy( {left: scrollAmount, behavior: "smooth"})
        })
    })

    const handleSlideButtons = () => {
        slideButtons[0].style.display = imageList.scrollLeft <= 0 ? "none" : "block"
        slideButtons[1].style.display = imageList.scrollLeft >= maxScrollLeft ? "none" : "block"
    }

    const updateScrollThumbPosition = () => {
        const scrollPosition = imageList.scrollLeft;
        const thumbPosition = (scrollPosition / maxScrollLeft) * (sliderScrollbar.clientWidth - scrollbarThumb.offsetWidth);
        scrollbarThumb.style.left = `${thumbPosition}px`;
    }
    imageList.addEventListener("scroll", () => {
        handleSlideButtons()
        updateScrollThumbPosition();
    })
}

//window.addEventListener("load", initSlider);

// Initialisation des carrousels sur la page
window.addEventListener("load", () => {
    const carousel1 = document.getElementById("LePlusAcheté");
    const carousel2 = document.getElementById("PourVous");

    let i;
    if (carousel1) {
        initSlider(carousel1, 1);
    }

    if (carousel2) {
        initSlider(carousel2, 2);
    }
});








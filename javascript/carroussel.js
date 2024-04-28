const initSlider = () => {
    const imageList = document.querySelector(".carroussel .liste-img")
    const slideButtons = document.querySelectorAll(".carroussel .boutton-defilement")
    const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth
    //
    slideButtons.forEach(button =>{
        button.addEventListener("click", () => {
            const direction = button.id === "av-carroussel" ? -1 : 1;
            const scrollAmount = imageList.clientWidth * direction;
            imageList.scrollBy( {left: scrollAmount, behavior: "smooth"})
        })
    })

    const handleSlideButtons = () => {
        slideButtons[0].style.display = imageList.scrollLeft <= 0 ? "none" : "block"
        slideButtons[1].style.display = imageList.scrollLeft >= maxScrollLeft ? "none" : "block"
    }
    imageList.addEventListener("scroll", () => {
        handleSlideButtons()
    })
}

window.addEventListener("load", initSlider);
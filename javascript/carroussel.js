const initSlider = () => {
    const imageList = document.querySelector(".carroussel .liste-img")
    const slideButtons = document.querySelectorAll(".carroussel .boutton-defilement")

    //
    slideButtons.forEach(button =>{
        button.addEventListener("click", () => {
            const direction = button.id === "av-carroussel" ? -1 : 1;
            const scrollAmount = imageList.clientWidth * direction;
            imageList.scrollBy( {left: scrollAmount, behavior: "smooth"})
        })
    })

    imageList.addEventListener("scroll", () => {
        handleSlideButtons()
    })
}

window.addEventListener("load", initSlider);
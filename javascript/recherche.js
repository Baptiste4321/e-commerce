document.addEventListener("DOMContentLoaded", function() {
    const imageGrid = document.getElementById('image-grid');

    for (let i = 1; i <= 50; i++) {
        const imageContainer = document.createElement('div');
        imageContainer.classList.add('image-container');

        const image = document.createElement('img');
        image.src = `image/image/image${i}.png`;
        image.alt = `Image ${i}`;
        imageContainer.appendChild(image);

        const text = document.createElement('div');
        text.textContent = `Texte sous l'image ${i}`;
        imageContainer.appendChild(text);

        imageGrid.appendChild(imageContainer);
    }
});

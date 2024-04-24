document.addEventListener("DOMContentLoaded", function() {
    const imageGrid = document.getElementById('image-grid');

    for (let i = 1; i <= 50; i++) {
        const imageContainer = document.createElement('div');
        imageContainer.classList.add('image-container');

        const image = document.createElement('img');
        image.src = `image/image/image${i}.png`;
        image.alt = `Image ${i}`;
        imageContainer.appendChild(image);

        const price = document.createElement('div');
        price.textContent = `Prix : $XX.XX`;
        imageContainer.appendChild(price);

        const link = document.createElement('a');
        link.href = '#'; // Mettez votre lien cible ici
        link.textContent = `Lien sous l'image ${i}`;
        imageContainer.appendChild(link);

        imageGrid.appendChild(imageContainer);
    }
});

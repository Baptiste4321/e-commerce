document.addEventListener("DOMContentLoaded", function() {
    const imageGrid = document.getElementById('image-grid');

    for (let i = 1; i <= 50; i++) {
        const imageContainer = document.createElement('div');
        imageContainer.classList.add('image-container');

        const image = document.createElement('img');
        image.src = `image/image/${i}.jpg`;
        image.alt = `Image ${i}`;
        imageContainer.appendChild(image);

        const price = document.createElement('div');
        price.textContent = `Prix : $39.45`;
        imageContainer.appendChild(price);

        const link = document.createElement('a');
        link.textContent = `description produit pour femme${i}`;
        imageContainer.appendChild(link);
        link.href = `description.html`;

        // Ajout du gestionnaire d'événements clic
        imageContainer.addEventListener('click', function() {
            window.location.href = link.href; // Rediriger vers le lien lorsque imageContainer est cliqué
        });

        imageGrid.appendChild(imageContainer);
    }
});


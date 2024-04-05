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
document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById('searchInput');
    const loupeIcon = document.getElementById('loupe');

    function redirectToSearchPage() {
        if (searchInput.value.trim() !== '') {
            window.location.href = 'recherche.html';
        }
    }

    // Redirection vers la page de recherche lors du clic sur l'icône de la loupe
    loupeIcon.addEventListener('click', redirectToSearchPage);

    // Redirection vers la page de recherche lors de l'appui sur la touche Entrée dans l'input
    searchInput.addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            redirectToSearchPage();
        }
    });
});

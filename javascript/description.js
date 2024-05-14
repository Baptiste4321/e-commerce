// Récupération de l'élément image
var imageElement = document.getElementById("add_img");

// Récupération de l'ID du produit à partir de l'URL
var urlParams = new URLSearchParams(window.location.search);
var idProduit = urlParams.get('id');
var num_img = 0;
var max_num_img = 4;
// Définition du chemin de l'image avec l'ID du produit
var imagePath = "image/image/" + idProduit + "/" + num_img + ".jpg";

// Attribution du chemin de l'image à la propriété src de l'élément image
imageElement.src = imagePath;

// Écouteur d'événement pour le bouton "av-carroussel"
document.getElementById("av-carroussel").addEventListener("click", function() {
    num_img--;
    if (num_img < 0) {
        num_img = max_num_img; // Remplacez max_num_img par le nombre total d'images
    }
    imageElement.src = "image/image/" + idProduit + "/" + num_img + ".jpg";
});

// Écouteur d'événement pour le bouton "ap-carroussel"
document.getElementById("ap-carroussel").addEventListener("click", function() {
    num_img++;
    if (num_img > max_num_img) {
        num_img = 0;
    }
    imageElement.src = "image/image/" + idProduit + "/" + num_img + ".jpg";
});

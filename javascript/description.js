// Récupération de l'ID du produit à partir de l'URL
var urlParams = new URLSearchParams(window.location.search);
var idProduit = urlParams.get('id');

// Définition du chemin de l'image avec l'ID du produit
var imagePath = "image/image/" + idProduit + ".jpg";

// Récupération de l'élément image
var imageElement = document.getElementById("add_img");

// Attribution du chemin de l'image à la propriété src de l'élément image
imageElement.src = imagePath;

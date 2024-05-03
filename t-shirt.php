<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        #container {
            width: 30vw;
            height: 80vh;
            background-image: url('assets/t-shirt.png'); /* Image de t-shirt */
            background-size: 100% auto; /* Rend l'image responsive */
            background-repeat: no-repeat; /* Empêche la répétition de l'image */
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #uploadedImageContainer {
            width: 100%;
            height: 100%;
            position: relative;
        }

        #uploadedImage {
            max-width: 100%; /* Redimensionne l'image pour qu'elle soit contenue dans le conteneur */
            max-height: 100%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        #fileInput {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div id="container">
    <div id="uploadedImageContainer">
        <!-- Image uploadée par l'utilisateur -->
    </div>
</div>
<input type="file" id="fileInput" accept="image/*">

<script>
    window.addEventListener('DOMContentLoaded', () => {
        const fileInput = document.getElementById('fileInput');
        const uploadedImageContainer = document.getElementById('uploadedImageContainer');

        fileInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    uploadedImageContainer.style.backgroundImage = `url(${e.target.result})`;
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>
</body>
</html>

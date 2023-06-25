// pour avoir un input file cacher et qui affiche les images sélectionner mais pas adapté pour récupérer les images dans le formulaire

// // let userContainer = document.querySelector('.userContainer');
// let addButton = document.querySelector('#custom-img-btn');
// let removeButtons = document.querySelectorAll('.close');
// let divImages = document.getElementById('publication_image');
// const maxImages = 4;

// function addImageContainer(file) {
//     let divImages = document.getElementById('publication_image');
//     let container = document.createElement("div");
//     container.classList.add("image-container");

//     let image = document.createElement("img");
//     image.src = URL.createObjectURL(file);
//     image.addEventListener("load", function () {
//         URL.revokeObjectURL(this.src);
//     });

//     let removeButton = document.createElement("i");
//     removeButton.classList.add("fa-solid", "fa-xmark", "close", "remove_btn");
//     removeButton.addEventListener('click', removeFunction);

//     container.appendChild(removeButton);
//     container.appendChild(image);

//     divImages.appendChild(container);
// }


// function updateRemoveButtons() {
//     removeButtons = document.querySelectorAll('.close');

//     removeButtons.forEach(function (removeButton) {
//         removeButton.addEventListener('click', removeFunction);
//     });
// }

// function removeFunction() {
//     let container = this.parentNode;
//     divImages.removeChild(container);

//     updateRemoveButtons();
// }


// let divMaxImages;

// function createDivMaxImages() {
//     divMaxImages = document.createElement("div");
//     divMaxImages.classList.add("divMaxImages");

//     let pMaxImages = document.createElement("p");
//     pMaxImages.innerHTML = "Le nombre maximum d'images qui est de 4 est atteint."

//     let closeMaxImages = document.createElement("p");
//     closeMaxImages.innerHTML = "Fermer"
//     closeMaxImages.classList.add("blueButton");
//     closeMaxImages.classList.add("closeMaxImagesButton");

//     divMaxImages.appendChild(pMaxImages);
//     divMaxImages.appendChild(closeMaxImages);

//     userContainer.appendChild(divMaxImages);

//     let closeMaxImagesButton = document.querySelector(".closeMaxImagesButton");
//     closeMaxImagesButton.addEventListener("click", function () {
//         userContainer.removeChild(divMaxImages);

//     })
// }

// addButton.addEventListener("click", function () {
//     if (divImages.childElementCount >= maxImages) {
//         createDivMaxImages();
//     } else {
//         let fileInput = document.createElement("input");
//         fileInput.id = 'formwithfileinput';

//         fileInput.type = "file";
//         fileInput.accept = "image/*";
//         fileInput.multiple = true;
//         fileInput.name = "userfile[]";

//         fileInput.addEventListener("change", function (e) {
//             let files = e.target.files;

//             for (let i = 0; i < files.length; i++) {
//                 let file = files[i];

//                 if (file.size > 4194304) {
//                     alert("Le fichier est trop volumineux. Veuillez sélectionner une image inférieure à 4MB Ko.");
//                     continue; // Passe à la prochaine itération de la boucle sans ajouter l'image
//                 }

//                 addImageContainer(file);
//             }

//             updateRemoveButtons();
//         });

//         fileInput.click();
//     }
// });


// document.addEventListener("click", function (event) {
//     if (
//         divMaxImages &&
//         userContainer.contains(divMaxImages) && // Vérification si divMaxImages est un enfant de userContainer
//         !divMaxImages.contains(event.target) &&
//         event.target !== addButton
//     ) {
//         userContainer.removeChild(divMaxImages);
//     }
// });

let form = document.getElementById("myForm");
let fileInputContainer = document.getElementById("fileInputContainer");

let fileInput = document.createElement("input");
fileInput.type = "file";
fileInput.accept = "image/*";
fileInput.multiple = true;
fileInput.name = "userfile[]";
fileInput.required = true;

fileInputContainer.appendChild(fileInput);

let selectedFiles = [];

fileInput.addEventListener("change", function (event) {
    let files = event.target.files;

    for (let i = 0; i < files.length; i++) {
        if (selectedFiles.length >= 4) {
            // Déjà sélectionné 4 images, ignorer les fichiers supplémentaires
            break;
        }

        let file = files[i];

        if (file.size <= 4 * 1024 * 1024) {
            // La taille du fichier est dans la limite autorisée
            selectedFiles.push(file);
        } else {
            alert("Veuillez sélectionner des fichiers image dont la taille ne dépasse pas 4 Mo.");
            selectedFiles = []; // Réinitialise les fichiers sélectionnés
            fileInput.value = null;
            return;
        }
    }

    // Mettez à jour les fichiers sélectionnés dans l'input fichier (maximum 4)
    updateFileInput(selectedFiles);
});

function updateFileInput(files) {
    let dataTransfer = new DataTransfer();

    for (let i = 0; i < files.length; i++) {
        dataTransfer.items.add(files[i]);
    }

    fileInput.files = dataTransfer.files;
}


fileInputContainer.appendChild(fileInput);
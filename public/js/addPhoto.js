// let userContainer = document.querySelector('.userContainer');
let addButton = document.querySelector('#custom-img-btn');
let removeButtons = document.querySelectorAll('.close');
let divImages = document.getElementById('publication_image');
const maxImages = 4;

function addImageContainer(file) {
    let divImages = document.getElementById('publication_image');
    let container = document.createElement("div");
    container.classList.add("image-container");

    let image = document.createElement("img");
    image.src = URL.createObjectURL(file);
    image.addEventListener("load", function () {
        URL.revokeObjectURL(this.src);
    });

    let removeButton = document.createElement("i");
    removeButton.classList.add("fa-solid", "fa-xmark", "close", "remove_btn");
    removeButton.addEventListener('click', removeFunction);

    container.appendChild(removeButton);
    container.appendChild(image);

    divImages.appendChild(container);
}


function updateRemoveButtons() {
    removeButtons = document.querySelectorAll('.close');

    removeButtons.forEach(function (removeButton) {
        removeButton.addEventListener('click', removeFunction);
    });
}

function removeFunction() {
    let container = this.parentNode;
    divImages.removeChild(container);

    updateRemoveButtons();
}


let divMaxImages;

function createDivMaxImages() {
    divMaxImages = document.createElement("div");
    divMaxImages.classList.add("divMaxImages");

    let pMaxImages = document.createElement("p");
    pMaxImages.innerHTML = "Le nombre maximum d'images qui est de 4 est atteint."

    let closeMaxImages = document.createElement("p");
    closeMaxImages.innerHTML = "Fermer"
    closeMaxImages.classList.add("blueButton");
    closeMaxImages.classList.add("closeMaxImagesButton");

    divMaxImages.appendChild(pMaxImages);
    divMaxImages.appendChild(closeMaxImages);

    userContainer.appendChild(divMaxImages);

    let closeMaxImagesButton = document.querySelector(".closeMaxImagesButton");
    closeMaxImagesButton.addEventListener("click", function () {
        userContainer.removeChild(divMaxImages);

    })
}

addButton.addEventListener("click", function () {
    if (divImages.childElementCount >= maxImages) {
        createDivMaxImages();

    } else {
        let fileInput = document.createElement("input");
        fileInput.type = "file";
        fileInput.accept = "image/*";
        fileInput.multiple = true;

        fileInput.addEventListener("change", function (e) {
            let files = e.target.files;

            for (let i = 0; i < files.length; i++) {
                if (divImages.childElementCount >= maxImages) {
                    createDivMaxImages();
                    break;
                }

                let file = files[i];
                addImageContainer(file);
            }

            updateRemoveButtons();
        });

        fileInput.click();
    }
});

document.addEventListener("click", function (event) {
    if (
        divMaxImages &&
        userContainer.contains(divMaxImages) && // Vérification si divMaxImages est un enfant de userContainer
        !divMaxImages.contains(event.target) &&
        event.target !== addButton
    ) {
        userContainer.removeChild(divMaxImages);
    }
});

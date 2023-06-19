let images = document.querySelectorAll(".clickable-image");

images.forEach((image) => {
    let title = "Cliquer pour agrandir l'image";
    image.setAttribute("title", title);
    image.addEventListener("click", () => displayImage(image));
});

let modal = document.getElementById("modal");
let closeButton = document.querySelector("#modal .close");

function displayImage(image) {
    let imageUrl = image.src;

    let modalImage = document.getElementById("modalImage");
    modalImage.src = imageUrl;
    modal.style.display = "block";
}

function closeModal() {
    modal.style.display = "none";
}

closeButton.addEventListener("click", closeModal);

modal.addEventListener("click", (event) => {
    if (event.target === modal) {
        closeModal();
    }
});

let cancel = document.getElementById('cancel');
let cancelReservation = document.getElementById('cancelReservation');
toggleMenu(cancel, cancelReservation);

let cancelDesactivate = document.getElementById('cancelReservation');

cancelDesactivate.addEventListener('click', () => {
    cancelReservation.style.display = "none";
});

// Mdifier les services
let editButton = document.getElementById("editButton");
let paragraph = document.querySelector(".further p");

function replaceParagraphWithInput() {
    let paragraph = document.querySelector(".further p");
    editButton.style.display = "none";
    let input = document.createElement("input");
    input.type = "text";
    input.value = paragraph.textContent;

    paragraph.replaceWith(input);

    let confirmForm = document.createElement("form");
    confirmForm.method = "post";
    confirmForm.action = "url-de-votre-action";

    let confirmButton = document.createElement("input");
    confirmButton.type = "submit";
    confirmButton.value = "Valider";
    confirmButton.classList.add("goldenButton");
    confirmButton.addEventListener("click", saveChanges);

    let cancelButton = document.createElement("button");
    cancelButton.textContent = "Annuler";
    cancelButton.classList.add("blueButton");
    cancelButton.addEventListener("click", cancelChanges);

    let buttonContainer = document.createElement("div");
    buttonContainer.classList.add("serviceButton")
    confirmForm.appendChild(confirmButton);
    buttonContainer.appendChild(confirmForm);
    buttonContainer.appendChild(cancelButton);
    input.after(buttonContainer);
}

function saveChanges() {
    let input = document.querySelector(".further input");
    let newValue = input.value;

    let newParagraph = document.createElement("p");
    newParagraph.textContent = newValue;

    let buttonContainer = input.nextElementSibling;
    buttonContainer.remove();
    input.replaceWith(newParagraph);

    editButton.style.display = "block";
}

function cancelChanges() {
    let input = document.querySelector(".further input");
    let buttonContainer = input.nextElementSibling;

    buttonContainer.remove();
    input.replaceWith(paragraph);

    editButton.style.display = "block";
}

editButton.addEventListener("click", replaceParagraphWithInput);

let readDelete = document.getElementById('readDelete');
let readDeleteMenu = document.getElementById('readDeleteMenu');
toggleMenu(readDelete, readDeleteMenu);

let cancel = document.querySelector('.cancel');

cancel.addEventListener('click', () => {
    readDeleteMenu.style.display = "none";
});

let readDeleteElementsList = document.querySelectorAll('.readDelete');
let readDeleteMenuList = document.querySelectorAll('.readDeleteMenu');

readDeleteElementsList.forEach(function (element, index) {
    toggleMenu(element, readDeleteMenuList[index]);
});


let readDesactivate = document.querySelectorAll('.readDesactivate');
let readDesactivateMenu = document.querySelectorAll('.readDesactivateMenu');

readDesactivate.forEach(function (element, index) {
    toggleMenu(element, readDesactivateMenu[index]);
});

let cancelDesactivate = document.querySelectorAll('.cancelDesactivate');

cancelDesactivate.forEach(function (element, index) {
    element.addEventListener('click', () => {
        readDesactivateMenu[index].style.display = "none";
    });
});

let cancelDelete = document.querySelectorAll('.cancelDelete');

cancelDelete.forEach(function (element, index) {
    element.addEventListener('click', () => {
        readDeleteMenuList[index].style.display = "none";
    });
});

let readDeleteElementsList = document.querySelectorAll('.readDelete');
let readDeleteMenuList = document.querySelectorAll('.readDeleteMenu');

readDeleteElementsList.forEach(function (element, index) {
    toggleMenu(element, readDeleteMenuList[index]);
});

let cancel = document.querySelectorAll('.cancel');

cancel.forEach(function (element, index) {
    element.addEventListener('click', () => {
        readDeleteMenuList[index].style.display = "none";
    });
});
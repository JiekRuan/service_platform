
let readDeleteElementsList = document.querySelectorAll('.readDelete');
let readDeleteMenuList = document.querySelectorAll('.readDeleteMenu');

readDeleteElementsList.forEach(function (element, index) {
    toggleMenu(element, readDeleteMenuList[index]);
});
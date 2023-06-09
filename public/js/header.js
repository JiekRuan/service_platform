let headerBurger = document.getElementById('headerBurger');
let headerBurgerContent = document.getElementById('headerBurgerContent');
toggleMenu(headerBurger.children[0], headerBurgerContent);

// format desktop
let search = document.getElementById('search');
let searchForm = document.getElementById('searchForm');
toggleSearchMenu(search.children[0], searchForm, search);

// format mobile
let searchMobile = document.getElementById('searchMobile');
let searchFormMobile = document.getElementById('searchFormMobile');
toggleSearchMenu(searchMobile.children[0], searchFormMobile, searchMobile);

// fonction pour faire apparaitre le input de recherche et cache l'icone losqu'on appuie dessus
function toggleSearchMenu(imageElement, menuElement, searchElement) {
    let isMenuVisible = false;

    imageElement.addEventListener('click', () => {
        if (isMenuVisible) {
            hideMenu();
        } else {
            showMenu();
        }
    });

    function showMenu() {
        if (isMenuVisible) {
            return;
        }
        menuElement.style.display = 'flex';
        isMenuVisible = true;
        searchElement.style.display = 'none';
    }

    function hideMenu() {
        if (!isMenuVisible) {
            return;
        }
        menuElement.style.display = 'none';
        isMenuVisible = false;
        searchElement.style.display = 'block';
    }
}

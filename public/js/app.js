function toggleMenu(imageElement, menuElement) {
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
        document.addEventListener('click', handleOutsideClick);
    }

    function hideMenu() {
        if (!isMenuVisible) {
            return;
        }
        menuElement.style.display = 'none';
        isMenuVisible = false;
        document.removeEventListener('click', handleOutsideClick);
    }

    function handleOutsideClick(event) {
        if (!menuElement.contains(event.target) && event.target !== imageElement) {
            hideMenu();
        }
    }
}
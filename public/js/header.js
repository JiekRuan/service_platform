let desktop = document.getElementById("desktop");
let windowWidth = window.innerWidth;

if (windowWidth < 1024) {
    desktop.style.display = "none"
} else {
    desktop.style.display = "flex"
}
let searchFilter = document.getElementById('searchFilter');
let filterBlock = document.getElementById('filterBlock');
toggleMenu(filterBlock, searchFilter);

let filterClose = document.getElementById('filterClose');

filterClose.addEventListener('click', () => {
  searchFilter.style.display = "none";
});
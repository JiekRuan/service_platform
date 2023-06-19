let superContainers = document.querySelectorAll('.superContainer');
let superContainers2 = document.querySelectorAll('.unroll');
let chevronDowns = document.querySelectorAll('.superContainer .arrow');
let isSuperContainer2Hidden = false;

function toggleSuperContainer(index) {
  if (isSuperContainer2Hidden) {
    chevronDowns[index].classList.remove('fa-chevron-up');
    chevronDowns[index].classList.add('fa-chevron-down');
    superContainers2[index].style.display = "none";
    console.log("cacher");
    isSuperContainer2Hidden = false;
  } else {
    chevronDowns[index].classList.remove('fa-chevron-down');
    chevronDowns[index].classList.add('fa-chevron-up');
    superContainers2[index].style.display = "flex";
    console.log("pas cacher");
    isSuperContainer2Hidden = true;
  }
}

superContainers.forEach((container, index) => {
  chevronDowns[index].addEventListener('click', () => {
    toggleSuperContainer(index);
  });
});

let cancelReservation = document.querySelectorAll('.cancelReservation');
let cancelReservationConfirm = document.querySelectorAll('.cancelReservationConfirm');

cancelReservation.forEach(function (element, index) {
  toggleMenu(element, cancelReservationConfirm[index]);
});

let cancel = document.querySelectorAll('.cancelDesactivate');

cancel.forEach(function (element, index) {
    element.addEventListener('click', () => {
      cancelReservationConfirm[index].style.display = "none";
    });
});
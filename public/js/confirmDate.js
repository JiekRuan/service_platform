// pour formater les dates
let fromDateInput = document.getElementById('fromDate');
let toDateInput = document.getElementById('toDate');

fromDateInput.addEventListener('input', () => {
  let fromDate = new Date(fromDateInput.value);
  let toDate = new Date(toDateInput.value);

  if (!fromDate) {
    toDateInput.disabled = true;
    return;
  }

  toDateInput.disabled = false;
  toDateInput.min = fromDateInput.value;

  if (toDate && toDate < fromDate) {
    toDateInput.value = '';
  }
});

toDateInput.addEventListener('input', () => {
  calculatePrice();
});


function calculatePrice() {
  let fromDate = new Date(fromDateInput.value);
  let toDate = new Date(toDateInput.value);

  if (toDate < fromDate) {
    toDateInput.value = '';
  }

  // Calcul du nombre de jours
  let timeDiff = Math.abs(toDate.getTime() - fromDate.getTime());
  let numOfDays = Math.ceil(timeDiff / (1000 * 3600 * 24)) + 1;

  let pricePerDayElement = document.getElementById("price");
  let pricePerDay = parseFloat(pricePerDayElement.textContent);

  let totalPriceElement = document.getElementById("totalPrice");
  let totalPrice = parseFloat(totalPriceElement.textContent);

  let price = pricePerDay * numOfDays;
  let formattedPrice = price.toLocaleString(); // Ajoute l'espace tous les trois chiffres
  totalPriceElement.textContent = formattedPrice + "€";
}

calculatePrice();
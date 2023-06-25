function customSelectSubmit(element) {
    let select = element;
    let numberOfOptions = select.children.length;
  
    select.classList.add('select-hidden');
    let selectContainer = document.createElement('div');
    selectContainer.classList.add('select');
    select.parentNode.insertBefore(selectContainer, select.nextSibling);
    let selectStyled = document.createElement('div');
    selectStyled.classList.add('select-styled');
    selectContainer.appendChild(selectStyled);
  
    let selectOptions = document.createElement('ul');
    selectOptions.classList.add('select-options');
    selectContainer.appendChild(selectOptions);
  
    for (let i = 0; i < numberOfOptions; i++) {
      let option = select.children[i];
      let listItem = document.createElement('li');
      listItem.textContent = option.textContent;
      listItem.setAttribute('rel', option.value);
      selectOptions.appendChild(listItem);
  
      if (option.selected) {
        selectStyled.textContent = option.textContent;
      }
  
      if (option.selected && !select.hasAttribute('multiple')) {
        listItem.classList.add('selected');
      }
    }
  
    let listItems = selectOptions.children;
  
    selectStyled.addEventListener('click', function (e) {
      e.stopPropagation();
      let activeSelect = document.querySelector('div.select-styled.active');
      if (activeSelect && activeSelect !== this) {
        activeSelect.classList.remove('active');
        activeSelect.nextElementSibling.style.display = 'none';
      }
      this.classList.toggle('active');
      this.nextElementSibling.style.display = this.classList.contains('active') ? 'block' : 'none';
    });
  
    for (let j = 0; j < listItems.length; j++) {
      listItems[j].addEventListener('click', function (e) {
        e.stopPropagation();
        selectStyled.textContent = this.textContent;
        selectStyled.classList.remove('active');
        select.value = this.getAttribute('rel');
        selectOptions.style.display = 'none';
  
        // Remove selected class from all list items
        for (let k = 0; k < listItems.length; k++) {
          listItems[k].classList.remove('selected');
        }
  
        // Add selected class to the clicked list item
        this.classList.add('selected');
  
        let form = select.closest('form');
        if (form) {
          form.submit(); // Soumettre le formulaire
        }
      });
    }
  
    document.addEventListener('click', function () {
      selectStyled.classList.remove('active');
      selectOptions.style.display = 'none';
    });
  }
  
  let selectsSubmit = document.querySelectorAll('.mySelect');
  for (let i = 0; i < selectsSubmit.length; i++) {
    customSelectSubmit(selectsSubmit[i]);
  
    let form = selectsSubmit[i].closest('form');
    if (form) {
      selectsSubmit[i].addEventListener('change', function () {
        form.submit(); // Soumettre le formulaire
      });
    }
  }
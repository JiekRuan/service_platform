// https://codepen.io/wallaceerick/pen/nJLPvN
// adapter en JS par chatGPT

function customSelect(element) {
    let select = element;
    let numberOfOptions = select.children.length;
  
    select.classList.add('select-hidden');
    let selectContainer = document.createElement('div');
    selectContainer.classList.add('select');
    select.parentNode.insertBefore(selectContainer, select.nextSibling);
    let selectStyled = document.createElement('div');
    selectStyled.classList.add('select-styled');
    selectStyled.textContent = select.children[0].textContent;
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
      });
    }
  
    document.addEventListener('click', function () {
      selectStyled.classList.remove('active');
      selectOptions.style.display = 'none';
    });
  }
  
  let selects = document.getElementsByTagName('select');
  for (let i = 0; i < selects.length; i++) {
    customSelect(selects[i]);
  }
  
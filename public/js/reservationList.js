    let superContainer = document.querySelector('.superContainer');
    let chevronDown = superContainer.querySelector('#arrow');
    let superContainer2 = document.querySelector('.superContainer2');
    let chevronUp = superContainer2.querySelector('#arrow2');
    let isSuperContainer2Hidden = true;
    let isSuperContainerHidden = false;
  
    function toggleSuperContainer2() {
      if (isSuperContainer2Hidden) {
        superContainer2.style.display = '';
        superContainer.style.display = 'none';
        chevronUp.classList.remove('fa-chevron-up');
        chevronUp.classList.add('fa-chevron-down');
        isSuperContainer2Hidden = false;
      } else {
        superContainer2.style.display = 'none';
        superContainer.style.display = '';
        chevronUp.classList.remove('fa-chevron-down');
        chevronUp.classList.add('fa-chevron-up');
        isSuperContainer2Hidden = true;
      }
      chevronUp.classList.add('fa-chevron-down');
      chevronUp.classList.remove('fa-chevron-up');
    }
  
    function toggleSuperContainer() {
      if (isSuperContainer2Hidden) {
        superContainer.style.display = '';
        superContainer2.style.display = 'none';
        chevronDown.classList.remove('fa-chevron-up');
        chevronDown.classList.add('fa-chevron-down');
        isSuperContainer2Hidden = false;
      } else {
        superContainer.style.display = 'none';
        superContainer2.style.display = '';
        chevronDown.classList.remove('fa-chevron-down');
        chevronDown.classList.add('fa-chevron-up');
        isSuperContainer2Hidden = true;
      }

      chevronDown.classList.add('fa-chevron-down');
      chevronDown.classList.remove('fa-chevron-up');
    }
  
    toggleSuperContainer();
  
    chevronDown.addEventListener('click', toggleSuperContainer);
    chevronUp.addEventListener('click', toggleSuperContainer2);  
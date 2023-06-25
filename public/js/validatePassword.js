function validatePassword() {
    let password = document.getElementById("password").value;
    let confirmedPassword = document.getElementById("confirmedPassword").value;

    if (password === confirmedPassword) {
        return true;
    } else {
        let superContainer = document.querySelectorAll('.superContainer');
        let div = document.createElement('div');
        let p = document.createElement('p');
        let button = document.createElement('button');
        p.innerHTML = "Les mots de passe ne correspondent pas."
        button.innerHTML = "Confirmer";
        button.classList.add('goldenButton');
        div.classList.add('popup');
        div.appendChild(p);
        div.appendChild(button);
        superContainer[1].appendChild(div);

        button.addEventListener('click', function () {
            div.style.display = "none";
        })

        document.addEventListener('click', function (event) {
            if (!div.contains(event.target) && event.target !== button) {
                div.style.display = "none";
            }
        });

        return false;
    }
}
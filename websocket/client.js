let userName = document.cookie.split("; ").find(row=>row.startsWith("userName=")).split("=")[1];
let loggedInUserId = document.cookie.split("; ").find(row=>row.startsWith("userId=")).split("=")[1];

console.log(loggedInUserId,userName)
const socket = new WebSocket('ws://localhost:8080');

socket.onopen = () => {
    console.log('Connecté au serveur de chat.');

    let form = document.getElementById('formMessage');
    form.addEventListener('submit', (event) => {
        event.preventDefault();
        let input = document.getElementById('message');
        let message = input.value;

        // Créer un JSON contenant le message
        let data = {
            message: message,
            userId: loggedInUserId,
            userName: userName
        };

        // Envoie le message au server
        socket.send(JSON.stringify(data));
        console.log(data)
        // Efface le champ de saisie
        input.value = '';


        let messageP = document.createElement('p');
        messageP.textContent = message;
        messageP.classList.add("message");
        messageP.classList.add("message-sent");


        // Récupère la div de messages et ajoute le nouveau message à la fin
        let chat = document.getElementById('messageSent');
        chat.appendChild(messageP);
    });
};

socket.onmessage = (event) => {

    let message = JSON.parse(event.data);
    console.log('Nouveau message :', message.message);
    console.log(message);

    // Récupère le nom de l'utilisateur émetteur
    let userNameS = message.userName;
    let userIdS = message.userId;

    // Vérifie si le message provient de l'utilisateur connecté
    const isOwnMessage = (userIdS === loggedInUserId);

    let messageP = document.createElement('p');
    messageP.textContent = message;

    if (isOwnMessage) {
        messageP.textContent = `Moi: ${message.message}`;
        messageP.classList.add("message");
        messageP.classList.add("message-received");
    } else {
        messageP.textContent = `${userNameS}:  ${message.message}`;
        messageP.classList.add("message");
        messageP.classList.add("message-received");
    }

    // Récupère la div de messages et ajoute le nouveau message à la fin
    let chat = document.getElementById('messageSent');
    chat.appendChild(messageP);
};

socket.onclose = () => {
    console.log('Connexion au serveur de chat fermée.');
};

socket.onerror = (error) => {
    console.error('Erreur de connexion :', error);
};
<?php
if ($_SESSION["role"] !== "customer") {
    global $domain;
    header('Location: http://' . $domain . '/home');
}
if ($_SESSION["status"] === "desactive") {
    global $domain;
    header('Location: http://' . $domain . '/user/disableAccount');
}
?>


<?php
include 'public/templates/component/header.php';
?>
<link rel="stylesheet" href="../public/css/chat.css">

<div class="messenger">
    <div class="sidebar">
        <div class="titre">
            <h2>Discussion</h2>
        </div>
        <input class="amisinput" type="text" placeholder="  Rechercher...">
        <ul>
            <li>adresse 1</li>
            <li>adresse 2</li>
            <li>adresse 3</li>
            <li>adresse 4</li>
            <li>adresse 5</li>
            <li>adresse 6</li>
            <li>adresse 7</li>
            <li>adresse 8</li>
            <li>adresse 9</li>
        </ul>
    </div>

    <div class="chat">
        <div class="chatheader">
            <div class="profile-info">
                <a href="#" class="chat_return">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <h3>adresse</h3>
            </div>
        </div>

        <div class="messages" id="messageSent">
<!--            <div class="message message-sent" id="messageSent">-->
<!--            </div>-->
<!--            <div class="message message-received" id="messageReceived">-->
<!--            </div>-->
        </div>

        <div class="send-icons">
            <div class="icons_chat">
                <i class="fa-solid fa-image"></i>
            </div>
            <form action="" id="formMessage" class="send-message">
                <div class="input-with-icon">
                    <input type="text" id="message" placeholder="Tapez un message...">
                </div>
                <button type="submit" class="blueGoldButton">Envoyer</button>
            </form>

        </div>
    </div>
</div>

</body>
<script src="../../../websocket/client.js"></script>
<script src="../public/js/chat.js"></script>

</html>
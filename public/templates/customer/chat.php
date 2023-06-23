<?php include 'public/templates/component/header.php';
setcookie("userId",$_SESSION['userId'],time()+3600);
setcookie("userName",$_SESSION['userName'],time()+3600);
?>
<link rel="stylesheet" href="public/css/chat.css">

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

        <div class="messages">
            <div class="message message-sent">
            </div>
            <div class="message message-received">
            </div>
        </div>

        <div class="send-icons">
            <div class="icons_chat">
                <i class="fa-solid fa-image"></i>
            </div>
            <div class="send-message">
                <form action="" id="formMessage">
                    <div class="input-with-icon">
                        <input type="text" id="message" placeholder="Tapez un message...">
                    </div>
                    <button type="submit" class="blueGoldButton">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
<script src="client.js"></script>
<script src="public/js/chat.js"></script>

</html>
<head>
    <link rel="stylesheet" href="../../css/chat.css">
    <link rel="stylesheet" href="../../css/global.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<?php include "../componant/header.html" ?>
<div class="messenger">
	<div class="sidebar">
		<div class="titre">
			<h2>Discussion</h2>
		</div>
		<input class="amisinput" type="text" placeholder="  Rechercher...">
		<ul>
			<li>client 1</li>
			<li>client 2</li>
			<li>client 3</li>
			<li> client 4</li>
			<li> client 5</li>
			<li> client 6</li>
			<li>client 7</li>
			<li> client 8</li>
			<li> client 9</li>
			<li> client 10</li>
		</ul>
	</div>
	<div class="chat">
		<div class="chatheader">
			<div class="profile-info">
				<img class="profile-pic" src="/img/pp.png" alt="">
				<h3>chris</h3>
			</div>

		</div>

		<div class="messages">
			<div class="message message-sent">
				<p>Hello, how are you?</p>
			</div>
			<div class="message message-received">
				<p>I'm doing well, thank you!</p>
			</div>
			<div class="message message-received">
				<p>I'm doing well, thank you!</p>
			</div>
			<div class="message message-received">
				<p>I'm doing well, thank you!</p>
			</div>
			<div class="message message-received">
				<p>I'm doing well, thank you!</p>
			</div>
			<div class="message message-received">
				<p>I'm doing well, thank you!</p>
			</div>
			<div class="message message-received">
				<p>I'm doing well, thank you!</p>
			</div>
			<div class="message message-received">
				<p>I'm doing well, thank you!</p>
			</div>
			<div class="message message-received">
				<p>I'm doing well, thank you!</p>
			</div>
			<div class="message message-received">
				<p>I'm doing well, thank you!</p>
			</div>
			<div class="message message-received">
				<p>I'm doing well, thank you!</p>
			</div>
			<div class="message message-received">
				<p>I'm doing well, thank you!</p>
			</div>
			<div class="message message-received">
				<p>I'm doing well, thank you!</p>
			</div>
			<div class="message message-received">
				<p>I'm doing well, thank you!</p>
			</div>
			<div class="message message-received">
				<p>I'm doing well, thank you!</p>
			</div>
			<div class="message message-sent">
				<p>I'm fine aswell</p>
			</div>
		</div>
		<div class="send-icons">
			<div class="icons_chat">
				<span class="material-icons-outlined">image</span>
				<span class="material-icons-outlined" id="description">description</span>
			</div>
			<div class="send-message">
				<div class="input-with-icon">
					<input type="text" placeholder="Tapez un message...">
					<span class="material-icons-outlined">sentiment_satisfied</span>
				</div>
                <button class="blueGoldButton">Envoyer</button>
			</div>
		</div>
	</div>
</div>

</body>
<script src="../../js/chat.js"></script>

</html>
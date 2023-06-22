<?php
include 'public/templates/component/header.php' ?>
<link rel="stylesheet" href="../public/css/loginSignupParametre.css">

<div class="superContainer">
    <div class="Container">
        <h1>CONNEXION</h1>

        <form class="infoForm" method="POST" action="loginMethod">
            <div class="row">
                <input name="name" type="text" class="inputText" placeholder="Email" required>
            </div>
            <div class="row">
                <input name="password" type="password" class="inputText" placeholder="Mot de passe" required>
            </div>
            <input type="submit" class="goldenButton" value="Se connecter">

        </form>
        <p>Vous n'avez pas encore de compte ? <a href=<?= "http://" . $domain . "/user/signup" ?>>Enregistrez-vous ici pour bénéficier de nos services exclusifs.</a></p>
    </div>

</div>
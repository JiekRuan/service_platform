<?php include 'public/templates/component/header.php' ?>
<link rel="stylesheet" href="../public/css/loginSignupParametre.css">
<link rel="stylesheet" href="../public/css/global.css">



<div class="superContainer">
    <div class="Container">
        <h1>INSCRIPTION</h1>

        <form class="infoForm" method="POST" action="">
            <div class="radiobox">
                <label class="role"><input name="role" type="radio" name="bouton" value="madame" checked>Madame</label>
                <label class="role"><input name="role" type="radio" name="bouton" value="monsieur">Monsieur</label>
                <label class="role"><input name="role" type="radio" name="bouton" value="autres">Autre(s)</label>
            </div>
            <div class="row">
                <input name="first_name" type="text" class="inputText" placeholder="Prénom" required>
            </div>
            <div class="row">
                <input name="last_name" type="text" class="inputText" placeholder="Nom de famille" required>
            </div>
            <div class="row">
                <input name="birthdate" type="date" class="inputText" placeholder="Date de naissance" required>
            </div>
            <div class="row">
                <input name="phone" type="tel" class="inputText" placeholder="Téléphone" minlength="10" maxlength="14" required>
            </div>
            <div class="row">
                <input name="email" type="email" class="inputText" placeholder="Email" required>
            </div>
            <div class="row">
                <input name="password" type="password" class="inputText" placeholder="Mot de passe" required>
            </div>
            <div class="row">
                <input name="confirmedPassword" type="password" class="inputText" placeholder="Confirmation du mot de passe" required>
            </div>
            <input type="submit" class="goldenButton" value="S'inscrire">
                    
        </form>
    </div>
</div>
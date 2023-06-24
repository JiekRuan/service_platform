<?php
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    global $domain;
    header('Location: http://' . $domain . '/home');
}
if ($_SESSION["status"] === "desactive") {
    global $domain;
    header('Location: http://' . $domain . '/user/disableAccount');
}
?>


<?php include 'public/templates/component/header.php' ?>
<link rel="stylesheet" href="../public/css/loginSignupParametre.css">
<link rel="stylesheet" href="../public/css/global.css">



<div class="superContainer">
    <div class="Container">
        <h2>PARAMÈTRES</h2>
        <?php if ($_SESSION['role'] == 'customer') { ?>
            <p class="descritionParametre">
                Votre vie privée est notre priorité, et nous veillons à ce que toutes les
                mesures de sécurité appropriées soient en place pour garantir la protection de vos données confidentielles.
            </p>
        <?php } ?>

        <form method="POST" action="settingsForm" class="infoForm">
            <!-- <div class="radiobox">
                <label class="role"><input name="role" type="radio" name="bouton" value="madame" checked>Madame</label>
                <label class="role"><input name="role" type="radio" name="bouton" value="monsieur">Monsieur</label>
                <label class="role"><input name="role" type="radio" name="bouton" value="autres">Autre(s)</label>
            </div> -->
            <!-- <div class="row">
                <input name="first_name" type="text" class="inputText" placeholder="Prénom" required>
            </div> -->
            <!-- <div class="row">
                <input name="last_name" type="text" class="inputText" placeholder="Nom de famille" required>
            </div> -->
            <div class="row">
                <input name="name" type="text" class="inputText" placeholder="Votre nom et prénom" value=<?= $_SESSION["userName"] ?> required>
            </div>
            <!-- <div class="row">
                <input name="birthdate" type="date" class="inputText" placeholder="Date de naissance" required>
            </div> -->
            <div class="row">
                <input name="phone" type="tel" class="inputText" placeholder="Téléphone" minlength="10" maxlength="14" value=<?= $_SESSION["phone"] ?> required>
            </div>
            <div class="row">
                <input name="email" type="email" class="inputText" placeholder="Email" value=<?= $_SESSION["email"] ?> required>
            </div>
            <input type="hidden" name="id" value=<?= $_SESSION["userId"] ?>>
            <input type="submit" class="goldenButton" value="Mettre à jour">

        </form>
    </div>
</div>


<div class="superContainer">
    <div class="Container">
        <h2>MODIFIER MOT DE PASSE</h2>

        <form class="infoForm" action="updatePassword" method="POST" onsubmit="return validatePassword()">
            <input type="hidden" name="id" value=<?= $_SESSION["userId"] ?>>
            <div class="row">
                <input id="password" name="password" type="password" class="inputText" placeholder="Mot de passe" required>
            </div>
            <div class="row">
                <input id="confirmedPassword" name="confirmedPassword" type="password" class="inputText" placeholder="Confirmation du mot de passe" required>
            </div>

            <input type="submit" class="goldenButton" value="Confirmer">
        </form>

    </div>
</div>

<script src="../public/js/validatePassword.js"></script>

<?php include 'public/templates/component/footer.php' ?>
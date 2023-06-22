<link rel="stylesheet" href="../public/css/footer.css">
<footer>

    <div class="footer1">
        <h3>Découvrir</h3>
        <!-- <p>Comment ça marche</p> -->
        <p><a href=<?= "http://" . $domain . "/conciergeService" ?>>Notre conciergerie</a></p>
    </div>
    <div class="footer1">
        <h3>S'informer</h3>
        <p><a href=<?= "http://" . $domain . "/aboutUs" ?>>À propos</a></p>
        <p><a href=<?= "http://" . $domain . "/policy" ?>>Politique de confidentialité</a></p>
        <p><a href=<?= "http://" . $domain . "/mentions" ?>>Mentions légales</a></p>
        <p><a href=<?= "http://" . $domain . "/contactUs" ?>>Contactez-nous</a></p>
    </div>

    <div class="footer2">
        <div class="footerinput">
            <h4 class="h3footer">Inscrivez vous à notre newsletter</h4>
            <div class="submit">
                <input type="text" class="newsletterInput" placeholder="E-mail">
                <button class="goldenButton">Envoyer</button>
            </div>
        </div>

        <div class="icons">
            <img src="../public/images/Facebook.svg" alt="facebook">
            <img src="../public/images/Linkedin.svg" alt="linkedin">
            <img src="../public/images/Twitter.svg" alt="twitter">
            <img src="../public/images/instagram.svg" alt="instagram">
        </div>
        <p class="ely"> &copy; 2023 Elysians Paris Tous droits réservés.</p>

    </div>

</footer>

</body>

</html>
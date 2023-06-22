<?php include 'public/templates/component/header.php' ?>
<div class="allowed">
  <h1>Erreur 405</h1>
  <h3>La page que vous recherchez semble introuvable.</h3>
  <p>La méthode de requête POST est inappropriée pour l'URL.</p>

  <p>Voici quelques liens utiles à la place :</p>
  <ul>
    <li><a href=<?= "http://" . $domain . "/home" ?>>Page d'accueil</a></li>
  </ul>
</div>


<?php include 'public/templates/component/footer.php' ?>
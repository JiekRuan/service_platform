<h1>Hetic Projet Final</h1>
Ce projet à pour objectif de mettre en oeuvre ainsi que de renforcer les outils acquis durant l'année, le tout grâce à une simulation avec une relation client. 
<hr>

## L'équipe &#x1F3E2; : 

<table>
  <tr>
    <th>Front End</th>
    <td>Chrisline Lin <br> <em> Lead Front </em> </td>
    <td>Faustine Charrier</td>
    <td>Nathan Luu</td>
    <td>Jonathan Luembe</td>
  </tr>
  <tr>
    <th>Back End</th>
    <td>Hugo Cieplucha <br> <em> Lead Front </em> </td>
    <td>Jiek Ruan</td>
    <td>Valentin Machefaux</td>
    <td>Fouad Lamnaouar</td>
  </tr>
</table>

<hr>

## Mission &#x1F50E; :

<p>Notre mission est de proposer une application spécialisée dans la gestion d'une plateforme de location de logements à Paris pour une entreprise familiale.</p>

## Informations : 
<ul>
    <li>Base de données utilisée : MySQL</li>
    <li>Informations concernant la DB dans le dossier src/database/database.php</li>
    <li>Si ce n'est pas fait, dans le dossier SQL `my.ini`, mettre `max_allowed_packet = 128M`</li>
</ul>

## Fonctionnalités :

- Responsive (toutes les pages ne sont pas adaptés aux larges écrans)

### En tant que client non connecté :
<ul>
    <li>Inscription un utilisateur</li>
    <li>Se connecter</li>
    <li>Voir les témoignages</li>
    <li>Rechercher un logement avec le nom, l'arrondissement, la capacité...</li>
</ul>

### En tant que client connecté :
<p>En plus des fonctionnalités lorsqu'on est pas connecté</p>
<ul>
    <li>Réserver un logement</li>
    <li>Annuler la réservation</li>
    <li>Ajouter et supprimer des logements en favoris</li>
    <li>Mettre un témoignage</li>
    <li>Modifier les paramètres du comptes</li>
    <li>Accéder à sa liste de réservations</li>
    <li>Chat (pas complètement fonctionnel)</li>
</ul>

### En tant que gestionnaire :
<ul>
    <li>Ajouter un logement</li>
    <li>Modifier un logement</li>
    <li>Supprimer un logement</li>
    <li>Modérer les témoignages clients</li>
    <li>Chat (pas complètement fonctionnel)</li>
    <li>Réservation de tous les clients</li>
</ul>

### En tant que personne de la logistique :
<ul>
    <li>Non implémenté</li>
</ul>

### En tant que admin :
<ul>
    <li>Modifier un rôle utilisateur</li>
    <li>Désactiver un utilisateur</li>
    <li>Supprimer un utilisateur</li>
</ul>

### Utilisation du chat :
Pour le moment, fonctionnel uniquement entre deux utilisateurs avec le rôle client, dans le terminal, écrire cette commande :
`php .\websocket\server.php`

### PS :

<p>Il se peut que certaines fonctionnalités n'ont pas été cité plus haut, n'hésitez pas à regarder partout.</p>
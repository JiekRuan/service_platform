<h1>Hetic Projet Final - Elysians Paris</h1>
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
    <td>Hugo Cieplucha <br> <em> Lead Back </em> </td>
    <td>Jiek Ruan</td>
    <td>Valentin Machefaux</td>
    <td>Fouad Lamnaouar</td>
  </tr>
</table>

<hr>

## Mission &#x1F50E; :

<p>Notre mission est de proposer une application spécialisée dans la gestion d'une plateforme de location de logements à Paris pour une entreprise familiale.</p>

## Informations : 

- Base de données utilisée : MySQL
- Architecture : MVC
- Informations concernant la DB dans le dossier src/database/database.php
- Si ce n'est pas fait, dans le dossier SQL `my.ini`, mettre `max_allowed_packet = 128M`
- Fichier pour la DB : `service_plateforme_2.sql`, le mot de passe pour chaque utilisateur est `aze`

## Fonctionnalités :

- Responsive (toutes les pages ne sont pas adaptés aux larges écrans)

### En tant que client non connecté :

- Inscription utilisateur
- Se connecter
- Voir les témoignages
- Rechercher un logement avec le nom, l'arrondissement, la capacité...


### En tant que client connecté :
En plus des fonctionnalités lorsqu'on est pas connecté</p>

- Réserver un logement
- Annuler la réservation
- Ajouter et supprimer des logements en favoris
- Mettre un témoignage
- Modifier les paramètres du comptes
- Accéder à sa liste de réservations
- Chat (pas complètement fonctionnel)


### En tant que gestionnaire :
- Ajouter un logement
- Modifier un logement
- Supprimer un logement
- Modérer les témoignages clients
- Chat (pas complètement fonctionnel)
- Réservation de tous les clients


### En tant que personne de la logistique :

- Non implémenté mais les vues sont présentes


### En tant que admin :
<ul>
    -Modifier un rôle utilisateur
    -Désactiver un utilisateur
    -Supprimer un utilisateur
</ul>

### Utilisation du chat :
Pour le moment, fonctionnel uniquement entre deux utilisateurs avec le rôle client, dans le terminal, écrire cette commande :
`php .\websocket\server.php`

### PS :

<p>Il se peut que certaines fonctionnalités n'ont pas été cité plus haut, n'hésitez pas à regarder partout.</p>
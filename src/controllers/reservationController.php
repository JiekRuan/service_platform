<?php

namespace MyApp\Controllers;

class ReservationController {
    function delReservation(){

        //  on instancie la réservation
        $reservation = new Reservation();

        //  on récupère l'id de la réservation en POST
        $reservation_id = $_POST['reservation_id'];

        //  on récupère les infos de la réservation à supprimer
        $reservation->getReservationById($reservation_id);

        //  on supprime la réservation
        $reservation->deleteReservation();

        //  on redirige l'utilisateur vers la page d'affichage des réservation
        $domain = $_SERVER['HTTP_HOST'];
        header('Location : http://' . $domain .'/ReservationList');
    }
}
<?php

namespace MyApp\Controllers;

class ReservationController {
    function delReservation(){
        //get les données de la réservation

        //  on instancie la réservation
        $reservation = new Reservation();

        //  on récupère les infos de la réservation à supprimer
        $reservation->getReservationById($reservation_id);

        //  on supprime la réservation
        $reservation->deleteReservation();

        //  on redirige l'utilisateur vers la page d'affichage des réservation
        header('Location :');
    }
}
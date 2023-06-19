<?php

namespace MyApp\Controllers;

require_once './model/Reservation.php';

class ReservationController {
    function reservationList(){
        $user_id = $_SESSION['user_id'];

        $reservation = new Reservation;
        $reservations = $reservation->getUserReservations($user_id);

        //  require de la page reservationList
        require_once '.../public\templates\customer\reservationList.php';
    }

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
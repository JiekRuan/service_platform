<?php

namespace MyApp\Controllers;

use MyApp\Models\Reservation as Reservation;

require_once 'src/model/Reservation.php';

class ReservationController {
    function reservationCancel(){
        require_once 'public\templates\customer\reservationCancel.php';
    }

    function reservationThanks(){
        require_once 'public\templates\customer\reservationThanks.php';
    }

    function confirmReservation(): void{
        // get les infos de la réservation



        $domain = $_SERVER['HTTP_HOST'];
        header('Location : http://' . $domain .'/reservationList');
    }

    function reservation(){
        $reservation_id = $_POST['reservation_id'];

        $reservation = new Reservation();
        $reservation->getReservationById($reservation_id);

        //  require de la page reservation detail
        require_once 'public\templates\customer\reservation.php';
    }

    function createTestimony(){
        $reservation_id = $_POST['reservation_id'];

        require_once 'public\templates\customer\createTestimony.php';
    }

    function reservationList(){
        $user_id = $_SESSION['user_id'];

        $reservation = new Reservation;
        $reservations = $reservation->getUserReservations($user_id);

        //  require de la page reservationList
        require_once 'public\templates\customer\reservationList.php';
    }

    function reservationDetails(){
        $reservation_id = $_GET['reservation_id'];

        $reservation = new Reservation();
        $reservation->getReservationById($reservation_id);

        //  require de la page reservation detail
        require_once 'public\templates\management\reservationDetails.php';
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
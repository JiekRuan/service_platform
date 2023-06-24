<?php

namespace MyApp\Controllers;

use MyApp\Models\Reservation as Reservation;

require_once 'src/model/Reservation.php';

class ReservationController {
    function reservationCancel(){
        require_once 'public\templates\customer\reservationCancel.php';
    }

    function reservationThanks(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // recup les données du form create
            $user_id = $_POST['user_id'];
            $apartment_id = $_POST['apartment_id'];
            $start_time = $_POST['fromDate'];
            $end_time = $_POST['toDate'];

            $reservation = new Reservation();
            // Definir les valeurs de l'appart
            $reservation->setUserId($user_id);
            $reservation->setApartmentId($apartment_id);
            $reservation->setStart($start_time);
            $reservation->setEnd($end_time);

            //Enregistrer les infos
            if ($reservation->addReservation()) {
                // header('Location: public\templates\management\listApartment.php');
                // global $domain;
                // header('Location: http://' . $domain . '/apartment/listApartement'); //a revoir pour les Location.
                require_once 'public\templates\customer\reservationThanks.php';
            } else {
                header('Location: public\templates\public\404.php');
            }
        }

    }

    function confirmReservation(){

        require_once 'public\templates\customer\ConfirmReservation.php';
    }

    function reservation(){
        $reservation_id = $_POST['reservation_id'];

        $reservation = new Reservation();
        // $reservation->getReservationById($reservation_id);

        //  require de la page reservation detail
        require_once 'public\templates\customer\reservation.php';
    }

    function createTestimony(){
        $reservation_id = $_POST['reservation_id'];

        require_once 'public\templates\customer\createTestimony.php';
    }

    function reservationList(){
        $user_id = $_SESSION['userId'];

        $reservation = new Reservation;
        $reservations = $reservation->getUserReservations($user_id);

        //  require de la page reservationList
        require_once 'public\templates\customer\reservationList.php';
    }

    function reservationDetails(){
        $reservation_id = $_GET['reservation_id'];

        $reservation = new Reservation();
        // $reservation->getReservationById($reservation_id);

        //  require de la page reservation detail
        require_once 'public\templates\management\reservationDetails.php';
    }

    function delReservation(){

        //  on instancie la réservation
        $reservation = new Reservation();

        //  on récupère l'id de la réservation en POST
        $reservation_id = $_POST['reservation_id'];

        //  on récupère les infos de la réservation à supprimer
        // $reservation->getReservationById($reservation_id);

        //  on supprime la réservation
        $reservation->deleteReservation();

        //  on redirige l'utilisateur vers la page d'affichage des réservation
        global $domain;
        header('Location : http://' . $domain .'/ReservationList');
    }

    public function chat(){


        
        require_once 'public\templates\management\chat.php';
    }
}
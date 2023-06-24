<?php

namespace MyApp\Controllers;

use MyApp\Models\Reservation as Reservation;

require_once 'src/model/Reservation.php';

class ReservationController
{
    // coté client
    function reservationCancel()
    {
        $id = $_POST['id'];
        $reservation = new Reservation();
        $result = $reservation->deleteReservation($id);
        require_once 'public\templates\customer\reservationCancel.php';
    }

    // coté gestion
    function delReservation()
    {
        $reservation_id = $_POST['id'];
        $reservation = new Reservation();
        $result = $reservation->deleteReservation($reservation_id);

        global $reservations;
        $reservations = $reservation->getAllReservations();
        require_once 'public\templates\management\reservationDetails.php';
    }

    function reservationThanks()
    {

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
                require_once 'public\templates\customer\reservationThanks.php';
            } else {
                header('Location: public\templates\public\404.php');
            }
        }
    }

    function confirmReservation()
    {
        require_once 'public\templates\customer\ConfirmReservation.php';
    }

    function reservation()
    {
        $reservation_id = $_POST['reservation_id'];
        $reservation = new Reservation();
        global $reservationInfo;
        $reservationInfo = $reservation->getReservationApart($reservation_id);
        require_once 'public\templates\customer\reservation.php';
    }

    function createTestimony()
    {
        $reservation_id = $_POST['reservation_id'];
        require_once 'public\templates\customer\createTestimony.php';
    }

    function reservationList()
    {
        $user_id = $_SESSION['userId'];

        $reservation = new Reservation();
        global $reservations;
        $reservations = $reservation->getUserReservations($user_id);

        require_once 'public\templates\customer\reservationList.php';
    }

    function reservationDetails()
    {
        $reservation = new Reservation();
        global $reservations;
        $reservations = $reservation->getAllReservations();
        require_once 'public\templates\management\reservationDetails.php';
    }

    public function chat()
    {
        require_once 'public\templates\management\chat.php';
    }
}

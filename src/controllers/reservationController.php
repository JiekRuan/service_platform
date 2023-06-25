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
        global $reservation_id;
        $reservation_id = $_POST['reservation_id'];
        $reservation = new Reservation();
        global $reservationInfo;
        $reservationInfo = $reservation->getReservationApart($reservation_id);
        require_once 'public\templates\customer\reservation.php';
    }

    // afficher le formulaire pour le témoignage
    function createTestimony()
    {
        $reservation_id = $_POST['reservation_id'];
        require_once 'public\templates\customer\createTestimony.php';
    }

    // création du témoignage
    function sendCreateTestimony()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // recup les données du form create
            $userId = $_POST['user_id'];
            $reservationId = $_POST['reservation_id'];
            $content = $_POST['content'];

            $reservation = new Reservation();
            $reservation->setId($reservationId);
            $reservation->setUserId($userId);
            $reservation->setContent($content);

            if ($reservation->addTestimony()) {
                require_once 'public\templates\customer\thanksTestimony.php';
            } else {
                header('Location: public\templates\public\404.php');
            }
        }
    }

    function reservationList()
    {
        $user_id = $_SESSION['userId'];

        $reservation = new Reservation();
        global $reservations;
        $reservations = $reservation->getUserReservations($user_id);

        $getTestimony = new Reservation();
        $getTestimony->setUserId($user_id);
        global $getTestimonies;
        $getTestimonies = $getTestimony->getTestimony();

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

    public function moderateTestimony()
    {
        $getTestimony = new Reservation();
        global $getTestimonies;
        $getTestimonies = $getTestimony->getAllTestimonies();
        require_once 'public\templates\management\moderateTestimony.php';
    }

    public function acceptTestimony()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];

            $getTestimony = new Reservation();
            $getTestimony->setId($id);
            $getTestimony->acceptTestimony();

            global $getTestimonies;
            global $domain;
            $getTestimonies = $getTestimony->getAllTestimonies();
            header('Location: http://' . $domain . '/apartment/moderateTestimony');
        }
    }

    public function refuseTestimony()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];

            $getTestimony = new Reservation();
            $getTestimony->setId($id);
            $getTestimony->refuseTestimony();

            global $getTestimonies;
            global $domain;
            $getTestimonies = $getTestimony->getAllTestimonies();
            header('Location: http://' . $domain . '/apartment/moderateTestimony');
        }
    }

    public function testimony()
    {
        $getTestimony = new Reservation();
        global $getTestimonies;
        $getTestimonies = $getTestimony->getAcceptTestimony();
        require_once 'public\templates\public\testimony.php';
    }
}

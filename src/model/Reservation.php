<?php

require_once './database/Database.php';

class Reservation
{
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getApartmentId()
    {
        return $this->apartment_id;
    }

    /**
     * @param mixed $time
     */
    public function setApartmentId($apartment_id): void
    {
        $this->apartment_id = $apartment_id;
    }

    /**
     * @return mixed
     */
    public function getStart()
    {
        return $this->start_time;
    }

    /**
     * @param mixed $time
     */
    public function setStart($time): void
    {
        $this->start_time = $start_time;
    }

    /**
     * @return mixed
     */
    public function getEnd()
    {
        return $this->end_time;
    }

    /**
     * @param mixed $time
     */
    public function setEnd($time): void
    {
        $this->end_time = $end_time;
    }

    //  fonction pour ajouter une réservation dans la BDD
    public function addReservation(){

        //Connecter la BDD
        $db = new Database();
        // Ouverture de la connection
        $connection = $db->getConnection();

        //  Requêtes sql
        $request = $connection->prepare('INSERT INTO Reservation VALUES (:user_id, :apartment_id, :start_time, :end_time)');
        $request->bindParam(':user_id', $this->user_id);
        $request->bindParam(':apartment_id', $this->apartment_id);
        $request->bindParam(':start_time', $this->start_time);
        $request->bindParam(':end_time', $this->end_time);

        if($request->execute()){
            return true;
        }
        return false;
    }

    //  fonction pour supprimer une réservation
    public function deleteReservation(){

        $db = new Database();
        $connection = $db->getConnection();

        $request = $connection->prepare('DELETE FROM Reservation WHERE id = :id');
        $request->bindParam(':id', $this->id);

        if($request->execute()){
            return true;
        }
        return false;
    }

    //  fonction qui récupère les informations d'une réservation via son ID
    public function getReservationById($reservation_id){
        $db = new Database();
        $connection = $db->getConnection();

        $request = $connection->prepare('SELECT * FROM Reservation WHERE id = :id');
        $request->bindParam(':id', $reservation_id);

        $results = $request->fetch(PDO::FETCH_ASSOC);

        if($request->execute()){
            $this->id = $id;
            $this->user_id = $results['user_id'];
            $this->apartment_id = $results['apartment_id'];
            $this->start_time = $results['start_time'];
            $this->end_time = $results['end_time'];
            $this->created_at = $results['created_at'];
            return true;
        }
        return false;
    }

    //  fonction qui récupère toutes les réservation d'un utilisateur via son ID
    public  function getUserReservations($user_id){
        $db = new Database();
        $connection = $db->getConnection();

        $request = $connection->prepare('SELECT * FROM');
    }
}
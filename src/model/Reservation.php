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

    //  fonction qui modifie une réservation (changement d'appartement, de début ou de fin) / prend en paramètre le type de donnée modifiée et la donnée en question
    //  attention la classe doit déjà être instanciée pour avoir l'ID de la réservation à modifier
    public function modifyReservation($data, $data_type){
        $db = new Database();
        $connection = $db->getConnection();

        $request = $connection->prepare('UPDATE Reservation SET :data_type = :data WHERE id = :id');
        $request->bindParam(':id', $this->id);
        $request->bindParam(':data_type', $data_type);
        $request->bindParam(':data', $data);

        if($request->execute()){
            switch($data_type){
                case 'apartment_id':
                    $this->apartment_id = $data;
                    break;
                case 'start_time':
                    $this->start_time = $data;
                    break;
                case 'end_time':
                    $this->end_time = $data;
                    break;
                default :
                    return false;
                    break;
            }
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

        $result = $request->fetch(PDO::FETCH_ASSOC);

        if($request->execute()){
            $this->id = $id;
            $this->user_id = $result['user_id'];
            $this->apartment_id = $result['apartment_id'];
            $this->start_time = $result['start_time'];
            $this->end_time = $result['end_time'];
            $this->created_at = $result['created_at'];
            return true;
        }
        return false;
    }

    //  fonction qui récupère toutes les réservations d'un utilisateur via son ID
    public  function getUserReservations($user_id){
        $db = new Database();
        $connection = $db->getConnection();

        $request = $connection->prepare('SELECT * FROM Reservation WHERE user_id = :user_id');
        $request->bindParam(':user_id', $user_id);

        $results = $request->fetchAll(PDO::FETCH_ASSOC);
        if($request->execute()){
            return $results;
        }
        return null;
    }

    //  fonction qui récupère toutes les réservations d'un appartement via son ID
    public function getApartmentReservations($apartment_id){
        $db = new Database();
        $connection = $db->getConnection();

        $request = $connection->prepare('SELECT * FROM Reservation WHERE apartment_id = :apartment_id');
        $request->bindParam(':apartment_id', $apartment_id);

        $results = $request->fetchAll(PDO::FETCH_ASSOC);
        if($request->execute()){
            return $results;
        }
        return null;
    }
}
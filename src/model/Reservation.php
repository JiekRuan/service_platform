<?php

namespace MyApp\Models;

use Database;
use PDO;

require_once 'src/database/Database.php';

class Reservation
{

    private $id;
    private $user_id;
    private $apartment_id;
    private $start_time;
    private $end_time;
    private $content;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
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
        $this->start_time = $time;
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
        $this->end_time = $time;
    }

        /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->id;
    }

    public function setContent($content): void
    {
        $this->content = $content;
    }
    

    //  fonction pour ajouter une réservation dans la BDD
    public function addReservation()
    {
        $db = new Database();
        $connection = $db->getConnection();

        $request = $connection->prepare('INSERT INTO reservation (user_id, apartment_id, start_time, end_time) VALUES (:user_id, :apartment_id, :start_time, :end_time)');
        $request->bindParam(':user_id', $this->user_id);
        $request->bindParam(':apartment_id', $this->apartment_id);
        $request->bindParam(':start_time', $this->start_time);
        $request->bindParam(':end_time', $this->end_time);

        if ($request->execute()) {
            return true;
        }

        return false;
    }


    //  fonction qui modifie une réservation (changement d'appartement, de début ou de fin) / prend en paramètre le type de donnée modifiée et la donnée en question
    //  attention la classe doit déjà être instanciée pour avoir l'ID de la réservation à modifier
    public function modifyReservation($data, $data_type)
    {
        $db = new Database();
        $connection = $db->getConnection();

        $request = $connection->prepare('UPDATE Reservation SET :data_type = :data WHERE id = :id');
        $request->bindParam(':id', $this->id);
        $request->bindParam(':data_type', $data_type);
        $request->bindParam(':data', $data);

        if ($request->execute()) {
            switch ($data_type) {
                case 'apartment_id':
                    $this->apartment_id = $data;
                    break;
                case 'start_time':
                    $this->start_time = $data;
                    break;
                case 'end_time':
                    $this->end_time = $data;
                    break;
                default:
                    return false;
                    break;
            }
            return true;
        }
        return false;
    }

    //  fonction pour supprimer une réservation
    public function deleteReservation($id)
    {

        $db = new Database();
        $connection = $db->getConnection();

        $request = $connection->prepare('DELETE FROM reservation WHERE id = :id');
        $request->bindParam(':id', $id);

        if ($request->execute()) {
            return true;
        }
        return false;
    }

    //  fonction qui récupère les informations d'une réservation via son ID
    // public function getReservationById($reservation_id){
    //     $db = new Database();
    //     $connection = $db->getConnection();

    //     $request = $connection->prepare('SELECT * FROM Reservation WHERE id = :id');
    //     $request->bindParam(':id', $reservation_id);

    //     $result = $request->fetch(PDO::FETCH_ASSOC);

    //     if($request->execute()){
    //         $this->id = $id;
    //         $this->user_id = $result['user_id'];
    //         $this->apartment_id = $result['apartment_id'];
    //         $this->start_time = $result['start_time'];
    //         $this->end_time = $result['end_time'];
    //         $this->created_at = $result['created_at'];
    //         return true;
    //     }
    //     return false;
    // }

    //  fonction qui récupère toutes les réservations d'un utilisateur via son ID(celle de l'utilisateur)
    public  function getUserReservations($user_id)
    {
        $db = new Database();
        $connection = $db->getConnection();

        // $request = $connection->prepare('SELECT * FROM reservation WHERE user_id = :user_id');
        // $request = $connection->prepare('SELECT * FROM reservation INNER JOIN apartments ON apartment_id = apartments.id WHERE user_id = :user_id');
        $request = $connection->prepare('SELECT R.id, R.apartment_id, R.start_time, R.end_time, A.name, A.address, A.arrondissement FROM reservation AS R INNER JOIN apartments AS A ON R.apartment_id = A.id WHERE user_id = :user_id');
        $request->bindParam(':user_id', $user_id);

        $request->execute();
        $results = $request->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public  function getReservationApart($reservation_id)
    {
        $db = new Database();
        $connection = $db->getConnection();

        $request = $connection->prepare('SELECT A.*
        FROM reservation AS R 
        INNER JOIN apartments AS A ON R.apartment_id = A.id 
        WHERE R.id = :reservation_id');
        $request->bindParam(':reservation_id', $reservation_id);

        $request->execute();
        $results = $request->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    // pour afficher toutes les réservations
    public  function getAllReservations()
    {
        $db = new Database();
        $connection = $db->getConnection();

        $request = $connection->prepare('SELECT R.id, R.user_id , users.name AS customer ,R.start_time, R.end_time, R.apartment_id, A.name
        FROM reservation AS R 
        INNER JOIN apartments AS A ON R.apartment_id = A.id INNER JOIN users on R.user_id = users.id ORDER BY R.id ASC');

        $request->execute();
        $results = $request->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    //  fonction qui récupère toutes les réservations d'un appartement via son ID
    public function getApartmentReservations($apartment_id)
    {
        $db = new Database();
        $connection = $db->getConnection();

        $request = $connection->prepare('SELECT * FROM reservation WHERE apartment_id = :apartment_id');
        $request->bindParam(':apartment_id', $apartment_id);

        $results = $request->fetchAll(PDO::FETCH_ASSOC);
        if ($request->execute()) {
            return $results;
        }
        return null;
    }

    public function addTestimony(){
        $createdAt = date('Y-m-d H:i:s');

        $db = new Database();
        $connection = $db->getConnection();
        
        $request = $connection->prepare('INSERT INTO opinion (reservation_id, user_id, content, created_at) VALUES (:reservation_id, :user_id, :content, :created_at)');
        $request->bindParam(':reservation_id', $this->id);
        $request->bindParam(':user_id', $this->user_id);
        $request->bindParam(':content', $this->content);
        $request->bindParam(':created_at', $createdAt);
        
        if ($request->execute()) {
            return true;
        }
        
        return false;
    }
}

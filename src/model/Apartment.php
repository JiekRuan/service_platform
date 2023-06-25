<?php

namespace MyApp\Models;

use Database;
use PDO;

require_once 'src/database/Database.php';

class Apartment
{
    private $id;
    private $name;
    private $address;
    private $arrondissement;
    private $capacity;
    private $price;
    private $description;
    private $squareMeter;
    private $numberBathroom;
    private $housingType;
    private $balcon;
    private $terasse;
    private $vueSur;
    private $quartier;

    private $userId;


    // public function __construct($id,$name,$address,$arrondissement,$price,$description,$squareMeter,$numberBathroom,$housingType,$balcon,$terasse,$capacity,$vueSur,$quartier)
    // {
    //     $this->id = $id;
    //     $this->name = $name;
    //     $this->address = $address;
    //     $this->arrondissement = $arrondissement;
    //     $this->price = $price;
    //     $this->description = $description;
    //     $this->squareMeter = $squareMeter;
    //     $this->numberBathroom = $numberBathroom;
    //     $this->housingType = $housingType;
    //     $this->balcon = $balcon;
    //     $this->terasse = $terasse;
    //     $this->capacity = $capacity;
    //     $this->vueSur = $vueSur;
    //     $this->quartier = $quartier;
    // }

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
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getArrondissement()
    {
        return $this->arrondissement;
    }

    /**
     * @param mixed $arrondissement
     */
    public function setArrondissement($arrondissement): void
    {
        $this->arrondissement = $arrondissement;
    }

    /**
     * @return mixed
     */
    public function getBalcon()
    {
        return $this->balcon;
    }

    /**
     * @param mixed $balcon
     */
    public function setBalcon($balcon): void
    {
        $this->balcon = $balcon;
    }

    /**
     * @return mixed
     */
    public function getTerasse()
    {
        return $this->terasse;
    }

    /**
     * @param mixed $terasse
     */
    public function setTerasse($terasse): void
    {
        $this->terasse = $terasse;
    }

    /**
     * @return mixed
     */
    public function getSquareMeter()
    {
        return $this->squareMeter;
    }

    /**
     * @param mixed $squareMeter
     */
    public function setSquareMeter($squareMeter): void
    {
        $this->squareMeter = $squareMeter;
    }

    /**
     * @return mixed
     */
    public function getNumberBathroom()
    {
        return $this->numberBathroom;
    }

    /**
     * @param mixed $numberBathroom
     */
    public function setNumberBathroom($numberBathroom): void
    {
        $this->numberBathroom = $numberBathroom;
    }

    /**
     * @return mixed
     */
    public function gethousingType()
    {
        return $this->housingType;
    }

    /**
     * @param mixed $housingType
     */
    public function setHousingType($housingType): void
    {
        $this->housingType = $housingType;
    }

    // /**
    //  * @return mixed
    //  */
    // public function getLocation()
    // {
    //     return $this->location;
    // }

    // /**
    //  * @param mixed $location
    //  */
    // public function setLocation($location): void
    // {
    //     $this->location = $location;
    // }

    /**
     * @return mixed
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * @param mixed $capacity
     */
    public function setCapacity($capacity): void
    {
        $this->capacity = $capacity;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }
    public function getVueSur()
    {
        return $this->vueSur;
    }

    /**
     * @param mixed $vueSur
     */
    public function setVueSur($vueSur): void
    {
        $this->vueSur = $vueSur;
    }
    public function getQuartier()
    {
        return $this->quartier;
    }

    /**
     * @param mixed $quartier;
     */
    public function setQuartier($quartier): void
    {
        $this->quartier = $quartier;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $name
     */
    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }

    // fonction pour afficher les appartements
    public function readAllApartments()
    {
        $db = new Database();
        $connection = $db->getConnection();

        $request = $connection->prepare("SELECT * FROM apartments");
        $request->execute();

        $apartments = [];

        while ($row = $request->fetch(PDO::FETCH_ASSOC)) {
            $apartment = new Apartment();

            $apartment->id = $row['id'];
            $apartment->name = $row['name'];
            $apartment->address = $row['address'];
            $apartment->arrondissement = $row['arrondissement'];
            $apartment->price = $row['price'];
            $apartment->description = $row['description'];
            $apartment->squareMeter = $row['squareMeter'];
            $apartment->numberBathroom = $row['numberBathroom'];
            $apartment->housingType = $row['housingType'];
            $apartment->balcon = $row['balcon'];
            $apartment->terasse = $row['terasse'];
            $apartment->capacity = $row['capacity'];
            $apartment->vueSur = $row['vueSur'];
            $apartment->quartier = $row['quartier'];
            $apartments[] = $apartment;
        }

        return $apartments;
    }

    public function readAnApartment($id)
    {
        $db = new Database();
        $connection = $db->getConnection();

        $request = $connection->prepare("SELECT * FROM apartments WHERE id = :id");
        $request->bindParam(':id', $id);
        $request->execute();

        $apartments = [];

        while ($row = $request->fetch(PDO::FETCH_ASSOC)) {
            $apartment = new Apartment();

            $apartment->id = $row['id'];
            $apartment->name = $row['name'];
            $apartment->address = $row['address'];
            $apartment->arrondissement = $row['arrondissement'];
            $apartment->price = $row['price'];
            $apartment->description = $row['description'];
            $apartment->squareMeter = $row['squareMeter'];
            $apartment->numberBathroom = $row['numberBathroom'];
            $apartment->housingType = $row['housingType'];
            $apartment->balcon = $row['balcon'];
            $apartment->terasse = $row['terasse'];
            $apartment->capacity = $row['capacity'];
            $apartment->vueSur = $row['vueSur'];
            $apartment->quartier = $row['quartier'];
            $apartments[] = $apartment;
        }

        return $apartments;
    }

    public function deleteApartement($id)
    {
        $db = new Database();
        $connection = $db->getConnection();

        $request = $connection->prepare('DELETE FROM apartments WHERE id = :id');
        $request->bindParam(':id', $id);

        if ($request->execute()) {
            return true;
        }

        return false;
    }

    public function saveData() //pas oublier de mettre l'image.
    {
        $db = new Database();
        $connection = $db->getConnection();

        // if ($this->id) {
        //     $request = $connection->prepare('UPDATE apartments SET name = :name, address = :address, arrondissement = :arrondissement, price = :price, description = :description, squareMeter = :squareMeter, numberBathroom = :numberBathroom, housingType = :housingType, balcon = :balcon, terasse = :terasse, capacity = :capacity, vueSur = :vueSur, quartier = :quartier WHERE id = :id');
        // } else {
        $request = $connection->prepare('INSERT INTO apartments (name, address, arrondissement, price, description, squareMeter, numberBathroom, housingType, capacity, balcon, terasse, vueSur, quartier) 
            VALUES (:name, :address, :arrondissement, :price, :description, :squareMeter, :numberBathroom, :housingType, :capacity, :balcon, :terasse,  :vueSur, :quartier)');
        // }

        $request->bindParam(':name', $this->name);
        $request->bindParam(':address', $this->address);
        $request->bindParam(':arrondissement', $this->arrondissement);
        $request->bindParam(':price', $this->price);
        $request->bindParam(':description', $this->description);
        $request->bindParam(':squareMeter', $this->squareMeter);
        $request->bindParam(':numberBathroom', $this->numberBathroom);
        $request->bindParam(':housingType', $this->housingType);
        $request->bindParam(':capacity', $this->capacity);
        $request->bindParam(':balcon', $this->balcon);
        $request->bindParam(':terasse', $this->terasse);
        $request->bindParam(':vueSur', $this->vueSur);
        $request->bindParam(':quartier', $this->quartier);

        if ($this->id) {
            $request->bindParam(':id', $this->id);
        }

        $result = $request->execute();

        return $result;
    }

    public function updateData($id)
    {
        $db = new Database();
        $connection = $db->getConnection();

        $request = $connection->prepare('UPDATE apartments SET 
        name = :name,
        address = :address,
        arrondissement = :arrondissement,
        price = :price,
        description = :description,
        squareMeter = :squareMeter,
        numberBathroom = :numberBathroom,
        housingType = :housingType,
        balcon = :balcon,
        terasse = :terasse,
        capacity = :capacity,
        vueSur = :vueSur,
        quartier = :quartier
        WHERE id = :id');

        $request->bindParam(':name', $this->name);
        $request->bindParam(':address', $this->address);
        $request->bindParam(':arrondissement', $this->arrondissement);
        $request->bindParam(':price', $this->price);
        $request->bindParam(':description', $this->description);
        $request->bindParam(':squareMeter', $this->squareMeter);
        $request->bindParam(':numberBathroom', $this->numberBathroom);
        $request->bindParam(':housingType', $this->housingType);
        $request->bindParam(':balcon', $this->balcon);
        $request->bindParam(':terasse', $this->terasse);
        $request->bindParam(':capacity', $this->capacity);
        $request->bindParam(':vueSur', $this->vueSur);
        $request->bindParam(':quartier', $this->quartier);
        $request->bindParam(':id', $id);

        $result = $request->execute();

        return $result;
    }


    public function searchApartment($search)
    {
        $db = new Database();
        $connection = $db->getConnection();

        $searchValue = "%" . $search . "%"; // Valeur de recherche avec les wildcards

        // $request = $connection->prepare("SELECT * FROM apartments WHERE id = :searchValue name LIKE :searchValue OR address LIKE :searchValue OR capacity LIKE :searchValue OR price LIKE :searchValue OR description LIKE :searchValue OR arrondissement LIKE :searchValue");
        $request = $connection->prepare("SELECT * FROM apartments WHERE id LIKE :searchValue OR name LIKE :searchValue OR address LIKE :searchValue OR capacity LIKE :searchValue OR price LIKE :searchValue OR description LIKE :searchValue OR arrondissement LIKE :searchValue");

        // $request = $connection->prepare("SELECT * FROM apartments WHERE name LIKE :searchValue OR location LIKE :searchValue OR capacity = :capacity OR price <= :price OR description LIKE :searchValue");
        $request->bindParam(':searchValue', $searchValue);
        // $request->bindParam(':capacity', $this->capacity);
        // $request->bindParam(':arrondissement', $this->arrondissement);
        // $request->bindParam(':price', $this->price);

        if ($request->execute()) {
            $results = $request->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }

        return false;
    }

    public function addDeleteBookmark()
    {
        $db = new Database();
        $connection = $db->getConnection();

        // Vérification si le couple existe déjà dans la table des favoris
        $query = $connection->prepare('SELECT COUNT(*) FROM favorites WHERE user_id = :user_id AND apartment_id = :id');
        $query->bindParam(':user_id', $this->userId);
        $query->bindParam(':id', $this->id);
        $query->execute();

        $count = $query->fetchColumn();

        if ($count > 0) {
            // Le couple existe, on supprime
            $request = $connection->prepare('DELETE FROM favorites WHERE user_id = :userId AND apartment_id = :id');

            $request->bindParam(':userId', $this->userId);
            $request->bindParam(':id', $this->id);

            if ($this->id) {
                $request->bindParam(':id', $this->id);
            }
            if ($result = $request->execute()) {
                // L'insertion a réussi
                return $result;
            } else {
                // Une erreur s'est produite lors de l'insertion
                echo "Une erreur s'est produite lors de la supression du couple aux favoris.";
            }
        } else {
            // Le couple n'existe pas
            $request = $connection->prepare('INSERT INTO favorites (user_id, apartment_id) 
            VALUES (:userId, :id)');

            $request->bindParam(':userId', $this->userId);
            $request->bindParam(':id', $this->id);

            if ($this->id) {
                $request->bindParam(':id', $this->id);
            }
            if ($result = $request->execute()) {
                // L'insertion a réussi
                return $result;
            } else {
                // Une erreur s'est produite lors de l'insertion
                echo "Une erreur s'est produite lors de l'ajout du couple aux favoris.";
            }
        }
    }

    public function readUserBookmark()
    {
        $db = new Database();
        $connection = $db->getConnection();
        $request = $connection->prepare("SELECT * FROM favorites INNER JOIN apartments ON favorites.apartment_id = apartments.id WHERE favorites.user_id = :user_id");
        $request->bindParam(':user_id', $this->userId);
        $request->execute();
        $result = $request->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

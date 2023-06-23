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

    public function deleteApartment()
    {
        $db = new Database();
        $connection = $db->getConnection();

        $request = $connection->prepare('DELETE FROM apartments WHERE id = :id');
        $request->bindParam(':id', $this->id);

        if ($request->execute()) {
            return true;
        }

        return false;
    }

    public function saveData() //pas oublier de mettre l'image.
    {
        $db = new Database();
        $connection = $db->getConnection();

        if ($this->id) {
            $request = $connection->prepare('UPDATE apartments SET name = :name, address = :address, arrondissement = :arrondissement, price = :price, description = :description, squareMeter = :squareMeter, numberBathroom = :numberBathroom, housingType = :housingType, balcon = :balcon, terasse = :terasse, capacity = :capacity, vueSur = :vueSur, quartier = :quartier WHERE id = :id');
        } else {
            $request = $connection->prepare('INSERT INTO apartments (name, address, arrondissement, price, description, squareMeter, numberBathroom, housingType, capacity, balcon, terasse, vueSur, quartier) 
            VALUES (:name, :address, :arrondissement, :price, :description, :squareMeter, :numberBathroom, :housingType, :capacity, :balcon, :terasse,  :vueSur, :quartier)');
        }

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

    public function searchApartment()
    {
        $db = new Database();
        $connection = $db->getConnection();

        $request = $connection->prepare("SELECT * FROM apartments WHERE name LIKE :name OR location LIKE :location OR capacity = :capacity OR price <= :price OR description LIKE :description");
        $request->bindParam(':name', "%" . $this->name . "%");
        //$request->bindParam(':location', "%" . $this->location . "%");
        $request->bindParam(':capacity', $this->capacity);
        $request->bindParam(':price', $this->price);
        $request->bindParam(':description', "%" . $this->description . "%");

        if ($request->execute()) {
            return true;
        }

        return false;
    }
}
//revoir la dernier fonction et terminer le controller !
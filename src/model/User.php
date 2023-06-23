<?php

namespace MyApp\Models;

use Database;
use PDO;

require_once 'src/database/Database.php';

class User
{
    private $id;
    private $name;
    private $password;
    private $email;
    private $phone;
    private $role;
    private $createdAt;


    public function __construct($id, $name, $email, $phone, $role, $password, $createdAt)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->role = $role;
        $this->password = $password;
        $this->createdAt = $createdAt;
    }

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
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setMail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role): void
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    // public function addUser()
    // {
    //     $db = new Database();
    //     $connection = $db->getConnection();

    //     $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

    //     $request = $connection->prepare('INSERT INTO users (name, password, email, phone) VALUES(:name, :password, :email, :phone)');
    //     $request->bindParam(':name', $this->name);
    //     $request->bindParam(':password', $hashedPassword);
    //     $request->bindParam(':email', $this->email);
    //     $request->bindParam(':phone', $this->phone);


    //     if ($request->execute()) {
    //         return true;
    //     }
    //     return false;
    // }

    public function addUser()
    {
        // Vérifier si l'email existe déjà dans la base de données
        if ($this->ifEmailExists($this->email)) {
            return false; // L'email existe déjà, renvoyer false
        }

        $db = new Database();
        $connection = $db->getConnection();

        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

        $request = $connection->prepare('INSERT INTO users (name, password, email, phone, role) VALUES(:name, :password, :email, :phone, :role)');
        $request->bindParam(':name', $this->name);
        $request->bindParam(':password', $hashedPassword);
        $request->bindParam(':email', $this->email);
        $request->bindParam(':phone', $this->phone);
        $request->bindParam(':role', $this->role);

        if ($request->execute()) {
            return true; // Utilisateur ajouté avec succès
        }
        return false; // Erreur lors de l'ajout de l'utilisateur
    }

    private function ifEmailExists($email)
    {
        $db = new Database();
        $connection = $db->getConnection();

        $request = $connection->prepare('SELECT COUNT(*) FROM users WHERE email = :email');
        $request->bindParam(':email', $email);
        $request->execute();

        $count = $request->fetchColumn();
        return $count > 0; // Renvoyer true si l'email existe, sinon false
    }


    public function updateUser($id)
    {
        $db = new Database();
        $connection = $db->getConnection();

        $request = $connection->prepare('UPDATE users SET 
        name = :name,
        email = :email,
        phone = :phone
        WHERE id = :id');

        $request->bindParam(':name', $this->name);
        $request->bindParam(':email', $this->email);
        $request->bindParam(':phone', $this->phone);
        $request->bindParam(':id', $id);

        $result = $request->execute();

        return $result;
    }

    public function deleteUser()
    {
        $db = new Database();
        $connection = $db->getConnection();

        $request = $connection->prepare('DELETE FROM users WHERE id = :id');
        $request->bindParam(':id', $this->id);

        if ($request->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserById($user_id)
    {
        $db = new Database();
        $connection = $db->getConnection();

        $request = $connection->prepare('SELECT * FROM users WHERE id = :id');
        $request->bindParam(':id', $user_id);

        if ($request->execute()) {
            $result = $request->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $this->id = $user_id;
                $this->name = $result['name'];
                $this->password = $result['password'];
                $this->email = $result['email'];
                $this->phone = $result['phone'];
                $this->role = $result['role'];
                $this->createdAt = $result['created_at'];
                return true;
            }
        }

        return false;
    }

    public static function getAllUsers()
    {
        $db = new Database();
        $connection = $db->getConnection();

        $request = $connection->prepare('SELECT * FROM users');

        if ($request->execute()) {
            $users = array();

            while ($row = $request->fetch(PDO::FETCH_ASSOC)) {
                $user = new User(
                    $row['id'],
                    $row['name'],
                    $row['email'],
                    $row['phone'],
                    $row['role'],
                    $row['password'],
                    $row['created_at']
                );

                $users[] = $user;
            }

            return $users;
        }

        return null;
    }

    public function verifyAccount($email, $password)
    {
        $db = new Database();
        $connection = $db->getConnection();

        $request = $connection->prepare('SELECT * FROM users WHERE email = :email');
        $request->bindParam(':email', $email);
        $request->execute();

        $user = $request->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return new User(
                $user['id'],
                $user['name'],
                $user['email'],
                $user['phone'],
                $user['role'],
                $user['password'],
                $user['created_at']
            );
        } else {
            return null;
        }
    }

    public function updatePassword($newPassword)
    {
        $db = new Database();
        $connection = $db->getConnection();

        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $request = $connection->prepare('UPDATE users SET password = :password WHERE id = :id');
        $request->bindParam(':id', $this->id);
        $request->bindParam(':password', $hashedPassword);

        if ($request->execute()) {
            $this->password = $hashedPassword;
            return true;
        } else {
            return false;
        }
    }
}
<?php
namespace MyApp\Models;

require_once 'src/database/Database.php';

class User
{
    private $id;
    private $name;
    private $password;
    private $mail;
    private $phone;
    private $role;
    private $createdAt;


    public function __construct($id,$name,$mail,$phone,$role,$password,$createdAt)
    {
        $this->id = $id;
        $this->name = $name;
        $this->mail = $mail;
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
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail): void
    {
        $this->mail = $mail;
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

    public function addUser()
    {
        $db = new Database();
        $connection = $db->getConnection();
    
        $request = $connection->prepare('INSERT INTO users VALUES(:id, :name, :password, :mail, :phone, :role)');
        $request->bindParam(':id', $this->id);
        $request->bindParam(':name', $this->name);
        $request->bindParam(':password', $this->password);
        $request->bindParam(':mail', $this->mail);
        $request->bindParam(':phone', $this->phone);
        $request->bindParam(':role', $this->role);
    
        if ($request->execute()) {
            return true;
        }
        return false;
    }

    public function updateUser($data_type, $data) 
    {
        $db = new Database();
        $connection = $db->getConnection();

        $request = $connection->prepare('UPDATE users SET :data_type = :data WHERE id = :id');

        $request->bindParam(':id', $this->id);
        $request->bindParam(':data_type', $data_type);
        $request->bindParam(':data', $data);
    
        if ($request->execute()) {
            switch ($data_type) {
                case 'name':
                    $this->name = $data;
                    break;
                case 'password':
                    $this->password = $data;
                    break;
                case 'mail':
                    $this->mail = $data;
                    break;
                case 'phone':
                    $this->phone = $data;
                    break;
                case 'role':
                    $this->role = $data;
                    break;
                default:
                    return false;
                    break;
            }
            return true;
        }
        return false;
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
                $this->mail = $result['mail'];
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
                    $row['mail'],
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
    
    public function verifyAccount($email, $password) {
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
            return "Votre identifiant ou votre mot de passe de correspondent pas.";
        }
    }

    public function updatePassword($newPassword) {
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
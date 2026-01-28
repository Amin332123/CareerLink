<?php

namespace App\Models\Repository;

use App\Config\Database;
use PDO;

class UserRepository
{

    private PDO $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function findById($id)
    {
        $query = "SELECT u.*,r.title FROM users u INNER JOIN roles r ON u.role_id=r.id WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function findByEmail($email){
        $query = "SELECT u.*,r.title FROM users u INNER JOIN roles r ON u.role_id=r.id WHERE email=:email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function findAll(){
        $query = "SELECT u.*,r.title FROM users u INNER JOIN roles r ON u.role_id=r.id WHERE 1=1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    
    // public function insertUser($user){
    //     $query = $this->conn->prepare("INSERT INTO users(name, email, password, roleId)
    //     VALUES :name, :email, :password, :roleId ");
    //     $name = $user->getName();
    //     $email = $user->getEmail();
    //     $password = $user->getPassword();
    //     $role = $user->getRole()->getId();
    //     $query->bindParam(':name', $name);
    //     $query->bindParam(':email', $email);
    //     $query->bindParam(':password', $password);
    //     $query->bindParam(':roleId', $role);
    //     return $query->execute();
    // }
}

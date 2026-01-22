<?php

namespace App\Models\Repository;

use App\Config\Database;
use PDO;

class AdminRepository
{

    private PDO $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function findById($id)
    {
        $query = "SELECT * FROM users u INNER JOIN roles r ON u.role_id=r.u.id WHERE id=:id AND r.title = 'admin' ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function findByEmail($email){
        $query = "SELECT * FROM users u INNER JOIN roles r ON u.role_id=r.u.id WHERE email=:email AND r.title = 'admin' ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function findAll(){
        $query = "SELECT * FROM users u INNER JOIN roles r ON u.role_id=r.u.id WHERE r.title = 'admin'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}

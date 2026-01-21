<?php

namespace App\Models\Repository;

use App\Config\Database;
use PDO;

class CandidateRepository
{

    private PDO $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function findById($id)
    {
        $query = "SELECT * FROM users u INNER JOIN candidates c ON u.id=c.id WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function findByEmail($email)
    {
        $query = "SELECT * FROM users u INNER JOIN candidates c ON u.id=c.id WHERE email=:email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function findAll()
    {
        $query = "SELECT * FROM users u INNER JOIN candidates c ON u.id=c.id WHERE 1=1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function create($user)
    {
        $query = "INSERT INTO users(name,email,password) VALUES (:name, :email, :password)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $user->getName(), PDO::PARAM_STR);
        $stmt->bindParam(':email', $user->getEmail(), PDO::PARAM_STR);
        $stmt->bindParam(':password', $user->getPassword(), PDO::PARAM_STR);
        $stmt->execute();

        $stmt->bindParam(':recruiter_id', $user->getRecruiterId(), PDO::PARAM_INT);
        $stmt->bindParam(':category_id', $user->getCategory()->getId(), PDO::PARAM_INT);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

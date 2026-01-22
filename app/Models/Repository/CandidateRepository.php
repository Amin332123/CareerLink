<?php

namespace App\Models\Repository;

use App\Config\Database;
use App\Models\Entity\Candidate;
use PDO;

class CandidateRepository
{

    private PDO $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function findById(int $id)
    {
        $query = "SELECT * FROM users u INNER JOIN candidates c ON u.id=c.id WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function findByEmail(string $email)
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

    public function create(Candidate $user)
    {
        $query = "INSERT INTO users(name,email,password) VALUES (:name, :email, :password)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $user->getName(), PDO::PARAM_STR);
        $stmt->bindParam(':email', $user->getEmail(), PDO::PARAM_STR);
        $stmt->bindParam(':password', $user->getPassword(), PDO::PARAM_STR);
        if ($stmt->execute()) {
            $id = (int) $this->conn->lastInsertId();
            $query = "INSERT INTO candidates(id, current_job, profile_picture) VALUES (:id, :current_job, :profile_picture)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':current_job', $user->getPicture(), PDO::PARAM_STR);
            $stmt->bindParam(':profile_picture', $user->getJob(), PDO::PARAM_STR);
            if ($stmt->execute()) {
                return true;
            }
        }
        return false;
    }
}

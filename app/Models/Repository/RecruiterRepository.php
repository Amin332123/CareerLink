<?php

namespace App\Models\Repository;

use App\Config\Database;
use App\Models\Entity\Recruiter;
use PDO;

class RecruiterRepository
{

    private PDO $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function findById($id)
    {
        $query = "SELECT * FROM users u INNER JOIN recruiters r ON u.id=r.id WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    // public function findByEmail($email){
    //     $query = "SELECT * FROM users u INNER JOIN recruiters r ON u.id=r.id WHERE email=:email";
    //     $stmt = $this->conn->prepare($query);
    //     $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    //     $stmt->execute();
    //     $result = $stmt->fetch(PDO::FETCH_ASSOC);
    //     return $result;
    // }

    public function findAll(){
        $query = "SELECT * FROM users u INNER JOIN recruiters r ON u.id=r.id WHERE 1=1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function create(Recruiter $user)
    {
        $query = "INSERT INTO users(name,email,password) VALUES (:name, :email, :password)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $user->getName(), PDO::PARAM_STR);
        $stmt->bindParam(':email', $user->getEmail(), PDO::PARAM_STR);
        $stmt->bindParam(':password', $user->getPassword(), PDO::PARAM_STR);
        if($stmt->execute()){
        $id=(int) $this->conn->lastInsertId();
        $query = "INSERT INTO candidates(id, company_name, company_logo) VALUES (:id, :company_name, :company_logo)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':company_name', $user->getCompany(), PDO::PARAM_STR);
        $stmt->bindParam(':company_logo', $user->getLogo(), PDO::PARAM_STR);
        $stmt->execute();
        }
        return $this->conn->lastInsertId();
    }
}

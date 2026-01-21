<?php

namespace App\Models\Repository;

use App\Config\Database;
use PDO;

class OfferRepository
{

    private PDO $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function findById($id)
    {
        $query = "SELECT * FROM offers WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function findByRecruiterId($id)
    {
        $query = "SELECT * FROM offers WHERE recruiter_id=:recruiter_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':recruiter_id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function findAll()
    {
        $query = "SELECT * FROM offers WHERE 1=1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function create($offer)
    {
        $query = "INSERT INTO offers (title,location,salary,recruiter_id,category_id) VALUES (:title,:location,:salary,:recruiter_id,:category_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $offer->getTitle(), PDO::PARAM_STR);
        $stmt->bindParam(':location', $offer->getLocation(), PDO::PARAM_STR);
        $stmt->bindParam(':salary', $offer->getSalary(), PDO::PARAM_STR);
        $stmt->bindParam(':recruiter_id', $offer->getRecruiterId(), PDO::PARAM_INT);
        $stmt->bindParam(':category_id', $offer->getCategory()->getId(), PDO::PARAM_INT);
        $stmt->execute();
        if ($this->conn->lastInsertId()) {
            $result = (int) $this->conn->lastInsertId();
            return $result;
        }
        return -1;
    }

    public function update($offer)
    {
        $query = "UPDATE offers SET title=:title, location=:location, salary=:salary, recruiter_id=:recruiter_id, category_id=:category_id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $offer->getTitle(), PDO::PARAM_STR);
        $stmt->bindParam(':location', $offer->getLocation(), PDO::PARAM_STR);
        $stmt->bindParam(':salary', $offer->getSalary(), PDO::PARAM_STR);
        $stmt->bindParam(':recruiter_id', $offer->getRecruiterId(), PDO::PARAM_INT);
        $stmt->bindParam(':category_id', $offer->getCategory()->getId(), PDO::PARAM_INT);
        $stmt->execute();
        if ($this->conn->lastInsertId()) {
            $result = (int) $this->conn->lastInsertId();
            return $result;
        }
        return -1;
    }

        public function delete($id)
    {
        $query = "DELETE FROM offers WHERE id=:id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        if (!$stmt->execute()) {
            return true;
        }
    }
}

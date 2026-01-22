<?php
namespace App\Models\Repository;
use PDO;
class AdminRepository
{
    private $db;
    public function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=careerlink", "root", "12341234");
    }

    public function AddCategory($categoryName)
    {
        $query = "INSERT INTO categories (title) VALUES (:title);";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':title', $categoryName);
        $stmt->execute();
        return "Category created successfully.";
    }
}
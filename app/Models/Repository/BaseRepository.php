<?php
namespace App\Models\Repository;

use App\Config\Database;
use PDO;

class BaseRepository{

    private PDO $conn;
    private string $table;

    public function __construct(){
        $this->conn = Database::getConnection();
    }
    
    public function findById($id) {
        $query = "SELECT * FROM $this->table WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
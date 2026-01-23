<?php 
namespace App\Models\Services;
use App\Models\Repository\AdminRepository;



class AdminService {
    
    private $admin;
    public function __construct() {
        $this->admin = new AdminRepository();
    }

    public function createCategory($categoryName){
        try {
            $res = $this->admin->AddCategory($categoryName);
            echo "response : ".$res;
        } catch (\Throwable $th) {
            echo "Error creating category";
        }
    }
}

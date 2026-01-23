<?php
namespace App\Models\Services;
// require_once '../../../vendor/autoload.php';

use App\Models\Repository\CategoryRepository;
// use App\Models\Services\AdminService;
class CategoryService
{
    private $categoryRepository;
    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
    }

    public function create($categoryName)
    {
        if (!$this->categoryRepository->findByTitle($categoryName)) {
            $category = $this->categoryRepository->create($categoryName);
            return $category;
        }
        return null;
    }


    public function DisplayCatergories(){
        $categories = $this->categoryRepository->findAll();
        
        echo json_encode($categories);
    }

    public function DeleteCategory($categoryName) {
         $this->categoryRepository->delete($categoryName); 

    }
}








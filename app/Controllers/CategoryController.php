<?php
namespace App\Controllers;
use App\Models\Services\CategoryService;


class CategoryController
{
    private $categoryService;
    public function __construct()
    {
        $this->categoryService = new CategoryService();
    }


    public function CreateCategory()
    {
        header('Content-Type: application/json');
        $data = json_decode(file_get_contents("php://input"), true);
        $categoryName = $data['categoryName'] ?? '';
        $res = $this->categoryService->Create($categoryName);
        if ($res) {
            echo "Category Created Successfully";

        }else if ($res == null) {
            echo "this category already exists in the db";
        }
         else {
            echo "Error while Creating Category";
        }
    }


    public function DisplayCatergories() {
        $categories  = $this->categoryService->DisplayCatergories();
    }


    public function DeleteCategory() {
         header('Content-Type: application/json');
        $data = json_decode(file_get_contents("php://input"), true);
        $categoryName = $data['text'] ?? '';
        
        $this->categoryService->DeleteCategory($categoryName);

    }

}
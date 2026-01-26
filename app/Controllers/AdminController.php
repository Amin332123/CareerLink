<?php
namespace App\Controllers;
use App\Models\Services\CategoryService;


class AdminController
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

        } else if ($res == null) {
            echo "this category already exists in the db";
        } else {
            echo "Error while Creating Category";
        }
    }


    public function DisplayCatergories()
    {
        $categories = $this->categoryService->DisplayCatergories();
    }


    public function DeleteCategory()
    {
        header('Content-Type: application/json');
        $data = json_decode(file_get_contents("php://input"), true);
        $categoryName = $data['text'] ?? '';

        $this->categoryService->DeleteCategory($categoryName);

    }


    public function CreateTag()
    {
        header('Content-Type: application/json');
        $data = json_decode(file_get_contents("php://input"), true);

        $tagName = $data['tagInputValue'] ?? '';


        $res = $this->categoryService->CreateATag($tagName);

        if ($res == "Tag already exists") {

            echo $res;
        } else if ($res) {
            echo $res;
        } else {
            echo 'Error Happened , try again';
        }
    }

    public function DisplayTags()
    {
        $tags = $this->categoryService->DisplayAllTags();
        echo json_encode($tags);

    }


    public function DeleteTag()
    {
        header('Content-Type: application/json');
        $data = json_decode(file_get_contents("php://input"), true);

        $tagName = $data['tagName'] ?? '';

        $this->categoryService->DeleteATag($tagName);

    }



    public function adminDashboard()
    {
        require_once "app/Views/public/Admin/Dashboard.php";
    }
}

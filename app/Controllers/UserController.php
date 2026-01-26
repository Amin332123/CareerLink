<?php

namespace App\Controllers;
use app\Models\Services;
use app\Models\Services\Userservice;

class UserController
{
    private $userService;

    public function __construct()
    {
        $this->userService = new Userservice();
    }
    public function listAllCandidates()
    {
        if($_SESSION['role'] !== 'admin'){
            http_response_code(403);
            echo 'forbidden 403';
            exit;
        }
        $candidates = $this->userService->getAllCandidates();

        require_once __DIR__ . 'app/Views/Admin/Dashboard.php';
       //call user service to get all candidates

       // require view dyal liste candidats

    }

   public function listAllRecruiers()
    {
        if($_SESSION['role'] !== 'admin')
            {
                http_response_code(403);
                echo 'forbidden 403';
                exit;
            }
        $candidates = $this->userService->getAllRecruiters();

        require_once __DIR__ . 'app/Views/Admin/Dashboard.php';
       //call user service to get all recruiters

       // require view dyal liste recruiters

    }
}

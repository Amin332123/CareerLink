<?php

namespace App\Controllers;

use App\Models\Entity\Application;
use app\Models\Services\Userservice;
use app\Models\Services\OfferService;
use app\Models\Services\ApplicationService;
use App\Models\Repository\CandidateRepository;
use App\Models\Repository\RecruiterRepository;

class UserController
{
    private $userService;
    private $offreService;
    private $applicationService;

    public function __construct()
    {
        $this->userService = new Userservice();
        $this->offreService = new OfferService();
        $this->applicationService = new ApplicationService();
    }

    public function  adminDashboard(){
        if($_SESSION['role'] !== 'admin'){
            http_response_code(403);
            echo 'forbidden 403';
            exit;
        }
        require_once 'app/Views/Admin/Dashboard.php';
    }

    public function  candidateDashboard(){
        if($_SESSION['role'] !== 'candidate'){
            http_response_code(403);
            echo 'forbidden 403';
            exit;
        }
        $candidate = $this->userService->findCandidateById($_SESSION['user_id']);
        $offers = $this->offreService->findAll();
        $candidate = $this->candidateRepo->findById($_SESSION['user_id']);

        require_once 'app/Views/condidate/Dashboard.php';
    }

    public function  recruiterDashboard(){
        if($_SESSION['role'] !== 'recruiter'){
            http_response_code(403);
            echo 'forbidden 403';
            exit;
        }
        $recruiter = $this->userService->findRecruiterById($_SESSION['user_id']);
        $offers = $this->Offer->findById($_SESSION['user_id']);
        $candidate = $this->candidateRepo->findById($_SESSION['user_id']);

        require_once 'app/Views/recruiter/Dashboard.php';
    }

    public function listAllCandidates()
    {
        if($_SESSION['role'] !== 'admin'){
            http_response_code(403);
            echo 'forbidden 403';
            exit;
        }
        $candidates = $this->userService->getAllCandidates();

        require_once 'app/Views/Admin/Dashboard.php';
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
        require_once 'app/Views/Admin/Dashboard.php';
       //call user service to get all recruiters
       // require view dyal liste recruiters
    }
}

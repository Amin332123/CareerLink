<?php

namespace App\Controllers;

use app\Models\Services;

class AdminController
{
    private $adminService;
    public function __construct()
    {
        $this->adminService = new AdminController();
    }

    public function adminDashboard()
    {
        $data = $this->adminService->getData();
        $Offers = $this->adminService->getAllOffers();
        require_once "app/Views/public/Admin/Dashboard.php";

        //call service to get data for dashboard
        //afficher dash
    }
}

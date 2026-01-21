<?php

namespace App\Controllers;

use App\Controllers\Controller;

class UserController extends Controller
{
    public function adminDashboard()
    {
        $this->auth(['admin']);
        $this->view('Admin/Dashboard');
    }

    public function recruiterDashboard()
    {
        $this->auth(['recruiter']);
        $this->view('Recruiter/Dashboard');
    }

    public function candidateDashboard()
    {
        $this->auth(['candidate']);
        $this->view('Candidate/Dashboard');
    }
}

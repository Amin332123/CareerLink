<?php
namespace App\Models\Services;

use App\Models\Repository\Candidate;
use App\Models\Repository\CandidateRepository;
use App\Models\Repository\Recruiter;
use App\Models\Repository\RecruiterRepository;

class AuthService
{
   private $CandidateRepository;
   private $RecruiterRepository;
   public function __construct()
   {
       $this->CandidateRepository = new CandidateRepository();
       $this->RecruiterRepository = new RecruiterRepository();
   }
   public function authenticate($email, $password)
   {
       $candidate = $this->CandidateRepository->findByEmail($email);
       if ($candidate && password_verify($password, $candidate->getPassword())) {
           return $candidate;
       }
       $recruiter = $this->RecruiterRepository->findByEmail($email);
       if ($recruiter && password_verify($password, $recruiter->getPassword())) {
           return $recruiter;
       }
       return null;
       
   }
 public function addCandidate()
 {
   $candidate = $this->CandidateRepository->findByEmail($email);
   if ($candidate) {
       throw new \Exception("Email already in use");
   }
   
 }
 public function addRecruiter()
 {
   $recruiter = $this->RecruiterRepository->findByEmail($email);
   if ($recruiter) {
       throw new \Exception("Email already in use");
   }
 }
}
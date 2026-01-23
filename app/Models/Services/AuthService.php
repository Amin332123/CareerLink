<?php
namespace App\Models\Services;

use App\Models\Entity\Admin;
use App\Models\Entity\Candidate;
use App\Models\Entity\Recruiter;
use App\Models\Repository\UserRepository;
use App\Models\Repository\CandidateRepository;
use App\Models\Repository\RecruiterRepository;

class AuthService
{
   private $repo;
   private $candidateRepo;
   private $recruiterRepo;

   public function __construct(){
      $this->repo = new UserRepository();
      $this->candidateRepo = new CandidateRepository();
      $this->recruiterRepo = new RecruiterRepository();
   } 

   public function login($email, $password){
      $user = $this->userRepository->findByEmail($email);

      if ($user) {
         if (password_verify($password,$user['password'])){
            if($user['title']=='admin'){
               $admin = new Admin($user['name'],$user['email']);
               $admin->setPassword($user['password']);
               $admin->setId($user['id']);
            SessionService::setUserSession($admin);
            }else if ($user['title']=='candidate'){
               $candidate = new Candidate($user['name'],$user['email'],$user['current_job'],$user['profile_picture']);
               $candidate->setId($user['id']);
               $candidate->setPassword($user['password']);
               SessionService::setUserSession($candidate);
            }else {
               $recruiter = new Recruiter($user['name'],$user['email'],$user['company_name'],$user['company_logo']);
               $recruiter->setId($user['id']);
               $recruiter->setPassword($user['password']);
               SessionService::setUserSession($recruiter);
            }
            return true;
         }
      }
      return false;
   }

   public function register($name, $email, $role, $password,$var1,$var2,$var3 = null){
      $user = $this->userRepository->findByEmail($email);
      if(!$user){
         if($role === "recruiter"){
            $adduser = new Recruiter($name, $email, $var1, $var2);
            $adduser->setPassword(password_hash($password));
             return $this->RecruiterRepository($adduser);
         }else if($role === "candidate"){
            $adduser = new Candidate($name, $email, $var1, $var2);
            $adduser->setSkills($var3);
            $adduser->setPassword(password_hash($password));
            return $this->CandidateRepository($adduser);
         }
         }else{
            return 'email already exists';
         }
   }
}


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
      $user = $this->repo->findByEmail($email);
      if ($user) {
         if (password_verify($password,$user['password'])){
            if($user['title']=='admin'){
               $admin = new Admin($user['name'],$user['email']);
               $admin->setPassword($user['password']);
               $admin->setId($user['id']);
            return $admin;
            }else if ($user['title']=='candidate'){
               $data = $this->candidateRepo->findById($user['id']);
               $candidate = new Candidate($data['name'],$data['email'],$data['current_job'],$data['profile_picture']);
               $candidate->setId($data['id']);
               $candidate->setPassword($data['password']);
               return $candidate;
            }else {
               $data = $this->recruiterRepo->findById($user['id']);
               var_dump($data);exit;
               $recruiter = new Recruiter($data['name'],$data['email'],$data['company_name'],$data['company_logo']);
               $recruiter->setId($data['id']);
               $recruiter->setPassword($data['password']);
               return $recruiter;
            }
            return true;
         }
      }
      return false;
   }

   public function register($name, $email, $role, $password,$var1,$var2,$var3 = null){
      $user = $this->repo->findByEmail($email);
      if(!$user){
         if($role === "recruiter"){
            $adduser = new Recruiter($name, $email, $var1, $var2);
            $adduser->setPassword(password_hash($password,PASSWORD_DEFAULT));
             return $this->recruiterRepo->create($adduser);
         }else if($role === "candidate"){
            $adduser = new Candidate($name, $email, $var1, $var2);
            $adduser->setSkills($var3);
            $adduser->setPassword(password_hash($password,PASSWORD_DEFAULT));
            return $this->candidateRepo->create($adduser);
         }
         }else{
            return 'email already exists';
         }
   }
}


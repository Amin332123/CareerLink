<?php
require_once "../../../vendor/autoload.php";
namespace App\Models\Service;

use App\Models\Entity\Candidate;
use App\Models\Entity\Admin;
use App\Models\Entity\Recruiter;

class AuthService
{
   private $repo;

   public function __construct(){
      $this->repo = new UserRepository();
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




   public function register($name, $email, $role, $password,$var1,$var2){

   }

}


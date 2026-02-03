<?php
namespace app\Models\Services;

use App\Models\Entity\Admin;
use App\Models\Entity\Candidate;
use App\Models\Entity\Recruiter;
use App\Models\Repository\UserRepository;
use App\Models\Repository\CandidateRepository;
use App\Models\Repository\RecruiterRepository;

class Userservice{
    
   private $candidateRepo;
   private $recruiterRepo;

   public function __construct(){
      $this->candidateRepo = new CandidateRepository();
      $this->recruiterRepo = new RecruiterRepository();
   } 

    public function findCandidateById($id){
        $data = $this->candidateRepo->findById($id);
        $candidate = new Candidate($data['name'],$data['email'],$data['current_job'],$data['profile_picture']);
        $candidate->setId($data['id']);
        
        return $candidate;
   }

    public function findRecruiterById($id){
        $data = $this->recruiterRepo->findById($id);
       $recruiter = new Recruiter($data['name'],$data['email'],$data['company_name'],$data['company_logo']);
       $recruiter->setId($data['id']);
        
        return $recruiter;
   }

   public function getAllCandidates(){
        $data = $this->candidateRepo->findAll();
        $candidates = [];

        foreach ($data as $candidateData) {
            $candidate = new Candidate($candidateData['name'],$candidateData['email'],$candidateData['current_job'],$candidateData['profile_picture']);
            $candidate->setId($candidateData['id']);

            $candidates[] = $candidate;
        }
        return $candidates;
   }

      public function getAllRecruiters(){
        $data = $this->recruiterRepo->findAll();
        $recruiters = [];

        foreach ($data as $recruiterData) {
               $recruiter = new Recruiter($recruiterData['name'],$recruiterData['email'],$recruiterData['company_name'],$recruiterData['company_logo']);
               $recruiter->setId($recruiterData['id']);

            $recruiters[] = $recruiter;
        }
        return $recruiters;
   }
}
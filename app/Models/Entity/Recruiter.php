<?php
namespace App\Models\Entity;
use App\Models\Entity\User;

class Recruiter extends User{

    private string $company;
    private string $logo;
    private array $offers;

    public function __construct($name,$email,$company,$logo)
    {
        parent::__construct($name,$email,self::RECRUITER);
        $this->company = $company;
        $this->logo = $logo;
    }
    public function getCompany():string { return $this->company;}
    public function getLogo():string { return $this->logo;}
    public function getOffers():array { return $this->offers;}

    public function addOffer(Offer $offer):void{ $this->offers[] = $offer;}
    public function setOffers(array $offers):void{ $this->offers = $offers;}
    public function setComapny(string $company):void { $this->company = $company;}
    public function setLogo( string $logo):void { $this->logo = $logo;}


}


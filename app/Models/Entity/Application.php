<?php
namespace App\Models\Entity;

class Application{
    private int $id;
    private Candidate $candidate;
    private Offer $offer;
    private string $status;
    private string $response;

    public function __construct(Candidate $candidate,Offer $offer,string $status,string $response)
    {
        $this->candidate = $candidate;
        $this->offer = $offer;
        $this->status = $status;
        $this->response = $response;
    }

    public function getId():int{ return $this->id;}
    public function getCandidate():Candidate{ return $this->candidate;}
    public function getOffer():Offer{ return $this->offer;}
    public function getStatus():string{ return $this->status;}
    public function getResponse():string{ return $this->response;}

    public function setId(int $id):void { $this->id = $id;}
    public function setCandidate(Candidate $candidate):void { $this->candidate = $candidate;}
    public function setOffer(Offer $offer):void { $this->offer = $offer;}
    public function setStatus(string $status):void{ $this->status = $status;}
    public function setResponse(string $response):void{ $this->response = $response;}


}
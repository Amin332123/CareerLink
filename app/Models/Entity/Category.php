<?php
namespace App\Models\Entity;

class Category{
    private int $id;
    private string $title;

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function getId():int{ return $this->id;}
    public function getTitle():string{ return $this->title;}

    public function setId(int $id):void { $this->id = $id;}
    public function setTitle(string $title):void{ $this->title = $title;}


}
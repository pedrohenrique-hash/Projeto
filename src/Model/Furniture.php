<?php 

namespace App\Model;

class Furniture{

    private $id;
    
    private $model;
    
    private $image;

    private $renovationType;

    private $materialType;

    private $value;

    private $dimensions;


    public function getId(): int{

        return $this-> id;

    }

    public function setId(int $id){

        $this-> id = $id;

    }

    public function getModel(): string{

        return $this-> model;
    
    }

    public function setModel(string $model){

        $this -> model = $model;

    }

    public function getImage(): string{

        return $this-> image;

    }

    public function setImage(string $image){

        $this-> image = $image;

    }

    public function getRenovationType(): string{

        return $this -> renovationType;

    }

    public function setRenovationType(string $renovationType){

        $this -> renovationType = $renovationType;

    }

    public function getMaterialType(): string{

        return $this -> materialType;

    }

    public function setMaterialType(string $materialType){

        $this -> materialType = $materialType;

    }

    public function getValue (): float{

        return $this -> value;

    }

    public function setValue (float $value){

        $this-> value = $value;

    }

    public function getDimensions(): string{

        return $this -> dimensions;

    }

    public function setDimensions(string $dimensions){

        $this -> dimensions = $dimensions;

    }

}



?>
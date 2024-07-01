<?php

namespace App\Model;

class Person {
    
    private $id;
    
    private $name;
    
    private $email;
    
    private $phone;
    
    private $address;

    public function getId(): int {
    
        return $this->id;
    
    }

    public function setId(int $id) {
    
        $this->id = $id;
    
    }

    public function getName(): string {
    
        return $this->name;
    
    }

    public function setName(string $name) {
    
        $this->name = $name;
    
    }

    public function getEmail(): string {
    
        return $this->email;
    
    }

    public function setEmail(string $email) {
    
        $this->email = $email;
    
    }

    public function getPhone(): string {
    
        return $this->phone;
    
    }

    public function setPhone(string $phone) {
    
        $this->phone = $phone;
    
    }

    public function getAddress(): string {
    
        return $this->address;
    
    }

    public function setAddress(string $address) {
    
        $this->address = $address;
    
    }

}

?>

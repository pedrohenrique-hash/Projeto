<?php

namespace App\Service;

use App\Model\Person;
use App\Config\Database;
use PDO;

class PersonService implements PersonServiceInterface {
    private $conn;
    
    private $table = 'persons';

    public function __construct() {
    
        $database = new Database();
    
        $this->conn = $database->connect();
   
    }

    public function create(Person $person): bool {
    
        $query = 'INSERT INTO ' . $this->table . ' (name, email, phone, address) VALUES (:name, :email, :phone, :address)';
    
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':name', $person->getName());
    
        $stmt->bindParam(':email', $person->getEmail());
    
        $stmt->bindParam(':phone', $person->getPhone());
    
        $stmt->bindParam(':address', $person->getAddress());

        return $stmt->execute();
   
    }

    public function get(int $id): ?Person {
   
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id = :id';
   
        $stmt = $this->conn->prepare($query);
   
        $stmt->bindParam(':id', $id);
   
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
   
        if ($row) {
   
            $person = new Person();
   
            $person->setId($row['id']);
   
            $person->setName($row['name']);
   
            $person->setEmail($row['email']);
   
            $person->setPhone($row['phone']);
   
            $person->setAddress($row['address']);
   
            return $person;
   
        }
        return null;
    }

    public function getAll(): array {
   
        $query = 'SELECT * FROM ' . $this->table;
   
        $stmt = $this->conn->prepare($query);
   
        $stmt->execute();

        $persons = [];
   
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
   
            $person = new Person();
   
            $person->setId($row['id']);
   
            $person->setName($row['name']);
   
            $person->setEmail($row['email']);
   
            $person->setPhone($row['phone']);
   
            $person->setAddress($row['address']);
   
            $persons[] = $person;
        }
   
        return $persons;
   
    }

    public function update(Person $person): bool {
   
        $query = 'UPDATE ' . $this->table . ' SET name = :name, email = :email, phone = :phone, address = :address WHERE id = :id';
   
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':name', $person->getName());
   
        $stmt->bindParam(':email', $person->getEmail());
   
        $stmt->bindParam(':phone', $person->getPhone());
   
        $stmt->bindParam(':address', $person->getAddress());
   
        $stmt->bindParam(':id', $person->getId());

        return $stmt->execute();
   
    }

    public function delete(int $id): bool {
   
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
   
        $stmt = $this->conn->prepare($query);
   
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }
}
?>

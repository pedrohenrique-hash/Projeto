<?php

namespace App\Service;

use App\Model\Furniture;
use App\Config\Database;
use PDO;

class FurnitureService implements FurnitureServiceInterface {

    private $conn;

    private $table = 'furnitures';

    public function __construct() {
 
        $database = new Database();
 
        $this->conn = $database->connect();
 
    }

 
    public function create(Furniture $furniture): bool {
 
        $query = 'INSERT INTO ' . $this->table . ' (model, image, renovation_type, material_type, value, dimensions) VALUES (:model, :image, :renovation_type, :material_type, :value, :dimensions)';
 
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':model', $furniture->getModel());

        $stmt->bindParam(':image', $furniture->getImage());

        $stmt->bindParam(':renovation_type', $furniture->getRenovationType());

        $stmt->bindParam(':material_type', $furniture->getMaterialType());

        $stmt->bindParam(':value', $furniture->getValue());

        $stmt->bindParam(':dimensions', $furniture->getDimensions());

        return $stmt->execute();

    }


    public function get(int $id): ?Furniture {

        $query = 'SELECT * FROM ' . $this->table . ' WHERE id = :id';

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {

            $furniture = new Furniture();

            $furniture->setId($row['id']);

            $furniture->setModel($row['model']);

            $furniture->setImage($row['image']);

            $furniture->setRenovationType($row['renovation_type']);

            $furniture->setMaterialType($row['material_type']);

            $furniture->setValue($row['value']);

            $furniture->setDimensions($row['dimensions']);

            return $furniture;

        }

        return null;
    }

    public function getAll(): array {

        $query = 'SELECT * FROM ' . $this->table;

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $furnitures = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $furniture = new Furniture();

            $furniture->setId($row['id']);

            $furniture->setModel($row['model']);

            $furniture->setImage($row['image']);

            $furniture->setRenovationType($row['renovation_type']);

            $furniture->setMaterialType($row['material_type']);

            $furniture->setValue($row['value']);

            $furniture->setDimensions($row['dimensions']);

            $furnitures[] = $furniture;

        }
        return $furnitures;
    }

    public function update(Furniture $furniture): bool {

        $query = 'UPDATE ' . $this->table . ' SET model = :model, image = :image, renovation_type = :renovation_type, material_type = :material_type, value = :value, dimensions = :dimensions WHERE id = :id';

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':model', $furniture->getModel());

        $stmt->bindParam(':image', $furniture->getImage());

        $stmt->bindParam(':renovation_type', $furniture->getRenovationType());

        $stmt->bindParam(':material_type', $furniture->getMaterialType());

        $stmt->bindParam(':value', $furniture->getValue());

        $stmt->bindParam(':dimensions', $furniture->getDimensions());

        $stmt->bindParam(':id', $furniture->getId());

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

<?php

namespace App\Service;

use App\Model\Furniture;

interface FurnitureServiceInterface {
   
    public function create(Furniture $furniture): bool;
   
    public function get(int $id): ?Furniture;
   
    public function getAll(): array;
   
    public function update(Furniture $furniture): bool;
   
    public function delete(int $id): bool;

}
?>

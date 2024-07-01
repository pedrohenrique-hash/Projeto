<?php

namespace App\Service;

use App\Model\Person;

interface PersonServiceInterface {
   
    public function create(Person $person): bool;
   
    public function get(int $id): ?Person;
   
    public function getAll(): array;
   
    public function update(Person $person): bool;
   
    public function delete(int $id): bool;

}

?>

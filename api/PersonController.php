<?php

namespace App\Api;

use App\Service\PersonService;
use App\Model\Person;

class PersonController {
    private static $personService;

    public static function init() {
        self::$personService = new PersonService();
    }

    public static function create() {
       
        $data = json_decode(file_get_contents("php://input"));
       
        $person = new Person();
       
        $person->setName($data->name);
       
        $person->setEmail($data->email);
       
        $person->setPhone($data->phone);
       
        $person->setAddress($data->address);

        if (self::$personService->create($person)) {
       
            echo json_encode(['message' => 'Person Created']);
       
        } else {
       
            echo json_encode(['message' => 'Person Not Created']);
       
        }
    }

    public static function get($id) {
       
        $person = self::$personService->get((int)$id);
       
        if ($person) {
       
            echo json_encode([
       
                'id' => $person->getId(),
       
                'name' => $person->getName(),
       
                'email' => $person->getEmail(),
       
                'phone' => $person->getPhone(),
       
                'address' => $person->getAddress()
       
            ]);
       
        } else {
       
            echo json_encode(['message' => 'Person Not Found']);
       
        }
    }

    public static function getAll() {
       
        $persons = self::$personService->getAll();
       
        $result = [];
       
        foreach ($persons as $person) {
       
            $result[] = [
       
                'id' => $person->getId(),
       
                'name' => $person->getName(),
       
                'email' => $person->getEmail(),
       
                'phone' => $person->getPhone(),
       
                'address' => $person->getAddress()
       
            ];
       
        }
       
        echo json_encode($result);
    }

    public static function update($id) {
       
        $data = json_decode(file_get_contents("php://input"));
       
        $person = new Person();
       
        $person->setId($id);
       
        $person->setName($data->name);
       
        $person->setEmail($data->email);
       
        $person->setPhone($data->phone);
       
        $person->setAddress($data->address);

        if (self::$personService->update($person)) {
       
            echo json_encode(['message' => 'Person Updated']);
       
        } else {
       
            echo json_encode(['message' => 'Person Not Updated']);
       
        }
    }

    public static function delete($id) {
       
        if (self::$personService->delete((int)$id)) {
       
            echo json_encode(['message' => 'Person Deleted']);
       
        } else {
       
            echo json_encode(['message' => 'Person Not Deleted']);
       
        }
    }
}

PersonController::init();
?>

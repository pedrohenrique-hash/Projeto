<?php

namespace App\Api;

use App\Service\FurnitureService;
use App\Model\Furniture;

class FurnitureController {
   
    private static $furnitureService;

    public static function init() {
        
        self::$furnitureService = new FurnitureService();
    
    }

    public static function create() {
    
        $data = json_decode(file_get_contents("php://input"));
        
        $furniture = new Furniture();
        
        $furniture->setModel($data->model);
        
        $furniture->setImage($data->image);
        
        $furniture->setRenovationType($data->renovationType);
        
        $furniture->setMaterialType($data->materialType);
        
        $furniture->setValue($data->value);
        
        $furniture->setDimensions($data->dimensions);

        
        if (self::$furnitureService->create($furniture)) {
            
            echo json_encode(['message' => 'Furniture Created']);
        
        } else {
           
            echo json_encode(['message' => 'Furniture Not Created']);
        
        }
   
    }

   
    public static function get($id) {
       
        $furniture = self::$furnitureService->get((int)$id);
       
        if ($furniture) {
            
            echo json_encode([
                
                'id' => $furniture->getId(),
                
                'model' => $furniture->getModel(),
                
                'image' => $furniture->getImage(),
                
                'renovationType' => $furniture->getRenovationType(),
                
                'materialType' => $furniture->getMaterialType(),
                
                'value' => $furniture->getValue(),
                
                'dimensions' => $furniture->getDimensions()
           
            ]);
        
        } else {
         
            echo json_encode(['message' => 'Furniture Not Found']);
        
        }
    
    }

    
    public static function getAll() {
      
        $furnitures = self::$furnitureService->getAll();
       
        $result = [];
       
        foreach ($furnitures as $furniture) {
         
            $result[] = [
            
                'id' => $furniture->getId(),
            
                'model' => $furniture->getModel(),
            
                'image' => $furniture->getImage(),
             
                'renovationType' => $furniture->getRenovationType(),
             
                'materialType' => $furniture->getMaterialType(),
            
                'value' => $furniture->getValue(),
            
                'dimensions' => $furniture->getDimensions()
           
            ];
        }
        echo json_encode($result);
    }

    
    public static function update($id) {
      
        $data = json_decode(file_get_contents("php://input"));
     
        $furniture = new Furniture();
      
        $furniture->setId($id);
      
        $furniture->setModel($data->model);
      
        $furniture->setImage($data->image);
      
        $furniture->setRenovationType($data->renovationType);
      
        $furniture->setMaterialType($data->materialType);
      
        $furniture->setValue($data->value);
      
        $furniture->setDimensions($data->dimensions);

      
        if (self::$furnitureService->update($furniture)) {
      
            echo json_encode(['message' => 'Furniture Updated']);
      
        } else {
      
            echo json_encode(['message' => 'Furniture Not Updated']);
      
        }
    
    }

    
    public static function delete($id) {
    
        if (self::$furnitureService->delete((int)$id)) {
    
            echo json_encode(['message' => 'Furniture Deleted']);
    
        } else {
    
            echo json_encode(['message' => 'Furniture Not Deleted']);
    
        }
    
    }
}


FurnitureController::init();
?>

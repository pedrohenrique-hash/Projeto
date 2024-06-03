<?php

namespace App\Config;

use PDO;

use PDOException;


class Database{

    private $host = '';

    private $db_name = '';

    private $username = '';

    private $password = '';
    
    private $conn;

    public function connect(){

        $this-> conn = null;

        try{

            $this -> conn = new PDO("pfsql:host=". $this->host . ";dbname=". $this->db_name, $this -> username, $this-> password);

            $this-> conn -> setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $exception){

            echo "Connection error: ". $exception->getMessage();

        }

        return $this-> conn;

    }


}






?>
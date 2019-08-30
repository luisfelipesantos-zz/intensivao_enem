<?php

include_once "..\config.php"; 

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

require(AUTOLOAD);

class Database {

    protected $database;
    protected $dbname = 'inscritos';

    public function __construct() {
        $serviceAccount = ServiceAccount::fromJsonFile(CHAVE);
        $firebase = (new Factory)->withServiceAccount($serviceAccount)->create();

        $this->database = $firebase->getDatabase();
    }

    public function readAll() {
        return $this->database->getReference($this->dbname)->getSnapshot()->getValue();    
    }

    public function insert(array $data) {
        if(empty($data) || !isset($data)) {
            return false;
        }       

        if((sizeof($this->readAll())) < 17) {
            $this->database->getReference($this->dbname)->push($data);
            echo "Salvo com sucesso!";
        } else {
            echo "Subscribed limit reached!";
            return false;
        }        
        
        return true;
    }
    
}

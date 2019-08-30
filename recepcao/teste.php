<?php

require '../vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
$serviceAccount = ServiceAccount::fromJsonFile('../secret/intensivao-enem-firebase-adminsdk-vcsip-5bc3a9c4d3.json');

$firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->withDatabaseUri('https://intensivao-enem.firebaseio.com/')
    ->create();

$database = $firebase->getDatabase();

$subs = $database->getReference("inscritos")->getSnapshot()->getValue(); 

for ($i=0; $i < 37; $i++) { 
    array_shift($subs);
}

//script de colocação do atributos dos dias do evento em cada individuo inscrito  com o valor false
$counter = sizeof($database->getReference("inscritos")->getSnapshot()->getValue()); 
echo $counter;
    foreach ($subs as $id => $value) {
        $database->getReference()->getChild('inscritos')->getChild($id)->update(["3"=>false, "4"=>false, "5"=>false, "6"=>false, "7"=>false, "8"=>false, "9"=>false, "10"=>false, "11"=>false, "12"=>false, "13"=>false, "14"=>false, "15"=>false]);
        echo "<br/>passando por {$id}<br/>";
    }

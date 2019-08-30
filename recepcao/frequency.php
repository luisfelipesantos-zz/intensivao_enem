<?php
// header("Location: home.php");

require '../vendor/autoload.php';

$present = $_POST["present"];
$day = $_POST["day"];

var_dump($_POST["present"]);
var_dump($_POST["day"]);

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

//Indicando chave que está no arquivo JSON
$serviceAccount = ServiceAccount::fromJsonFile('../secret/intensivao-enem-firebase-adminsdk-vcsip-5bc3a9c4d3.json');

//Conectando com o Banco de Dados na plataforma Firebase
$firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->withDatabaseUri('https://intensivao-enem.firebaseio.com/')
    ->create();

//Instanciando RealTime Database em uma variável
$database = $firebase->getDatabase();


//Setando o a presença do usuario como true no dia atual
try {
    foreach ($present as $pres) {
        $database->getReference()->getChild('inscritos')->getChild($pres)->update([$day=>true]); 
    }
    header("Location: index.php");    
} catch(Exception $e) {
    $e->getTrace();
}

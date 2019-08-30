<?php


require '../vendor/autoload.php';

$feed = $_POST["feed"];

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
$serviceAccount = ServiceAccount::fromJsonFile('../secret/intensivao-enem-firebase-adminsdk-vcsip-5bc3a9c4d3.json');

$firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->withDatabaseUri('https://intensivao-enem.firebaseio.com/')
    ->create();

$database = $firebase->getDatabase();

try {
    $database->getReference('feedback')->push([
        'feed' => $feed,
    ]);
    header("Location: thankyou.php");
} catch (Exception $e) {
    echo "Não foi possível salvar";   
}

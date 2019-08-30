<?php
// header("Location: home.php");

require __DIR__.'/vendor/autoload.php';

$nome = $_POST["nome"];
$email = $_POST["email"];
$curso = $_POST["curso"];
$telefone = $_POST["telefone"];

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
$serviceAccount = ServiceAccount::fromJsonFile('secret/intensivao-enem-firebase-adminsdk-vcsip-5bc3a9c4d3.json');

$firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->withDatabaseUri('https://intensivao-enem.firebaseio.com/')
    ->create();

$database = $firebase->getDatabase();

try {
    if(sizeof($database->getReference("inscritos")->getSnapshot()->getValue()) < 60) {
        $database->getReference('inscritos')->push([
            'nome' => $nome,
            'email' => $email,
            'curso' => $curso,
            'telefone' => $telefone
        ]);
        header("Location: success.php");
    } else {
        header("Location: soldout.php");
    }
} catch (Exception $e) {
    echo "Não foi possível salvar";   
}

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

function frequency($count) {
    return ($count * 100) / 13;
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>INTENSIVÃO ENEM</title>

    <meta charset="utf-8">


    <link type="text/css" rel="stylesheet" href="..\css\adm.css">
    <link rel="shortcut icon" href="../imgs/favicon.png">

</head>

<body>

    <img src="../imgs/logo.png" />

    <div class="center_div">
            <h3>Frequência</h3>

            <br/>
            <?php
                foreach ($subs as $id => $value) {
                    $count = 0;
                    for ($i = 3; $i < 16 ; $i++) { 
                        
                      $count += $value[$i];
                    }
                    echo "<p>".$value['nome'] . " - <b>" . round(frequency($count), 1) . "%</b></p><br/>";
                }           
            ?>
    </div>

</body>

</html>

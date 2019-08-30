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
        <div class="mid_center_div">
            <h4>Telefones</h4>

            <br/>
            <?php
                $charac = array("(", ")", "-", " ");

                foreach ($subs as $id => $value) {
                    $f_value = str_replace($charac, "", $value['telefone']);
                    echo "<p>".$f_value."</p><br/>";
                }                
            ?>
        </div>
        <div class="mid_center_div">
            <h4>E-mails</h4>
            <br/>
            <?php
                foreach ($subs as $id => $value) {
                    echo "<p>".$value['email']."</p><br/>";
                }                
            ?>
        </div>
        
    </div>

</body>

</html>

<?php 

include_once "..\config.php"; 

require(AUTOLOAD);
require(DATABASE);

$database = new Database();

$subs = $database->readAll();

?>
<!DOCTYPE html>
<html>

<head>
    <title>INTENSIVÃO ENEM</title>

    <meta charset="utf-8">

    <link type="text/css" rel="stylesheet" href="..\css\adm.min.css">
    <link rel="shortcut icon" href="../imgs/favicon.png">

</head>

<body>

    <img src="../imgs/logo.png" />

    <div class="center_div">
        <h3>Inscritos: </h3><br>
        
            <?php
                $counter = 1;
                foreach ($subs as $id => $value) {
                    
                    echo "<p>
                    <b>".$counter." -  Nome: </b> ".$value['nome'].
                    "<br>
                    <b>Email: </b> ".$value['email'].
                    "<br>
                    <b>Curso desejado: </b> ".$value['curso'].
                    "<br>
                    <b>Telefone:</b> ".$value['telefone'].
                    "<br></p>";
                    echo "<br><hr><br>";
                    $counter++;
                }
            ?>
        
        
    </div>

</body>

</html>

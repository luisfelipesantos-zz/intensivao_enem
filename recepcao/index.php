<?php 

require '../vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
$serviceAccount = ServiceAccount::fromJsonFile('../secret/intensivao-enem-firebase-adminsdk-vcsip-5bc3a9c4d3.json');

//Conectando com o Banco de Dados na plataforma Firebase
$firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->withDatabaseUri('https://intensivao-enem.firebaseio.com/')
    ->create();

//Instanciando RealTime Database em uma variável
$database = $firebase->getDatabase();

//Armazenando lista dos inscritos na variável $subs
$subs = $database->getReference("inscritos")->getSnapshot()->getValue();  

//Instanciando o dia atual na variável dia
$dia = new DateTime();

$formatedDay = (int)$dia->format('d');

function isChecked($checked) {
    if($checked == true){
        return "checked";
    } 
}

$recepcao = "";

session_start();
if(isset($_SESSION['reception'])) {
    $recepcao = "ok";
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>INTENSIVÃO ENEM</title>

    <meta charset="utf-8">

    <link type="text/css" rel="stylesheet" href="../css/reception.css">
    <link rel="shortcut icon" href="../imgs/favicon.png">
	
</head>

<body id="pagina" display="none">
    <img src="../imgs/logo.png" />

    <div id="secure" class="secure">
        <form method="POST" action="secure.php">
            <input name="pass" type="password" class="input_text" placeholder="Password">
            <button type="submit">Enter</button>
        </form>   
    </div>
    <div id="center_div" class="center_div">

        <?php
        echo "<h3 id='welcome'>Bem-vindo(a)!</h3><br/><h1>";
        echo $dia->format("d-m-Y");
        echo "</h1>";
        ?>  
        <br/>
        <p id="alert">Para registrar a presença do participante, marque a caixa de seleção correspondente que está<br/> do lado direito da página. Caso deseje desfazer o registro, procure o responsável técnico.</p>
        <br/><br/>
        <form action="frequency.php" method="POST">
            <?php
                $counter = 1;
                foreach ($subs as $id => $value) {
                    $check = isChecked($value[$formatedDay]);
                    echo "<p>
                    <b>".$counter." - </b> ".$value['nome'].
                    " <input type='checkbox' $check name='present[]' value='{$id}' onChange='this.form.submit()'><br>";
                    echo "<input hidden='hidden' name='day' value='{$formatedDay}'>";
                    echo "<br><hr><br>";
                    $counter++;
                }
            ?>
            </form>       
    </div>
    
    <?php
        if($recepcao == "ok") {
            echo "
            <script type='text/javascript'>
                var secure = document.getElementById('secure');
                secure.style.display = 'none';
                var lista = document.getElementById('center_div');
                lista.style.display = 'block';
            </script>
            ";
        }
    ?>
    

</body>

</html>

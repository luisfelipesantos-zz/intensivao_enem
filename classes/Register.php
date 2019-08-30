<?php
include_once "..\config.php"; 

require_once AUTOLOAD;
require_once DATABASE;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$nome = $_POST["nome"];
$email = $_POST["email"];
$curso = $_POST["curso"];
$telefone = $_POST["telefone"];


$database = new Database();

try {
    if($database->insert([
        'nome' => $nome,
        'email' => $email,
        'curso' => $curso,
        'telefone' => $telefone
    ])) {
        header("Location: ../success.php");
    } else {
        header("Location: ../soldout.php");
    }

    
} catch (Exception $e) {
    echo "Não foi possível salvar";   
}

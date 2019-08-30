<?php

session_start();

if(!isset($_POST['pass'])) {
    header("Location: index.php");
}

if(isset($_SESSION['reception'])){
    header("Location: index.php");
} else {
    if($_POST['pass'] == "recepcaoadm123") {
        
        $_SESSION['reception'] = "ok";
        header("Location: index.php");
    } else {
        header("Location: index.php");
    }
}
<?php

$localhost = "localhost";
$dbname = "moviestar";
$dbuser = "root";
$dbpassword = "";


$conn = new PDO("mysql:dbname=". $dbname.";host=".$localhost, $dbuser,$dbpassword);
// habilitar erro
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
?>


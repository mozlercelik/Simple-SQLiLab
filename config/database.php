<?php
session_start();
$host       = "localhost"; // you can change
$user       = "root"; // you can change
$password   = ""; // you can change
$db         = "sibervatan_sqlmap_lab1";

try{
    $VeritabaniBaglantisi = new PDO("mysql:host=$host;dbname=$db;charset=UTF8", $user, $password);
}catch(PDOException $err){
    echo "Error Connection: <br/>" . $err->GetMessage();
    die();
}
$time = time();
function Filtre($value){
    $resultOne      = trim($value);
    $resultTwo      = str_replace("#", "", $resultOne);
    $resultThree    = str_replace("sleep", "", mb_strtolower($resultTwo));
    $resultFour     = str_replace("and", "", mb_strtolower($resultThree));
    $result         = $resultFour;
    return $result;
}
?>
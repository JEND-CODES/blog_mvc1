<?php

try{
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_mvc;charset=utf8', 'root', '');
    
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    
    
}catch(PDOException $e){
    
    die($e->getMessage());
    
    
}


?>
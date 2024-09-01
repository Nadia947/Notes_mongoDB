<!--conexiune baza de date-->
<?php

// connect
    require_once "vendor/autoload.php";
   $client = new MongoDB\Client('mongodb://localhost:27017'); //facem conectarea la baza de date mongoDB
    $database = $client->bazaDB; //ne conectam la baza noastra de date
    
    $utilizatori=$database->utilizatori; //ne conectam la colectia utilizatori
    $note=$database->note; //ne conectam la colectia note

session_start();

?>
<!--conexiune baza de date-->
<?php
try{
  $db = new PDO('mysql:host=localhost;dbname=contacts', 'root', '');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.
  global $db; //On défini notre variable globale
}
//retourne un message d'erreur lorsqu'une
// exception est levée
catch (\Exception $e){
 echo $e->getMessage();
}

<?php
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=branlytest','root','');
  }
  catch (\Exception $e)
  {
    die ('Erreur : '.$e->getMessage());
  }

  $name = $_POST['name'];
  $firstname = $_POST['firstname'];
  $classroom = $_POST['classroom'];
  $gender = $_POST['gender'];
  $bday = $_POST['bday'];
  $uid = $_POST['uid'];
  $bdd->exec("INSERT INTO test (Nom, Prenom, Classe, Genre, Date_Naissance, UID) VALUES ('". $name ."','". $firstname ."','". $classroom ."','". $gender ."','". $bday ."','". $uid ."')");
?>

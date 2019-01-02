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
  $job = $_POST['job'];
  $gender = $_POST['gender'];
  $bday = $_POST['bday'];
  $uid = $_POST['uid'];
  $bdd->exec("INSERT INTO test2 (Nom, Prenom, Profession, Genre, Date_Naissance, UID) VALUES ('". $name ."','". $firstname ."','". $job ."','". $gender ."','". $bday ."','". $uid ."')");
?>

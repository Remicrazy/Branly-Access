<?php
header('Content: application/json', 1);
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=branlytest','root','');
  }
  catch (Exception $e)
  {
    die ('Erreur : '.$e->getMessage());
  }

  $user = $_POST['user'];
  $pwd = $_POST['pwd'];

  $req = $bdd->prepare("SELECT idMembre, Password FROM membres WHERE Pseudo = :pseudo");
  $req->execute(array(
    "pseudo" => $user));
  $resultat = $req->fetch();

  $isPasswordCorrect = password_verify($pwd, $resultat['Password']);

  if (!$resultat)
  {
    // echo 'Mauvais identifiant ou mot de passe!';
    $retour['valid'] = 0;
    $retour["message"] = '&lt;p class="error"&gt;Erreur lors de la connexion, veuillez vérifier votre adresse mail !&lt;/p&gt;';
  }
  else {
    if ($isPasswordCorrect){
      session_start();
      $_SESSION['idMembre'] = $resultat['idMembre'];
      $_SESSION['Pseudo'] = $user;
      $retour['valid'] = 1;
      $retour["message"]= '&lt;p class="success"&gt;Vous avez été connecté avec succès.&lt;/p&gt;;';
    }
    else {
      // echo 'Mauvais identifiant ou mot de passe!';
      $retour['valid'] = 0;
      $retour["message"] = '&lt;p class="error"&gt;Erreur lors de la connexion, veuillez vérifier votre adresse mail !&lt;/p&gt;';
    }
  }
  echo json_encode($retour);
?>

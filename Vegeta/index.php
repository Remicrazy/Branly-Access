<?php

session_start();

try
{
  $bdd = new PDO('mysql:host=localhost;dbname=branlytest','root','');
}
catch (Exception $e)
{
  die ('Erreur : '.$e->getMessage());
}
?>
<!DOCTYPE HTML>
<html class="has-navbar-fixed-top">

  <!--Head-->
  <head>
      <meta charset="utf-8">
      <title>Branly Access</title>

      <!--CSS-->
      <link rel="stylesheet" href="src/css/bulma.css">
      <link rel="stylesheet" href="src/css/main.css" >
      <!--CSS-->

      <!--Font-->
      <script defer src="src/css/fontawesome-all.min.js"></script>
      <!--Font-->

  </head>
  <!--Head-->

  <!--Body-->
  <body>

    <!--Header V2-->
    <?php
    if(isset($_SESSION['idMembre'])  && isset($_SESSION['Pseudo']))
    {
      include('src/php/user_header.php');
    }
    else
    {
      include('src/php/other_header.php');
    }
    ?>
    <!--Header V2-->

    <!--Banner-->
    <?php
    if(isset($_SESSION['idMembre'])  && isset($_SESSION['Pseudo']))
    {
      include('src/php/user_banner.php');
    }
    else
    {
      include('src/php/other_banner.php');
    }
    ?>
    <!--Banner-->

    <!--Section A Propos-->
    <?php
    if(isset($_SESSION['idMembre']) && isset($_SESSION['Pseudo']))
    {}
    else
    {
      include('src/php/other_about.php');
    }
    ?>
    <!--Section-->

    <!--Section Supervision-->
    <?php
    if(isset($_SESSION['idMembre']) AND $_SESSION['Pseudo'] !='badge')
    {
      include('src/php/user_supervisor.php');
    }
    ?>
    <!--Section-->

    <!--Section Administration-->
    <?php
    if(isset($_SESSION['idMembre']) AND $_SESSION['Pseudo'] !='camera')
    {
      include('src/php/user_administrator.php');
    }
    ?>
    <!--Section-->

    <!--Footer-->
    <footer class="footer">
      <div class="container">
        <div class="content has-text-centered">
          <p>
            TOUS DROITS RÉSERVÉS <i class="far fa-copyright"></i> 2018 | <strong>Branly Acces</strong> by BTS SNIR 2
          </p>
          <p>
            <i class="fas fa-map-marker-alt"></i>
            29 av.du Président JF.KENNEDY | 28100 DREUX
          </p>
          <p>
            <i class="fas fa-phone"></i>
            02 37 62 58 58
          </p>
          <p>
            <i class="fas fa-fax"></i>
            02 37 62 58 59
          </p>
          <p>
            <i class="fas fa-at"></i>
            ce.0280021w@ac-orleans-tours.fr
          </p>
        </div>
      </div>
    </footer>
    <!--Footer-->

    <!--Script-->
    <script src="src/js/jquery-3.3.1.min.js"></script>
    <script src="src/js/main.js"></script>

  </body>
  <!--Body-->

</html>

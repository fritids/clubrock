<?php

session_start() ;
include_once('elements_generiques.php');

$logged_in = false ;
// On vérifie si l'utilisateur est connecté

if (isset($_SESSION["connecte"])) 
{
  $connecte = true;
  $uid = $_SESSION['uid'];
  $nom = $_SESSION['nom'];
  $prenom = $_SESSION['prenom'];
  $pseudo = $_SESSION['pseudo'];
  $avatar = $_SESSION['avatar'];

  // + Autres infos nécessaires à donner à la fonction 'mini_profil()' 
} 

//Affiche header
en_tete("EN piSte !", "Danses en couple ( Rock - Salsa - West Coast - Danses de salon ) à l'ENS de Lyon","","");
?>

<!-- Code de la page avec conditions -->
<? if ($connecte) mini_profil(); else formulaire_identification() ; ?>


<?php fin_page();?>
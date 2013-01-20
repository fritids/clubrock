<?php
session_start();

if (isset($_GET['exit'])) session_destroy() ;

include_once('elements_generiques.php');

$connecte = false ;
// On vérifie si l'utilisateur est connecté

if (isset($_SESSION["pseudo"])&&!isset($_GET['exit'])) 
{
  $connecte = true;
  $nom = $_SESSION['nom'];
  $prenom = $_SESSION['prenom'];
  $pseudo = $_SESSION['pseudo'];
  //$avatar = $_SESSION['avatar'];
  // + Autres infos nécessaires à donner à la fonction 'mini_profil()' 
} 
//Affiche header
en_tete("EN piSte !", "Danses en couple ( Rock - Salsa - West Coast - Danses de salon ) à l'ENS de Lyon","","");
?>

<!-- Code de la page avec conditions -->
<?php 
if ($connecte)
  { 
    echo '<h1> <a href="profil.php">'.$pseudo.'</a> @ClubRock - EN piSte ! </h1>'; 
    echo 'Voir mon <a href="profil.php"> profil </a><br/>' ;
    echo '<a href=index.php?exit=1> Déconnexion </a>' ;
  }
else 
  {
    echo '<h1> Club Rock - EN piSte ! </h1>'; 
    formulaire_identification() ; 
    fin_page(); 
  } 
?>

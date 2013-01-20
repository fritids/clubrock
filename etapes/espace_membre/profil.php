<? 
include_once('elements_generiques.php');
session_start();
if (!isset($_SESSION['pseudo'])) 
  {
    en_tete('Erreur','','','') ;
?>    

<h1> Erreur </h1>

<p> Pour voir votre profil, il faut vous <a href="index.php"> connecter </a> </p>

<p> <a href="inscription.html"> Créer mon compte </a> </p>


<?php
    fin_page();
  }
else
  {
    en_tete('Profil de '.$_SESSION['pseudo'],'','','');
?>

    <h1> Profil de <?php echo $_SESSION['pseudo']; ?> </h1> 

<section id="infos">
  <ul>
    <li> Nom : <?php echo $_SESSION['nom'] ; ?> </li>
    <li> Prénom : <?php echo $_SESSION['prenom'] ; ?> </li>
    <li> Mail : <?php echo $_SESSION['mail'] ; ?> </li>
  </ul>
</section>

<section id="options">
  <ul>
    <li> <a href="index.php"> Accueil </a> </li>
    <li> <a href="modifier_profil.php"> Modifier mes informations </a> </li>
  </ul>
</section>

<?
    fin_page();
      } ;
?>
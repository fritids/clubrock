<?php 

function en_tete($title, $description, $author, $stylesheet)
{
  printf('<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>%s</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <meta name="description" content="%s"/>
    <meta name="author" content="%s"/>
    <link rel="stylesheet" href="../css/style.css" type="text/css"></link>
  </head>

  <body>', $title, $description, $author) ;
}

function fin_page()
{
  echo '</body></html>';
}

function mini_profil($avatar, $pseudo)
{
  printf( '<section id="mini_profil"> 
  <img src="avatars/%s" id="avatar" height="100" width="100" />
  <p> Pseudo : %s <br/>
  <a href="profil_prive.php"> Afficher </a> | <a href="modifier_profil.php"> Modifier </a>  mon profil.
  <a href="profils_publics"> Autres danseurs </a> 
  </p>
</section>' , $avatar , $pseudo );
}

function formulaire_identification()
{
echo '<section id="connexion">
  <h2> Identifiez-vous </h2>
  <form action="identification.php" method="post" >
  <label> Pseudo <input name="pseudo" type="text"/> </label><br/>
  <label> Mot de passe <input name="mdp" type="password" /> </label> 
  <input type="submit"  value="Connexion" />
  </form>
  <h2> Ou <a href="inscription.html"> créez votre compte </a> </h2> 
</section>' ;

} ?>
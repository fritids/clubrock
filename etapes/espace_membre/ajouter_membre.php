<?
include_once('utilitaires.php');

// Enregistre un nouveau membre dans la base de données et redirige vers sa page de profil, ou la page d'accueil

$champs_transmis = array('nom', 'prenom', 'pseudo', 'mail', 'mdp', 
'telephone', 'statut_ens', 'statut_bde', 'rock', 'salsa', 'west_coast', 'salon', 'liste_diffusion' ) ; 

$parametres_requete = securise_donnees( $champs_transmis , $_POST );
//print_r( $parametres_requete );

// Vérifier que tous les champs ont été transmis, et qu'ils ont bien la forme attendue.

$sql = "INSERT INTO clubrock_membres (nom, prenom, pseudo, mail, mdp, 
telephone, statut_ens, statut_bde, rock, salsa,
west_coast, salon, liste_diffusion) 
VALUES
(:nom, :prenom, :pseudo, :mail, :mdp, 
:telephone, :statut_ens, :statut_bde,:rock, 
:salsa, :west_coast, :salon, :liste_diffusion)" ; 

//On ajoute le nouveau membre à la base.

$liaison = new PDO('mysql:host=localhost; dbname=clubrock', 'clubrock_admin','chachacha'); 

execute_requete( $liaison, $sql, $parametres_requete);

// On démarre une session, et on renvoie à la page accueil ou affichage de profil.
session_start();
foreach ( $champs_transmis as $nom ) 
  $_SESSION[$nom] = $parametres_requete[':'.$nom];

$_SESSION['connecte'] = true ;

print_r( $_SESSION ) ;

//session_destroy() ;

header('Location:profil.php' );
?>
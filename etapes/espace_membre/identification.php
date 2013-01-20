<?
include_once('utilitaires.php');
include_once('elements_generiques.php');

// On se connecte à la base de données 
$liaison = new PDO('mysql:host=localhost; dbname=clubrock', 'clubrock_admin', 'chachacha'); 

// On securise les donnees transmises par l'utilisateur
$identifiants_transmis = array('pseudo', 'mdp');
$identifiants_securises = securise_donnees( $identifiants_transmis , $_POST );
print_r($identifiants_securises) ;
//On prepare la requête SQL
$sql = "SELECT * FROM clubrock_membres WHERE pseudo = :pseudo AND mdp = :mdp ; " ;

//On vérifie si les identifiants sont valides
$requete = execute_requete( $liaison, $sql, $identifiants_securises ) ;
$trouve = $requete -> rowCount();
print($trouve);

if ( $trouve == 0 ) 
{  
  en_tete('Mauvais identifiants','','','');
  echo "<h1> Mauvais identifiants, essayez à nouveau </h1>" ;
  formulaire_identification();
  fin_page();
}   

else
  {
    session_start();
    $donnees = $requete->fetch(PDO::FETCH_ASSOC);
    $_SESSION = array_merge( $_SESSION , $donnees ) ;
    //print_r($_SESSION);
    header('Location:index.php');
    //On démarre une session avec les infos personnelles de l'utilisateur
    // On redirige vers l'accueil
  }  

?>
<?
include_once('utilitaires.php');

// On se connecte à la base de données 
$liaison = new PDO('mysql:host=localhost; dbname=clubrock', 'clubrock_admin', 'chachacha'); 

// On securise les donnees transmises par l'utilisateur
$identifiants_transmis = array('email' , 'pseudo', 'mdp');
$identifiants_securises = securise_donnees( $identifiants_transmis , $_POST );

//On prepare la requête SQL
$sql = "SELECT * FROM clubrock_membres WHERE (email = :email OR pseudo = :pseudo ) AND mdp = :mdp ; " ;

//On vérifie si les identifiants sont valides
$requete = execute_requete( $liaison, $sql, $identifiants_securises ) ;
$trouve = $requete -> rowCount();

if ( $trouve == 0 ) {  
//On propose un nouvel essai 
}   

else
  {
    //On démarre une session avec les infos personnelles de l'utilisateur
    // On redirige vers l'accueil
  }  

?>
<?
// On se connecte à la base de données 

$bdd = new PDO('mysql:host=localhost; dbname=clubrock', 'root', 'root'); 

// On vérifie les identifiants et le mdp 
 
$sql = "SELECT * FROM clubrock_membres WHERE (email = :email OR pseudo = :pseudo ) AND mdp = :mdp ; " ;
$requete = $liaison -> prepare( $sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY) ) ;
$requete -> execute( array( ':email' => $_POST['email'], ':pseudo' => $_POST['pseudo'], ':mdp' => $_POST['mdp']) ) ;

//On vérifie si le résultat est vide ou non
$trouve = $requete -> rowCount();
 
if ( $trouve == 0  {  
//On propose un nouvel essai 
}   
else
  {
    //On démarre une session avec les infos personnelles de l'utilisateur


    // On redirige vers l'accueil
  }  

?>
<?php
// Pour que la fonction s'exécute sans erreurs, il faut que 
// toutes les clefs figurent dans le tableau

function securise_donnees ( $cles, $tableau )
{
  $valeurs_securisees = array ();
  
  // Si 'mdp' fait partie des clefs, on chiffre le mot de passe
  // puis on l'enlève du tableau
  
  $position = array_search('mdp',$cles);

  if($position!==false){
    $valeurs_securisees[':mdp'] = sha1( $tableau['mdp'] ) ;
    unset($cles[$position]);}    
   
  foreach( $cles as $cle)
    $valeurs_securisees[':'.$cle] = htmlspecialchars($tableau[$cle]);
  
  return $valeurs_securisees ;

}

//Pour tester :  
//$cles = array( 'mdp','uid' );
//$donnees = array('mdp'=>'toto' , 'uid'=>'<em> titi </em>'); 
//$donnees_securisees = securise_donnees( $cles , $donnees) ;
//print_r( $donnees_securisees );


function execute_requete($liaison, $sql , $parametres) 
{
  $requete = $liaison -> prepare( $sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY) ) ;
  $requete -> execute($parametres);
  // Gestion d'exception 
  return $requete ;
}

// Pour tester 

//$liaison = new PDO('mysql:host=localhost; dbname=clubrock', 'clubrock_admin//','chachacha'); 
//$donnees = array('pseudo'=>'tutq', 'mdp'=>'tata');
//$cles = array('pseudo', 'mdp');
//$donnees_securisees = securise_donnees( $cles , $donnees) ;
//$sql="INSERT INTO test values(:pseudo , :mdp)";
//execute_requete($liaison, $sql, $donnees_securisees );

?>

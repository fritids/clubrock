<?php  echo '<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title> Votre profil </title>
  </head>
  <body>
    <h1> Vous voilà ! </h1>'  ?>

<?php
include("create_avatar.php");

// On vérifie que l'image est bien de type jpeg
 
if ($_FILES["photo"]["type"] == "image/jpeg")
  {
  if ($_FILES["photo"]["error"] > 0)
    {
    echo "Error: " . $_FILES["photo"]["error"] . "<br>";
    }
  else
    {
      $uploaded_image = $_FILES["photo"]["tmp_name"];
      $uploaded_image_name = $_FILES["photo"]["name"];
      move_uploaded_file($uploaded_image , 'avatars/'.$uploaded_image_name ); 
     
      create_avatar($uploaded_image, $uploaded_image_name, 100, 100);      
      $avatar_name = "mini_".$uploaded_image_name ;
?>

<?php 
      //echo getcwd()."</br>" ;
      //chdir(sys_get_temp_dir());
      //echo getcwd()."</br>" ;
      print_r( getimagesize('avatars/'.$uploaded_image_name) ) ; 
?>

<img alt="" src="avatars/<?php echo $avatar_name ; ?>" />     
<?php 
echo $_POST['nom'].'<br/>';// echo $width; echo $height.'<br/>'; echo $new_width.'</br>' ; echo $new_height.'<br/>'; echo $ratio ; ?>
    
<?php 
    }
  }
else
  {
  echo "Invalid file";
  }
?> 

<?php
//Fin de la page 
echo '</body></html>' 
?>
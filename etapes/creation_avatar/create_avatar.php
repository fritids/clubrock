<?php
/* Extrait de la documentation PHP 

bool imagecopyresampled ( resource $dst_image , resource $src_image , int $dst_x , int $dst_y , int $src_x , int $src_y , int $dst_w , int $dst_h , int $src_w , int $src_h )

imagecopyresampled() copie une zone rectangulaire de l'image src_im vers l'image dst_im. Durant la copie, la zone est rééchantillonnée de manière à conserver la clarté de l'image durant une réduction. 

En d'autres termes, imagecopyresampled() prendra une forme rectangulaire src_image d'une largeur de src_w et d'une hauteur src_h à la position (src_x,src_y) et le placera dans une zone rectangulaire dst_image d'une largeur de dst_w et d'une hauteur de dst_h à la position (dst_x,dst_y). 
 */

/* Dans une première version de ce script, on suppose que l'image uploadée est au format jpeg */

function create_avatar($uploaded_image , $uploaded_image_name , $height_avatar , $width_avatar )

{
  $dimensions = getimagesize('avatars/'.$uploaded_image_name);
  global $width, $height ;
  $width = (int) $dimensions['0'];
  $height = (int) $dimensions['1'];
  $avatar_name = "mini_".$uploaded_image_name;

  if ($width <= $width_avatar && $height <= $height_avatar)
    {
  //Si largeur et hauteur de l'image sont plus petites que celles de l'avatar, c'est bon, et on enregistre l'image sur le serveur
      move_uploaded_file($uploaded_image , "avatars/".$avatar_name);
    }

  else
    { //Il faut trouver le bon facteur de réduction parmi les deux possibles :
      global $ratio,  $width_ratio , $height_ratio  ;
      $ratio = 1 ;
      $width_ratio = $width_avatar/$width ;
      $height_ratio = $height_avatar/$height ;
      
      //Si dans les deux cas, c'est un facteur rétrécissant, on prend le plus grand des deux     
      if (($width_ratio <= 1) && ($height_ratio <= 1)) 
	{$ratio = max( $width_ratio, $height_ratio);}
      
      //Sinon on prend celui des deux facteurs qui est rétrécissant
      
      else
	{
	  if ($width_ratio <= 1) 
	    {$ratio = $width_ratio ;} 
	  else 
	    {$ratio = $height_ratio ;}
	}
    
      //Maintenant, on peut calculer les nouvelles dimensions de l'image
      global $new_width ;
      global $new_height ;
      $new_width = round($ratio*$width) ;
      $new_height = round($ratio*$height) ;

      //Et pour finir, on miniaturise en utilisant GD
      // D'abord on crée deux ressources, l'une pointant sur l'image uploadée, l'autre sur une image vide
       
      $user_picture = imagecreatefromjpeg('avatars/'.$uploaded_image_name);
      $reduced_user_picture = imagecreate( (int)$new_width, (int)$new_height); 
     
       imagecopyresampled ( $reduced_user_picture , $user_picture ,  $new_width ,  $new_height ,  0 , 0 , 0 , 0 , $width , $height ) ;
	  
      //Finalement, on enregistre la miniature en écrasant l'original, qu'on ne veut pas garder
      imagejpeg($reduced_user_picture , "avatars/".$avatar_name );

    }
}

/* Extrait de la documentation PHP 

bool imagecopyresampled ( resource $dst_image , resource $src_image , int $dst_x , int $dst_y , int $src_x , int $src_y , int $dst_w , int $dst_h , int $src_w , int $src_h )

imagecopyresampled() copie une zone rectangulaire de l'image src_im vers l'image dst_im. Durant la copie, la zone est rééchantillonnée de manière à conserver la clarté de l'image durant une réduction. 

En d'autres termes, imagecopyresampled() prendra une forme rectangulaire src_image d'une largeur de src_w et d'une hauteur src_h à la position (src_x,src_y) et le placera dans une zone rectangulaire dst_image d'une largeur de dst_w et d'une hauteur de dst_h à la position (dst_x,dst_y). 
 */


?>

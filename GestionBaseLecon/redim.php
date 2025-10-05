<?PHP
  $src_im = ImageCreateFromJpeg($_FILES['photo']['tmp_name']);
  $size = GetImageSize($_FILES['photo']['tmp_name']);
  $src_w = $size[0];
  $src_h = $size[1];
  //taille de votre image
  $dst_h = 400;
  // Contraint le r��chantillonage � une largeur fixe
  // Maintient le ratio de l'image
  $dst_w = round(($dst_h / $src_h) * $src_w);
  $dst_im = ImageCreateTrueColor($dst_w,$dst_h);
  /* ImageCopyResampled copie et r��chantillonne l'image originale*/
  ImageCopyResampled($dst_im,$src_im,0,0,0,0,$dst_w,$dst_h,$src_w,$src_h);
  /* ImageJpeg g�n�re l'image dans la sortie standard (c.�.d le navigateur).
  Le second param�tre est optionnel ; dans ce cas, l'image est g�n�r�e dans un fic
  hier*/
ImageJpeg($dst_im,"temp/redim.jpg");
ImageDestroy($dst_im);
imageDestroy($src_im);
?>
<script type="text/javascript">
window.top.document.getElementById('photo_redim').innerHTML='<img src="GestionBaseLecon/temp/redim.jpg?id='+Math.random()+'" width=200>';
</script>

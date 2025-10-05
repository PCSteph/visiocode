<?PHP
include('../config.php');
$req = mysql_query("select photo_question from question where nserie='1' and nquestion='1'") or die('Erreur SQL !'.mysql_error());
$data=mysql_fetch_array($req);
  $src_im = ImageCreateFromString($data[0]);
  //$size = GetImageSize("photo_test.php");
  $src_w = imagesx($src_im);
  $src_h = imagesy($src_im);
  //taille de votre image
  $dst_h = 50;
  // Contraint le rééchantillonage à une largeur fixe
  // Maintient le ratio de l'image
  $dst_w = round(($dst_h / $src_h) * $src_w);
  $dst_im = ImageCreateTrueColor($dst_w,$dst_h);
  /* ImageCopyResampled copie et rééchantillonne l'image originale*/
  ImageCopyResampled($dst_im,$src_im,0,0,0,0,$dst_w,$dst_h,$src_w,$src_h);
//   ImageJpeg génère l'image dans la sortie standard (c.à.d le navigateur).
//  Le second paramètre est optionnel ; dans ce cas, l'image est générée dans un fic
//  hier
//header("Content-type: image/gif");
// start buffering
ob_start();
// output jpeg (or any other chosen) format & quality
imagejpeg($dst_im, NULL, 85);
// capture output to string
$contents = ob_get_contents();
// end capture
ob_end_clean();
echo $contents;
ImageDestroy($dst_im);
imageDestroy($src_im);
//photo.php?nserie=1&nquestion=1&qr=photo_question
?>

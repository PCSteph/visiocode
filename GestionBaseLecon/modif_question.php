<?PHP
session_start();
include('../config.php');
$chaine="UPDATE `question` set `id_client`='".$_SESSION['id_login']."',`id_categorie`='".$_POST['categorie'];
$chaine.="',`question1`='".addslashes($_POST['question1'])."',`reponseA`='".addslashes($_POST['reponseA'])."',`reponseB`='".addslashes($_POST['reponseB'])."'";
if ($_FILES['photo_question']['size']!=0)
{
	$src_im = ImageCreateFromString(file_get_contents($_FILES['photo_question']['tmp_name']));
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
	// start buffering
	ob_start();
	// output jpeg (or any other chosen) format & quality
	imagegif($dst_im, NULL, 85);
	// capture output to string
	$contents = ob_get_contents();
	// end capture
	ob_end_clean();
	ImageDestroy($dst_im);
	imageDestroy($src_im);
	$chaine.=",`photo_question`='".addslashes(file_get_contents($_FILES['photo_question']['tmp_name']))."'";
	$chaine.=",`nom_question`='".addslashes($_FILES['photo_question']['name'])."'";
	$chaine.=",`photo_question_redim`='".addslashes($contents)."'";
}
if ($_FILES['lecture_audio']['size'])
{
   $chaine.=",`lecture_audio`='".addslashes(file_get_contents($_FILES['lecture_audio']['tmp_name']))."'";
}
if ($_FILES['photo_reponse']['size'])
{
   $chaine.=",`photo_reponse`='".addslashes(file_get_contents($_FILES['photo_reponse']['tmp_name']))."'";
   $chaine.=",`nom_reponse`='".addslashes($_FILES['photo_reponse']['name'])."'";
}
$chaine.=",`question2`='".addslashes($_POST['question2'])."',`reponseC`='".addslashes($_POST['reponseC'])."',`reponseD`='".addslashes($_POST['reponseD'])."'";
if (isset($_POST['reponseA_ok'])) $chaine.=",`reponseA_ok`='1'"; else $chaine.=",`reponseA_ok`='0'";
if (isset($_POST['reponseB_ok'])) $chaine.=",`reponseB_ok`='1'"; else $chaine.=",`reponseB_ok`='0'";
if (isset($_POST['reponseC_ok'])) $chaine.=",`reponseC_ok`='1'"; else $chaine.=",`reponseC_ok`='0'";
if (isset($_POST['reponseD_ok'])) $chaine.=",`reponseD_ok`='1'"; else $chaine.=",`reponseD_ok`='0'";
$chaine.=",`explication_standard`='".addslashes($_POST['explication_standard'])."',`explication_moniteur`='".addslashes($_POST['explication_moniteur'])."' where `nserie`='".$_POST['nserie']."' and `nquestion`='".$_POST['nquestion']."';";
$req = mysql_query($chaine) or die('Erreur SQL !'.mysql_error());
//echo $chaine;
//print_r($_POST);
//print_r($_FILES);
?>
<script type="text/javascript">
        window.top.window.modif_question(<?PHP echo $_POST['nserie'].",".$_POST['nquestion']; ?>);
</script>

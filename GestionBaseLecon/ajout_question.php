<?PHP
session_start();
include('../config.php');
$contents="";
if($_FILES['photo_question']['size']!=0) {
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
}
$chaine="INSERT INTO `question` (`id_client`,`nserie`,`nquestion`,`id_categorie`,`question1`,`reponseA`,`reponseB`";
if ($_FILES['photo_question']['size']!=0) $chaine.=",`photo_question`,`photo_question_redim`,`nom_question`";
if ($_FILES['photo_reponse']['size']!=0) $chaine.=",`photo_reponse`,`nom_reponse`";
if ($_FILES['lecture_audio']['size']!=0) $chaine.=",`lecture_audio`";
if (isset($_POST['question2'])) $chaine.=",`question2`";
if (isset($_POST['reponseC'])) $chaine.=",`reponseC`";
if (isset($_POST['reponseD'])) $chaine.=",`reponseD`";
if (isset($_POST['reponseA_ok'])) $chaine.=",`reponseA_ok`";
if (isset($_POST['reponseB_ok'])) $chaine.=",`reponseB_ok`";
if (isset($_POST['reponseC_ok'])) $chaine.=",`reponseC_ok`";
if (isset($_POST['reponseD_ok'])) $chaine.=",`reponseD_ok`";
if (isset($_POST['explication_standard'])) $chaine.=",`explication_standard`";
if (isset($_POST['explication_moniteur'])) $chaine.=",`explication_moniteur`";
$chaine.=") VALUES ('".$_SESSION['id_login']."','".$_POST['nserie']."','".$_POST['nquestion']."','".$_POST['categorie']."','".addslashes($_POST['question1']);
$chaine.="','".addslashes($_POST['reponseA'])."','".addslashes($_POST['reponseB']);
if ($_FILES['photo_question']['size']!=0) $chaine.="','".addslashes(file_get_contents($_FILES['photo_question']['tmp_name']))."','".addslashes($contents)."','".addslashes($_FILES['photo_question']['name']);
if ($_FILES['photo_reponse']['size']!=0) $chaine.="','".addslashes(file_get_contents($_FILES['photo_reponse']['tmp_name']))."','".addslashes($_FILES['photo_reponse']['name']);
if ($_FILES['lecture_audio']['size']!=0) $chaine.="','".addslashes(file_get_contents($_FILES['lecture_audio']['tmp_name']));
if (isset($_POST['question2'])) $chaine.="','".addslashes($_POST['question2']);
if (isset($_POST['reponseC'])) $chaine.="','".addslashes($_POST['reponseC']);
if (isset($_POST['reponseD'])) $chaine.="','".addslashes($_POST['reponseD']);
if (isset($_POST['reponseA_ok'])) $chaine.="','1";
if (isset($_POST['reponseB_ok'])) $chaine.="','1";
if (isset($_POST['reponseC_ok'])) $chaine.="','1";
if (isset($_POST['reponseD_ok'])) $chaine.="','1";
if (isset($_POST['explication_standard'])) $chaine.="','".addslashes($_POST['explication_standard']);
if (isset($_POST['explication_moniteur'])) $chaine.="','".addslashes($_POST['explication_moniteur']);
$chaine.="');";
echo $chaine;
$req = mysql_query($chaine) or die('Erreur SQL !'.mysql_error());
//print_r($_POST);
?>
<script type="text/javascript">
        window.top.window.modif_question(<?PHP echo $_POST['nserie'].",".$_POST['nquestion']; ?>);
</script>


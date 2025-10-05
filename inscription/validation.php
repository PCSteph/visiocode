<?PHP
include('../config.php');
$req = mysql_query("SELECT `valide` FROM `client` where id_login='".$_GET['ghtfdcgfgh']."';") or die('Erreur SQL !'.mysql_error());
$data=mysql_fetch_array($req);
if ($data[0]=='0') echo "<script language=\"javascript\">alert(\"Votre compte est déjà activé. Vous pouvez dès maintenant l'utiliser.\r\nPour cela veuillez vous rendre à l'accueil du site.\");</script>";
if ($data[0]==$_GET['derfgre'])
{
	$req = mysql_query("UPDATE `client` SET `valide`=0 where id_login='".$_GET['ghtfdcgfgh']."';") or die('Erreur SQL !'.mysql_error());
	echo "<script language=\"javascript\">alert(\"Votre compte est désormais activé.\r\nVous pouvez vous rendre à l'accueil du site et vous identifiez.\");</script>";
}
if (($data[0]!=$_GET['derfgre']) and ($data[0]!='0')) echo "<script language=\"javascript\">alert(\"Un problème s'est produit lors de l'activation de votre compte.\r\nVeuillez contacter l'administrateur du site par email à l'adresse suivante webmaster@visio-code.fr\");</script>";
?>
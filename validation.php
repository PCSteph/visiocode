<?PHP
include('config.php');
$req = mysql_query("SELECT `valide` FROM `client` where id_login='".$_GET['ghtfdcgfgh']."';") or die('Erreur SQL !'.mysql_error());
$data=mysql_fetch_array($req);
if ($data[0]=='0') echo "<script language=\"javascript\">alert(\"Votre compte est d�j� activ�. Vous pouvez d�s maintenant l\'utiliser.Pour cela veuillez vous identifier sur le site.\");</script>";
if ($data[0]==$_GET['derfgre'])
{
	$req = mysql_query("UPDATE `client` SET `valide`=0 where id_login='".$_GET['ghtfdcgfgh']."';") or die('Erreur SQL !'.mysql_error());
	echo "<script language=\"javascript\">alert(\"Votre compte est d�sormais activ�.Vous pouvez vous identifiez sur le site.\");</script>";
}
if (($data[0]!=$_GET['derfgre']) and ($data[0]!='0')) echo "<script language=\"javascript\">alert(\"Un probl�me s\'est produit lors de l\'activation de votre compte.Veuillez contacter l\'administrateur du site par email � l\'adresse suivante webmaster@visio-code.fr\");</script>";
?>

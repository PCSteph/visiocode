<?PHP
session_start();
include("config.php");
$chaine="UPDATE accueil set ";
$i=0;
$listVignette=array("messagerie","compte","forfait","classique","theme","visio","forum","statistique");
foreach($listVignette as $Vignette)
{
	if($i==0) $chaine.=$Vignette."='".array_search($Vignette,$_POST)."'"; else $chaine.=",".$Vignette."='".array_search($Vignette,$_POST)."'";
	$i++;
}
$chaine.=" where id_login='".$_SESSION['id_login']."';";
$req = mysql_query($chaine) or die('Erreur SQL !'.mysql_error());
?>
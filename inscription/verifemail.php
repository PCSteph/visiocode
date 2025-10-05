<?PHP
header('Content-Type: text/xml;charset=ISO-8859-1');
echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
echo "<corps>\n";
if ($_POST['email']!="")
{
  if(!ereg("^[[:alnum:]]([-_.]?[[:alnum:]])*@[[:alnum:]]([-.]?[[:alnum:]])*\.([a-z]{2,4})$",$_POST['email']))
  {
	   echo "<acc>0</acc>";
       echo "<donnee><![CDATA[Adresse non valide]]></donnee>\n";
  }
  else
  {
		include('../config.php');
		$req = mysql_query("SELECT `email` FROM `client` where email='".$_POST['email']."';") or die('Erreur SQL !'.mysql_error());
		$data=mysql_fetch_array($req);
		if (!$data['email']) 
		{
			echo "<acc>1</acc>";
			echo "<donnee><![CDATA[&nbsp;]]></donnee>\n";
		}
		else
		{
	   		echo "<acc>0</acc>";
       		echo "<donnee><![CDATA[Déjà utilisée]]></donnee>\n";
		}
  }
}
else
{
	   echo "<acc>0</acc>";
       echo "<donnee><![CDATA[Non renseigné]]></donnee>\n";
}
echo "</corps>\n";
?>

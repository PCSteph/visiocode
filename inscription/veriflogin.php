<?PHP
header('Content-Type: text/xml;charset=ISO-8859-1');
echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
echo "<corps>\n";
include('../config.php');
$req = mysql_query("SELECT `login` FROM `client` where login='".$_POST['login']."';") or die('Erreur SQL !'.mysql_error());
$data=mysql_fetch_array($req);
if ($_POST['login']!='')
{
	if (!$data)
        {
	   echo "<acc>1</acc>";
           echo "<donnee><![CDATA[&nbsp;]]></donnee>\n";
        }
        else
        {
	   echo "<acc>0</acc>";
	   echo "<donnee><![CDATA[déjà utilisé]]></donnee>\n";
        }
}
else
{
  echo "<acc>0</acc>";
  echo "<donnee><![CDATA[Non renseigné]]></donnee>\n";
}
echo "</corps>\n";
?>

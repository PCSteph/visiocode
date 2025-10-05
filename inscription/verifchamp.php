<?PHP
include('../config.php');
if ($_POST['cp'])
{
   $req = mysql_query("SELECT id_ville,nom FROM `ville` where cp='".$_POST['cp']."';") or die('Erreur SQL !'.mysql_error());
   //echo "SELECT id_ville,nom FROM `ville` where cp='".$_POST['cp']."';";
   header('Content-Type: text/xml;charset=ISO-8859-1');
   echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
   echo "<liste_ville>\n";
   while ($data = mysql_fetch_array($req))
   {
	echo "<id_ville>" . $data[0] . "</id_ville>\n";
	echo "<ville>" . $data[1] . "</ville>\n";
   }
   echo "</liste_ville>\n";
}
?>

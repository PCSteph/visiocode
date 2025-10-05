<?PHP
include('../config.php');
$req = mysql_query("SELECT id_ville,nom,cp FROM `ville` where nom like '".addslashes(str_replace("-","%",str_replace(" ","%",$_POST['ville'])))."%' order by nom asc limit 0,50;") or die('Erreur SQL !'.mysql_error());
header('Content-Type: text/xml;charset=ISO-8859-1');
echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
echo "<liste_ville>\n";
while ($data = mysql_fetch_array($req))
{
      echo "<id_ville>" . $data[0] . "</id_ville>\n";
      echo "<ville>" . $data[1] . "</ville>\n";
	  echo "<cp>" . $data[2] . "</cp>";
}
echo "</liste_ville>\n";
?>

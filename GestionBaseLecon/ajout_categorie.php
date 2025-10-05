<?PHP
include('../config.php');
mysql_query("INSERT INTO `categorie` (`nom`) VALUES ('".utf8_decode($_POST['new_categorie'])."');") or die('Erreur SQL !'.mysql_error());
$req=mysql_query("SELECT * FROM `categorie`;") or die('Erreur SQL !'.mysql_error());
header('Content-Type: text/xml;charset=ISO-8859-1');
echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
echo "<donnee>";
while ($data = mysql_fetch_array($req))
{
  echo "<id_categorie>" . $data['id_categorie'] . "</id_categorie>\n";
  echo "<nom>" . $data['nom'] . "</nom>\n";
}
echo "</donnee>\n";
?>


<?PHP
include('../config.php');
$req = mysql_query("SELECT id_departement,nom_departement FROM `departement` order by nom_departement asc;") or die('Erreur SQL !'.mysql_error());
while ($data = mysql_fetch_array($req))
{
      echo "<option value=\"" . $data[0] . "\">" . $data[1] . "</option>";
}
?>

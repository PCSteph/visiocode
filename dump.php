<?PHP
$host="sd-12936.dedibox.fr";
$base="site";
$logindb="root";
$passdb="superman26";
$db = mysql_connect($host,$logindb,$passdb);

mysql_select_db($base,$db);
$tablearray=array("accueil","categorie","client","departement","histo","langue","messagerie","region","ville");
foreach($tablearray as $table)
{
	$req = mysql_query("select * from ".$table) or die('Erreur SQL !'.mysql_error());
	while($data=mysql_fetch_array($req))
	{
		$chaine="INSERT INTO ".$table." VALUES (";
		$pair=0;
		foreach($data as $temp)
		{
			if (fmod($pair,2)==0) {$chaine.="\"".addslashes($temp)."\",";}
			$pair+=1;
		}
		$chaine=substr($chaine,0,strlen($chaine)-1).");<br>";
		echo $chaine;
	}
}
?>

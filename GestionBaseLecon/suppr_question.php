<?PHP
session_start();
include('../config.php');
$chaine="DELETE FROM `question` where `nserie`='".$_POST['nserie']."' and `nquestion`='".$_POST['nquestion']."';";
$req = mysql_query($chaine) or die('Erreur SQL !'.mysql_error());
$chaine="Select * from `question` where nquestion > '".$_POST['nquestion']."' and `nserie`='".$_POST['nserie']."';";
$req = mysql_query($chaine) or die('Erreur SQL !'.mysql_error());
while($data=mysql_fetch_array($req))
{
	mysql_query("update `question` set nquestion='".($data['nquestion'] - 1)."' where id_question='".$data['id_question']."';") or die('Erreur SQL !'.mysql_error());
}
?>


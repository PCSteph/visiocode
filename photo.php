<?PHP
include('config.php');
$req = mysql_query("select ".$_GET['qr']." from question where nserie='".$_GET['nserie']."' and nquestion='".$_GET['nquestion']."'") or die('Erreur SQL !'.mysql_error());
$data=mysql_fetch_array($req);
header("Content-type: image/gif");
echo $data[0];
?>

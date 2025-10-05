<?PHP
session_start();
header('Content-Type: text/xml;charset=ISO-8859-1');
echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
include('../../config.php');
$req = mysql_query("SELECT photo_reponse,nom_reponse,reponseA_ok,reponseB_ok,reponseC_ok,reponseD_ok FROM `question`,`categorie` where nserie='".$_SESSION['nserie']."' and nquestion='".$_SESSION['nquestion']."' and categorie.id_categorie=question.id_categorie;") or die('Erreur SQL !'.mysql_error());
$data=mysql_fetch_array($req);
echo "<donnee>";
if ($data['photo_reponse']) echo "<photo><![CDATA[<img src=\"photo.php?nserie=".$_SESSION['nserie']."&nquestion=".$_SESSION['nquestion']."&qr=photo_reponse\" width=\"800\" height=\"400\" alt=\"".$data['nom_reponse']."\">]]></photo>\n"; else echo "<photo>0</photo>";
if ($_POST['choixA']==$data['reponseA_ok'])
{
   if ($_POST['choixB']==$data['reponseB_ok'])
   {
   	if ($_POST['choixC']==$data['reponseC_ok'])
   	{
   		if ($_POST['choixD']==$data['reponseD_ok'])
   		{
   		    	echo "<acc>1</acc>";
				mysql_query("INSERT INTO histo (nserie,nquestion,date,resultat,id_login) VALUES ('".$_SESSION['nserie']."','".$_SESSION['nquestion']."','".mktime()."','1','".$_SESSION['id_login']."')") or die('Erreur SQL !'.mysql_error());
   		}
                else
                {
                       	echo "<acc>0</acc>";
						mysql_query("INSERT INTO histo (nserie,nquestion,date,resultat,id_login) VALUES ('".$_SESSION['nserie']."','".$_SESSION['nquestion']."','".mktime()."','0','".$_SESSION['id_login']."')") or die('Erreur SQL !'.mysql_error());
                }
        }
        else
        {
        	echo "<acc>0</acc>";
			mysql_query("INSERT INTO histo (nserie,nquestion,date,resultat,id_login) VALUES ('".$_SESSION['nserie']."','".$_SESSION['nquestion']."','".mktime()."','0','".$_SESSION['id_login']."')") or die('Erreur SQL !'.mysql_error());
        }
   }
   else
   {
   	echo "<acc>0</acc>";
	mysql_query("INSERT INTO histo (nserie,nquestion,date,resultat,id_login) VALUES ('".$_SESSION['nserie']."','".$_SESSION['nquestion']."','".mktime()."','0','".$_SESSION['id_login']."')") or die('Erreur SQL !'.mysql_error());
   }
}
else
{
   echo "<acc>0</acc>";
   mysql_query("INSERT INTO histo (nserie,nquestion,date,resultat,id_login) VALUES ('".$_SESSION['nserie']."','".$_SESSION['nquestion']."','".mktime()."','0','".$_SESSION['id_login']."')") or die('Erreur SQL !'.mysql_error());
}
echo "<reponseA_ok>".$data['reponseA_ok']."</reponseA_ok>";
echo "<reponseB_ok>".$data['reponseB_ok']."</reponseB_ok>";
echo "<reponseC_ok>".$data['reponseC_ok']."</reponseC_ok>";
echo "<reponseD_ok>".$data['reponseD_ok']."</reponseD_ok>";
echo "</donnee>";

?>


<?PHP
session_start();
include('../../config.php');
$req = mysql_query("SELECT nom_question,question1,reponseA,reponseB,explication_standard,question2,reponseC,reponseD,lecture_audio FROM `question`,`categorie` where nserie='".$_POST['nserie']."' and nquestion='".$_POST['nquestion']."' and categorie.id_categorie=question.id_categorie;") or die('Erreur SQL !'.mysql_error());
$req2 = mysql_query("SELECT max(nquestion) FROM `question` where nserie='".$_POST['nserie']."';") or die('Erreur SQL !'.mysql_error());
$_SESSION['nserie']=$_POST['nserie'];
$_SESSION['nquestion']=$_POST['nquestion'];
header('Content-Type: text/xml;charset=ISO-8859-1');
echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
echo "<corps>\n";
$data = mysql_fetch_array($req);
$data2 = mysql_fetch_array($req2);
echo "<photo><![CDATA[<img src=\"photo.php?nserie=".$_POST['nserie']."&nquestion=".$_POST['nquestion']."&qr=photo_question\" width=\"800\" height=\"400\" alt=\"".$data['nom_question']."\">]]></photo>\n";
echo "<question1><![CDATA[<h1><u>Question N°" . substr_replace("00",$_POST['nquestion'], -strlen($_POST['nquestion'])) . "</u><br><br>" . str_replace("\n","<br>",stripslashes($data['question1'])) . "</h1>]]></question1>\n";
echo "<reponseA><![CDATA[A - " . stripslashes($data['reponseA']) . "]]></reponseA>\n";
echo "<reponseB><![CDATA[B - " . stripslashes($data['reponseB']) . "]]></reponseB>\n";
echo "<num_question><![CDATA[" . substr_replace("00",$_POST['nquestion'], -strlen($_POST['nquestion'])) . "]]></num_question>\n";
echo "<explication_standard><![CDATA[<h3>" . str_replace("\n","<br>",stripslashes($data['explication_standard'])) . "</h3>]]></explication_standard>\n";
if ($data['question2']) echo "<question2><![CDATA[<h1>" . stripslashes($data['question2']) . "</h1>]]></question2>\n";
if ($data['reponseC']) echo "<reponseC><![CDATA[C - " . stripslashes($data['reponseC']) . "]]></reponseC>\n";
if ($data['reponseD']) echo "<reponseD><![CDATA[D - " . stripslashes($data['reponseD']) . "]]></reponseD>\n";
if ($data2[0]!=$_POST['nquestion']) echo "<question_suivante><![CDATA[<a href=\"#\" onclick=\"visualiser_question(".$_POST['nserie'].",".($_POST['nquestion']+1).");\"><img src=\"../../images/question_suivante.gif\" alt=\"question suivante\" border=0></a>]]></question_suivante>\n"; else echo "<question_suivante><![CDATA[<a href=\"#\" onclick=\"window.close();\"><img src=\"../../images/fin_de_serie.gif\" alt=\"Fin de la série\" border=0></a>]]></question_suivante>\n";
if ($data['lecture_audio'])
{
        echo "<lecture_audio><![CDATA[<object type=\"application/x-shockwave-flash\" classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab\" data=\"../../telecharger/dewplayer-mini.swf?mp3=audio.php&amp;autostart=1\" width=\"160\" height=\"20\"><param name=\"wmode\" value=\"transparent\" /><param name=\"movie\" value=\"../../telecharger/dewplayer-mini.swf?mp3=audio.php&amp;autostart=1\" /><embed src=\"../../telecharger/dewplayer-mini.swf?mp3=audio.php&amp;autostart=1\" quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\"160\" height=\"20\"></embed></object>]]></lecture_audio>\n";
}
echo "</corps>\n";
?>




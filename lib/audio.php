<?PHP
session_start();
	include('../config.php');
        $req = mysql_query("select lecture_audio from question where nserie='".$_SESSION['nserie']."' and nquestion='".$_SESSION['nquestion']."'") or die('Erreur SQL !'.mysql_error());
        //".$_GET['nserie']."
        //".$_GET['nquestion']."
        $data=mysql_fetch_array($req);
        $_SESSION['replay']=1;
        header("Content-type: audio/x-mp3");
        echo $data['lecture_audio'];
?>


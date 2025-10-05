<?php
session_start();
header('Content-Type: text/html; charset=ISO-8859-15');
if ($_SESSION['autorisation']>2)
{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Visio-CodeDeLaRoute.fr</title>
<link href="style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="ajax.js"></script>
<script langage="JavaScript">
window.moveTo(0,0);
if (document.getElementById || document.all)
  {
  window.resizeTo(screen.availWidth, screen.availHeight);
  }
else if (document.layers)
  {
  if (window.outerHeight<screen.availHeight || window.outerWidth<screen.availWidth)
    {
    window.outerHeight = screen.availHeight;
    window.outerWidth = screen.availWidth;
    }
  }
</script>
</head>
<?PHP
echo "<body onload=\"visualiser_question(".$_GET['nserie'].",".$_GET['nquestion'].");\">";
?>
<script language="javascript">
prechargimg('../images/ajax-loader.gif','../images/feux_rouge.gif','../images/feux_orange.gif','../images/feux_vert.gif');
<?PHP
include("../config.php");
$req=mysql_query("select nserie,nquestion from question where nserie='".$_GET['nserie']."' and nquestion>='".$_GET['nquestion']."'");
while($data=mysql_fetch_array($req))
{
	echo "prechargimg('photo.php?nserie=".$data['nserie']."&nquestion=".$data['nquestion']."&qr=photo_question');";
	echo "prechargimg('photo.php?nserie=".$data['nserie']."&nquestion=".$data['nquestion']."&qr=photo_reponse');";
}
?>
</script>
<div id="chargement"><br><br><br>Préparation de la leçon<br><br><img src="../../images/ajax-loader.gif"><br><br>Veuillez patienter</div>
<div id="corps">
    <div id="contenu">
      <div id="contenu_haut">
        <div id="photo"></div>
        <div id="marge_haut">
          <div id="chrono">
            <div id="chrono_compteur"></div>
          </div>
          <div id="feux"><div id="feux_rouge"></div><div id="feux_orange"></div><div id="feux_vert"></div></div>
          <div id="question_suivante"></div>
        </div>
      </div>
      <div id="contenu_bas">
        <div id="question_reponse"></div>
        <div id="lecture_audio"></div>
        <map name="map">
          <area shape="rect" coords="33,87,73,109" href="#" onClick="clear_reponse();">
          <area shape="rect" coords="41,117,66,135" href="#" onClick="chg_reponse('A');">
          <area shape="rect" coords="41,145,66,164" href="#" onClick="chg_reponse('B');">
          <area shape="rect" coords="41,173,66,192" href="#" onClick="chg_reponse('C');">
          <area shape="rect" coords="41,200,66,220" href="#" onClick="chg_reponse('D');">
          <area shape="rect" coords="34,228,74,250" href="#" onClick="valid_reponse();">
        </map>
        <div id="boitier">
          <div id="A"></div>
          <div id="B"></div>
          <div id="C"></div>
          <div id="D"></div>
          <div id="num_question"></div>
          <img src="../images/boitier.jpg" border=0 usemap="#map">
        </div>
        <div id="explication">
          <div id="explication_contenu"></div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<?PHP
}
?>

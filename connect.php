<?php
session_start();
header('Content-Type: text/xml;charset=ISO-8859-1');
echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
echo "<donnee>";
include('./config.php');
$req = mysql_query("SELECT * FROM `client` where login='".$_POST['login']."' and password='".$_POST['password']."';") or die('Erreur SQL !'.mysql_error());
$data=mysql_fetch_array($req);
if (!$data)
{
  echo "<acc>false</acc>";
  echo "<contenu_refus>Echec</contenu_refus>";
}
else
{
  $_SESSION['id_login']=$data['id_login'];
  $_SESSION['login']=$data['login'];
  $_SESSION['prenom']=$data['prenom'];
  $_SESSION['nom']=$data['nom'];
  $_SESSION['autorisation']=$data['autorisation'];
  echo "<acc>true</acc>";
}
echo "</donnee>";
?>  


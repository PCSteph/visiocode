<?PHP
session_start();
include('./config.php');
$req = mysql_query("SELECT id_login,login,prenom,nom,autorisation,valide,credit_classique,credit_visio FROM `client` where login='".$_POST['login_connect']."' and password='".$_POST['password_connect']."';") or die('Erreur SQL !'.mysql_error());
$data=mysql_fetch_array($req);
if (!$data)
{
  $acc="false";
  $raison="L\'identifiant ou le mot de passe est erroné.";
}
else
{
  if ($data['valide']=='0')
  {
  	$_SESSION['id_login']=$data['id_login'];
        $_SESSION['login']=$data['login'];
        $_SESSION['prenom']=$data['prenom'];
        $_SESSION['nom']=$data['nom'];
        $_SESSION['autorisation']=$data['autorisation'];
        $_SESSION['page_actuel']='principal.php';
		$_SESSION['credit_classique']=$data['credit_classique'];
		$_SESSION['credit_visio']=$data['credit_visio'];
		mysql_query("UPDATE client set derniere_connexion='".mktime()."' where id_login='".$data['id_login']."';") or die('Erreur SQL !'.mysql_error());
        $acc="true";
  }
  else
  {
        $acc="false";
        $raison="Votre compte n\'est pas activé. En cas de problème, vous pouvez contacter l\'administrateur du site par email à l\'adresse suivante : visiocode@free.fr";
  }
}
//print_r($_POST);
//print_r($_SESSION);
echo "<script langage=\"javascript\">";
if ($acc=="false") echo "alert(\"".$raison."\");";
echo "var myloc = window.location.href;";
echo "var locarray = myloc.split(\"/\");";
echo "window.location.href=locarray[0]+'//'+locarray[2];";
echo "</script>";
//header("Location: http://sd-12936.dedibox.fr/");
?>


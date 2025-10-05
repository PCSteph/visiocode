<?PHP
include('../config.php');
$ok=1;   
include "../phpmailer/class.phpmailer.php";
//Verification login
$req = mysql_query("SELECT `login` FROM `client` where login='".$_POST['login']."';") or die('Erreur SQL !'.mysql_error());
$data=mysql_fetch_array($req);
if ($_POST['login']!='')
{
	if ($data) $ok=0;
}
else $ok=0;

//verification mot de passe
if (($_POST['password']!=$_POST['pass_conf']) and ($_POST['password']=='') and ($_POST['pass_conf']=='')) $ok=0;

//Verification email
if ($_POST['email']!="")
{
	if(!ereg("^[[:alnum:]]([-_.]?[[:alnum:]])*@[[:alnum:]]([-.]?[[:alnum:]])*\.([a-z]{2,4})$",$_POST['email'])) $ok=0;
	else
	{
		$req = mysql_query("SELECT `email` FROM `client` where email='".$_POST['email']."';") or die('Erreur SQL !'.mysql_error());
		$data=mysql_fetch_array($req);
		if ($data) $ok=0;
	}
}
else $ok=0;

//Verification date de naissance  
if (($_POST['date_naissance']!="xx/xx/xxxx") and ($_POST['date_naissance']!=""))
{
	if(!preg_match('`^(((0[1-9])|(1\d)|(2\d)|(3[0-1]))\/((0[1-9])|(1[0-2]))\/(\d{4}))$`',$_POST['date_naissance'])) $ok=0;
}
else $ok=0;

//Verification de Nom  
if ($_POST['nom']=='') $ok=0;

//Verification de Prenom
if ($_POST['prenom']=='') $ok=0;

//Verification adresse1
if ($_POST['adresse1']=='') $ok=0;

//Verification langue
if ($_POST['id_langue']=='') $ok=0;

//Verification de la ville
if ($_POST['id_ville']=='') $ok=0;

//Si tout est ok on lance la requète
if ($ok==1)
{
	$auto_libre_non_inscrit=0;
	if ($_POST['auto']=='true') $auto_libre_non_inscrit=1;
	if ($_POST['libre']=='true') $auto_libre_non_inscrit=2;
	if ($_POST['non_inscrit']=='true') $auto_libre_non_inscrit=3;
	$cle_validation=rand();
	$date=explode("/",$_POST['date_naissance']);
	$req = mysql_query("INSERT INTO `client` (`login`,`password`,`email`,`nom`,`prenom`,`tel_fixe`,`tel_port`,`id_ville`,`adresse1`,`adresse2`,`date_naissance`,`valide`,`permisB`,`permisAAC`,`permisA`,`permisC`,`permisEC`,`permisD`,`permisEB`,`annul`,`code`,`nb_code`,`auto_libre_non_inscrit`,`newsletter`,`partenaire`,`date_inscription`,`id_langue`) VALUES ('".addslashes($_POST['login'])."','".addslashes($_POST['password'])."','".addslashes($_POST['email'])."','".addslashes($_POST['nom'])."','".addslashes($_POST['prenom'])."','".addslashes($_POST['tel_fixe'])."','".addslashes($_POST['tel_port'])."','".addslashes($_POST['id_ville'])."','".addslashes($_POST['adresse1'])."','".addslashes($_POST['adresse2'])."','".addslashes(mktime(0,0,0,intval($date[1]),intval($date[0]),intval($date[2])))."','".$cle_validation."',".$_POST['permisB'].",".$_POST['permisAAC'].",".$_POST['permisA'].",".$_POST['permisC'].",".$_POST['permisEC'].",".$_POST['permisD'].",".$_POST['permisEB'].",".$_POST['annul'].",".$_POST['code'].",'".addslashes($_POST['nb_code'])."','".$auto_libre_non_inscrit."',".$_POST['newsletter'].",".$_POST['partenaire'].",".mktime().",".$_POST['id_langue'].");") or die('Erreur SQL !'.mysql_error());
	$req = mysql_query("SELECT `id_login` FROM `client` where login='".$_POST['login']."';") or die('Erreur SQL !'.mysql_error());
	$data=mysql_fetch_array($req);
	$req = mysql_query("INSERT INTO `accueil` (id_login) VALUES ('".$data[0]."');") or die('Erreur SQL !'.mysql_error());
	$mail = new PHPmailer();
	$mail->IsSMTP();
        $mail->Host='localhost';
        $mail->From='Visio-CodeDeLaRoute.fr <stephane.reina@free.fr>';
        //$mail->AddReplyTo('webmaster@visio-code.fr');
	$mail->AddAddress($_POST['email']);
	$mail->Subject='Inscription Visio-CodeDeLaRoute.fr';
	$mail->Body="Merci de votre inscription sur Visio-CodeDeLaRoute.fr\n\r\n\r\n\rVotre identifiant : ".utf8_decode($_POST['login'])."\n\r\n\rVotre mot de passe : ".utf8_decode($_POST['password'])."\n\r\n\r\n\rVeuillez cliquer sur ce lien pour valider votre inscription :\n\r\n\rhttp://sd-12936.dedibox.fr/index.php?action=validation&ghtfdcgfgh=".$data[0]."&derfgre=".$cle_validation;
	if(!$mail->Send()){ //Teste le return code de la fonction
	  echo $mail->ErrorInfo; //Affiche le message d'erreur (ATTENTION:voir section 7)
	}
	else{	  
	  echo "<center><br><br><br>Un Email vous a été envoyé à votre adresse,<br>vous y trouverez un lien qui vous permetra de valider votre compte<br> et de vous identifier sur le site<br><br><br><br><br><br></center>";
	}
	$mail->SmtpClose();
	unset($mail);
	/*function MAIL_NVLP($fromname, $fromaddress, $toname, $toaddress, $subject, $message)
	{
   		// Copyright ? 2005 ECRIA LLC, http://www.ECRIA.com
   		// Please use or modify for any purpose but leave this notice unchanged.
   		//$headers  = "MIME-Version: 1.0\n";
   		//$headers .= "Content-type: text/plain; charset=iso-8859-1\n";
   		//$headers .= "X-Priority: 3\n";
   		//$headers .= "X-MSMail-Priority: Normal\n";
   		//$headers .= "X-Mailer: php\n";
   		$headers = "From: \"".$fromname."\" <".$fromaddress.">\n";
   		$headers .= "Reply-to: \"".$fromname."\" <".$fromaddress.">\n";
		$headers .= "Date: ".date("l j F Y, G:i")."\n";
		//$headers .= "Content-Transfer-Encoding: 7bit\n\n";
		return mail($toaddress, $subject, $message, $headers);
	}
$message="Merci de votre inscription sur Visio-CodeDeLaRoute.fr\n\r\n\r\n\rVotre identifiant : ".utf8_decode($_POST['login'])."\n\r\n\rVotre mot de passe : ".utf8_decode($_POST['password'])."\n\r\n\r\n\rVeuillez cliquer sur ce lien pour valider votre inscription :\n\r\n\rhttp://sd-12936.dedibox.fr/index.php?action=validation&ghtfdcgfgh=".$data[0]."&derfgre=".$cle_validation;
	
	
	//$message=implode("",file("mail_debut.php")).implode("",file("mail_fin.php"));	

	
	$mail=MAIL_NVLP("Visio-CodeDeLaRoute.fr","stephane.reina@free.fr",$_POST['email'],$_POST['email'],"Inscription Visio-CodeDeLaRoute.fr",$message);
	echo "<center><br><br><br>Un Email vous a été envoyé à votre adresse,<br>vous y trouverez un lien qui vous permetra de valider votre compte<br> et de vous identifier sur le site<br><br><br><br><br><br></center>";*/
}
else
{
	echo "0";
}
?>

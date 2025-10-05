<?PHP
include "../PHPMailer/class.phpmailer.php";
function mail_html($destinataire, $sujet , $messtxt, $messhtml , $from) { 
		$limite = "_parties_".md5 (uniqid (rand()));

		$entete = "Reply-to: $from\n";
		$entete .= "From:$from\n";
		$entete .= "Date: ".date("l j F Y, G:i")."\n";
		$entete .= "MIME-Version: 1.0\n";
		$entete .= "Content-Type: multipart/alternative;\n";
		$entete .= "\tboundary=\"----=$limite\"\n\n";

		//Le message en texte simple pour les navigateurs qui
		//n'acceptent pas le HTML
		$texte_simple = "This is a multi-part message in MIME format.\n";
		$texte_simple .= "Ceci est un message au format MIME.\n";
		$texte_simple .= "------=$limite\n";
		$texte_simple .= "Content-Type: text/plain; charset=\"iso-8859-1\"\n";
		$texte_simple .= "Content-Transfer-Encoding: 7bit\n\n";
		$texte_simple .= $messtxt;
		$texte_simple .= "\n\n"; 

		//le message en html original
		$texte_html = "------=$limite\n";
		$texte_html .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
		$texte_html .= "Content-Transfer-Encoding: 7bit\n\n";
		$texte_html .= $messhtml;
		$texte_html .= "\n\n\n------=$limite\n";
					
		return mail($destinataire, $sujet, $texte_simple.$texte_html, $entete);
	}
	$messageTXT="Merci de votre inscription sur vision-codedelaroute.fr".chr(13).chr(10)."Votre identifiant : Steph".chr(13).chr(10)."Votre mot de passe : Mot de passe".chr(13).chr(10).chr(13).chr(10)."Veuillez cliquer sur ce lien pour valider votre inscription :".chr(13).chr(10)."http://www.Visio-CodeDeLaRoute.fr/";
	
	
	$messageHTML=implode("",file("mail_debut.php"))."<br><br><br>Merci de votre inscription sur Visio-CodeDeLaRoute.fr<br><br \>Votre identifiant : Steph<br>Votre mot de passe : Mot de passe<br><br>Veuillez cliquer sur ce lien pour valider votre inscription :<br><br><a href=\"http://sd-12936.dedibox.fr/\">Activation de votre identifiant</a>".implode("",file("mail_fin.php"));	

	
	$mail=mail_html("assistance@pcsteph.com","Inscription Visio-CodeDeLaRoute.fr",$messageTXT,$messageHTML,"\"Visio-CodeDeLaRoute.fr\" <stephane.reina@free.fr>");
?>
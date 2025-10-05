<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="fr-FR" xml:lang="fr">
<head>
<!--
    Created by Artisteer v2.0.2.15338
    Base template (without user's data) checked by http://validator.w3.org : "This page is valid XHTML 1.0 Transitional"
    -->
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>Visio-CodeDeLaRoute.fr</title>
<script type="text/javascript" src="../script.js"></script>
<script type="text/javascript" src="../ajax.js"></script>
<link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../style_supp.css" type="text/css" media="screen" />
<!--[if IE 6]><link rel="stylesheet" href="../style.ie6.css" type="text/css" media="screen" /><![endif]-->
<link type="text/css" rel="stylesheet" href="../calendar.css" media="screen"></LINK>
<SCRIPT type="text/javascript" src="../calendar.js"></script>
</head>
<body onclick="document.getElementById('list_ville').style.visibility='hidden';">
<div class="PageBackgroundSimpleGradient"> </div>
<div class="PageBackgroundGlare">
  <div class="PageBackgroundGlareImage"></div>
</div>
<div class="Main">
  <div class="Sheet">
    <div class="Sheet-tl"></div>
    <div class="Sheet-tr">
      <div></div>
    </div>
    <div class="Sheet-bl">
      <div></div>
    </div>
    <div class="Sheet-br">
      <div></div>
    </div>
    <div class="Sheet-tc">
      <div></div>
    </div>
    <div class="Sheet-bc">
      <div></div>
    </div>
    <div class="Sheet-cl">
      <div></div>
    </div>
    <div class="Sheet-cr">
      <div></div>
    </div>
    <div class="Sheet-cc"></div>
    <div class="Sheet-body">
      <div class="Header">
        <div class="Header-png"></div>
        <div class="Header-jpeg"></div>
        <div class="logo">
          <h1 id="name-text" class="logo-name"><a href="#">Visio-Code de la route</a></h1>
          <div id="slogan-text" class="logo-text"></div>
        </div>
      </div>
      <div class="nav">
        <ul class="artmenu">
          <li><a href="http://sd-12936.dedibox.fr/" class="active"><span><span>Accueil</span></span></a></li>
          <li><a href="#"><span><span>Le Code de la Route</span></span></a></li>
          <li><a href="#"><span><span>Les Permis</span></span></a>
            <ul>
              <li><a href="#">Permis B</a></li>
              <li><a href="#">Permis A</a></li>
            </ul>
          </li>
          <li><a href="#"><span><span>Nous Contacter</span></span></a></li>
        </ul>
        <div class="l"> </div>
        <div class="r">
          <div> </div>
        </div>
      </div>
      <div class="contentLayout">
        <div width="100%" align="center">
          <div>
            <div class="Post">
              <div class="Post-tl"></div>
              <div class="Post-tr">
                <div></div>
              </div>
              <div class="Post-bl">
                <div></div>
              </div>
              <div class="Post-br">
                <div></div>
              </div>
              <div class="Post-tc">
                <div></div>
              </div>
              <div class="Post-bc">
                <div></div>
              </div>
              <div class="Post-cl">
                <div></div>
              </div>
              <div class="Post-cr">
                <div></div>
              </div>
              <div class="Post-cc"></div>
              <div class="Post-body">
                <div class="Post-inner">
                  <h2 class="PostHeaderIcon-wrapper"> <span class="PostHeader">Inscription</span> </h2>
                  <div class="PostContent"><div id="principal">
                    <FORM class="cssform" onsubmit="inscription();return false;">
                    <center>Les champs marqués d'une étoile sont obligatoires.</center>
                      <fieldset>
                        <label for="login">Identifiant* :</label>
                        <input type="text" id="login" onchange="veriflogin();">
                        <div id="content_retour"><div id="vlogin" class="vretour"></div></div>
                        <label for="password">Mot de passe* :</label>
                        <input type="password" id="password">
                        <div id="content_retour"><div id="vpassword" class="vretour"></div></div>
                        <label for="pass_conf">confirmation* :</label>
                        <input type="password" id="pass_conf" onchange="verifpassword();">
                      </fieldset><br />
                      <fieldset>
                        <legend>Informations personnelles</legend>
                        <label for="email">E-Mail* :</label>
                        <input type="text" id="email" onchange="verifemail();">
                        <div id="content_retour"><div id="vemail" class="vretour"></div></div>
                        <label for="nom">Nom* :</label>
                        <input type="text" id="nom" onchange="verifchampsvide('nom');">
                        <div id="content_retour"><div id="vnom" class="vretour"></div></div>
                        <label for="prenom">Prénom* :</label>
                        <input type="text" id="prenom" onchange="verifchampsvide('prenom');">
                        <div id="content_retour"><div id="vprenom" class="vretour"></div></div>
                        <label for="adresse1">Adresse* :</label><input type="text" id="adresse1" onchange="verifchampsvide('adresse1');">
                        <div id="content_retour"><div id="vadresse1" class="vretour"></div></div>
                        <input type="text" id="adresse2" />
                        <label for="ville_visio">Ville* :</label><input type="text" id="ville_visio" onkeyup="document.getElementById('id_ville').value='';if (this.value.length>2) {listVille(this.value);} else {document.getElementById('list_ville').style.visibility='hidden';}" /><input type="hidden" id="id_ville" />
                        <div id="content_retour"><div id="vville" class="vretour"></div>
                            <div id="list_ville">
                            </div>
                        </div>
                        <label for="tel_fixe">Téléphone Fixe :</label>
                        <input type="text" id="tel_fixe">
                        <label for="tel_port">Portable :</label>
                        <input type="text" id="tel_port">
                        <label for="date_naissance">Date de naissance* :</label>
                        <input type="text" id="date_naissance" onchange="verifdate('date_naissance');" onclick="displayCalendar(document.getElementById('date_naissance'),'dd/mm/yyyy',this)" readonly>
                        <div id="content_retour"><div id="vdate_naissance" class="vretour"></div></div>
                        <label for="langue">Langue* :</label>
                        <select id="langue" onchange="verifchampsvide('langue');">
                        	<option value="">Choisissez votre langue</option>
                        	<?PHP
							include "../config.php";
							$req = mysql_query("SELECT * FROM `langue`") or die('Erreur SQL !'.mysql_error());
							$data=mysql_fetch_array($req);
							echo "<option value=\"".$data['id_langue']."\">".$data['langue']."</option>";
							?>                        
                        </select>
                        <div id="content_retour"><div id="vlangue" class="vretour"></div></div>
                      </fieldset><br />
                      <fieldset class="checklabel">
                        <legend>Vous souhaitez obtenir le permis :</legend>
                            <ul>
                              	<li>
                                	<input type="checkbox" id="permisB"><label for="permisB">B</label>
                              	</li>
                          		<li>
                            		<input type="checkbox" id="permisAAC"><label for="permisAAC">AAC</label>
                          		</li>
                          		<li>
                            		<input type="checkbox" id="permisA"><label for="permisA">A</label>
                          		</li>
                        	</ul><br /><Br /><br />
                        	<ul>
                          		<li>
                            		<input type="checkbox" id="permisC"><label for="permisC">C</label>
                          		</li>
                          		<li>
                            		<input type="checkbox" id="permisEC"><label for="permisEC">EC</label>
                          		</li>
                          		<li>
                            		<input type="checkbox" id="permisD"><label for="permisD">D</label>
                          		</li>
                        	</ul><br /><br /><br />
                            <ul>
                          		<li>
                            		<input type="checkbox" id="permisEB"><label for="permisEB">EB</label>
                          		</li>
                        	</ul>
                      </fieldset><br />
                      <fieldset class="checklabel">
                        <legend>Etes-vous en annulation de permis?</legend>
                            	<ul>
                          			<li>
                            			<input type="radio" name="annul" value="oui" id="annul" />
                            			<label for="annul">Oui</label>
                          			</li>
                          			<li>
                            			<input type="radio" name="annul" value="non" id="annul_non" />
                            			<label for="annul_non">Non</label>
                          			</li>
                        		</ul>
                      </fieldset><br />
                      <fieldset class="checklabel">
                        <legend>Avez-vous déjà passé le code?</legend>
                            	<ul>
                          			<li>
                            			<input type="radio" name="code" value="oui" id="code" onchange="if (document.getElementById('code').checked) {document.getElementById('nb_code').disabled=false;} else {document.getElementById('nb_code').disabled=true;}" />
                            			<label for="code">Oui</label>
                          			</li>
                                    <li id="label_long">
                            			<label for="nb_code">Combien de fois : </label>
                            			<input type="text" id="nb_code" disabled="disabled" />
                                    </li>
                                </ul><br /><br /><br />
                                <ul>
                          			<li>
                            			<input type="radio" name="code" value="non" id="code_non" onchange="if (document.getElementById('code').checked) {document.getElementById('nb_code').disabled=false;} else {document.getElementById('nb_code').disabled=true;}" />
                            			<label for="code_non">Non</label>
                          			</li>
                        		</ul>
                      </fieldset><br />
                      <fieldset class="checklabel">
                        <legend>Etes-vous inscrit :</legend>
                            	<ul>
                          			<li id="label_long">
                            			<input type="radio" name="auto_libre" value="auto" id="auto" />
                            			<label for="code_oui">en Auto-école</label>
                          			</li>
                                </ul><br /><br /><br />
                                <ul>
                          			<li id="label_long">
                            			<input type="radio" name="auto_libre" value="libre" id="libre" />
                            			<label for="code_non">en Candidat libre</label>
                          			</li>
                                </ul><br /><br /><br />
                                <ul>
                          			<li id="label_long">
                            			<input type="radio" name="auto_libre" value="non_inscrit" id="non_inscrit" />
                            			<label for="code_non">Pas inscrit</label>
                          			</li>
                                </ul>
                      </fieldset><br />
                      <input type="checkbox" id="newsletter" checked="checked" /> J'accèpte de recevoir la newsletter personnalisée du site Visio-CodeDeLaRoute.fr<br />
                      <input type="checkbox" id="partenaire" checked="checked" /> J'autorise la société Visio-CodeDeLaRoute.fr à communiquer ces informations à ses partenaires.<br />
                      <div id="btn_valid">
                        <input type="submit" value="Valider" />
                      </div>
                    </FORM>
                  </div></div>
                  <div class="cleared"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="cleared"></div>
      <div class="Footer">
        <div class="Footer-inner"> <a href="#" class="rss-tag-icon" title="RSS"></a>
          <div class="Footer-text">
            <p><a href="#">Nous contacter</a> | <a href="#">Conditions d'utilisation</a><br />
              Copyright Visio-Code 2009 ---. All Rights Reserved.</p>
          </div>
        </div>
        <div class="Footer-background"></div>
      </div>
    </div>
  </div>
  <div class="cleared"></div>
  <!-- If you'd like to support Artisteer, having the "created with" link somewhere on your blog is the best way; it's our only promotion or advertising. -->
  <p class="page-footer"><a href="http://www.artisteer.com/">Web Template</a> created with Artisteer.</p>
</div>
<!--<input type="text" id="cp" size=5 onkeyup="if(this.value.length==5) "><SELECT id="ville" size=1></select>-->
</body>
</html>

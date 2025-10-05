<?PHP
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
include("config.php");
$req = mysql_query("SELECT * FROM `accueil` where id_login='".$_SESSION['id_login']."';") or die('Erreur SQL !'.mysql_error());
$data = mysql_fetch_array($req);
$data2=array();
for($i=1;$i<=8;$i++) {
	switch ($data[$i]) {
		case "block1":
			array_push($data2,"left:16px;top:16px;");
			break;
		case "block2":
			array_push($data2,"left:211px;top:16px;");
			break;
		case "block3":
			array_push($data2,"left:406px;top:16px;");
			break;
		case "block4":
			array_push($data2,"left:16px;top:211px;");
			break;
		case "block5":
			array_push($data2,"left:211px;top:211px;");
			break;
		case "block6":
			array_push($data2,"left:406px;top:211px;");
			break;
		case "block7":
			array_push($data2,"left:16px;top:406px;");
			break;
		case "block8":
			array_push($data2,"left:211px;top:406px;");
			break;
		case "block9":
			array_push($data2,"left:406px;top:406px;");
			break;
		case "block10":
			array_push($data2,"left:16px;top:601px;");
			break;
		case "block11":
			array_push($data2,"left:211px;top:601px;");
			break;
		case "block12":
			array_push($data2,"left:406px;top:601px;");
			break;
		case false:
			array_push($data2,"visibility:hidden;");
			break;
	}
}
?>
      <div class="Post">
      <div class="Post-tl"></div>
      <div class="Post-tr"><div></div></div>
      <div class="Post-bl"><div></div></div>
      <div class="Post-br"><div></div></div>
      <div class="Post-tc"><div></div></div>
      <div class="Post-bc"><div></div></div>
      <div class="Post-cl"><div></div></div>
      <div class="Post-cr"><div></div></div>
      <div class="Post-cc"></div>
      <div class="Post-body">
        <div class="Post-inner">
          <h2 class="PostHeaderIcon-wrapper">
            <span class="PostHeader">Accueil</span>
          </h2>
          <div class="PostContent">
          	<div id="content_accueil">
              			<div id="block1" class="block" style="left:15px;top:15px;"></div>
              			<div id="block2" class="block" style="left:210px;top:15px;"></div>
                        <div id="block3" class="block" style="left:405px;top:15px;"></div>
                        <div id="block4" class="block" style="left:15px;top:210px;"></div>
                        <div id="block5" class="block" style="left:210px;top:210px;"></div>
                        <div id="block6" class="block" style="left:405px;top:210px;"></div>
                        <div id="block7" class="block" style="left:15px;top:405px;"></div>
                        <div id="block8" class="block" style="left:210px;top:405px;"></div>
                        <div id="block9" class="block" style="left:405px;top:405px;"></div>
                        <div id="block10" class="block" style="left:15px;top:600px;"></div>
                        <div id="block11" class="block" style="left:210px;top:600px;"></div>
                        <div id="block12" class="block" style="left:405px;top:600px;"></div>
                        <div id="messagerie" style="<?PHP echo $data2[0]; ?>" class="vignette"><div class="poignee" onmousedown="beginDrag(document.getElementById('messagerie'),event);return false;" onmouseup="endDrag();">Messagerie</div><a onclick="chg_pageactuel('client/messagerie/index.php');"><img src="/images/cartas.png" border=0 height="80%" /></a></div>
                        <div id="compte" style="<?PHP echo $data2[1]; ?>" class="vignette"><div class="poignee" onmousedown="beginDrag(document.getElementById('compte'),event);return false;" onmouseup="endDrag();">Mon compte</div><a onclick="chg_pageactuel('client/compte/index.php');"><img src="/images/red.png" border=0 height="80%" style="margin-top:10px;"/></a></div>
                        <div id="forfait" style="<?PHP echo $data2[2]; ?>" class="vignette"><div class="poignee" onmousedown="beginDrag(document.getElementById('forfait'),event);return false;" onmouseup="endDrag();">Mon forfait</div><a onclick="chg_pageactuel('client/forfait/index.php');"><img src="/images/dinero7.png" border=0 height="80%" /></a></div>
                        <div id="classique" style="<?PHP echo $data2[3]; ?>" class="vignette"><div class="poignee" onmousedown="beginDrag(document.getElementById('classique'),event);return false;" onmouseup="endDrag();">Code classique</div><a onclick="chg_pageactuel('client/classique/index.php');"><img src="/images/pizarron.png" border=0 height="80%" /></a></div>
                        <div id="theme" style="<?PHP echo $data2[4]; ?>" class="vignette"><div class="poignee" onmousedown="beginDrag(document.getElementById('theme'),event);return false;" onmouseup="endDrag();">Code par thème</div><a onclick="chg_pageactuel('client/theme/index.php');"><img src="/images/pizarron.png" border=0 height="80%" /></a></div>
                        <div id="visio" style="<?PHP echo $data2[5]; ?>" class="vignette"><div class="poignee" onmousedown="beginDrag(document.getElementById('visio'),event);return false;" onmouseup="endDrag();">Visio-Code</div><a onclick="chg_pageactuel('client/visiocode/index.php');"><img src="/images/pizarron.png" border=0 height="80%" /></a></div>
                        <div id="forum" style="<?PHP echo $data2[6]; ?>" class="vignette"><div class="poignee" onmousedown="beginDrag(document.getElementById('forum'),event);return false;" onmouseup="endDrag();">Forum</div><a onclick="chg_pageactuel('client/forum/index.php');"><img src="/images/chat1.png" border=0 height="80%" /></a></div>
                        <div id="statistique" style="<?PHP echo $data2[7]; ?>" class="vignette"><div class="poignee" onmousedown="beginDrag(document.getElementById('statistique'),event);return false;" onmouseup="endDrag();">Statistiques</div><a onclick="chg_pageactuel('client/statistiques/index.php');"><img src="/images/figuras.png" border=0 height="80%" /></a></div>
          	</div>
                <div id="reinit"><a onclick="reinitialisation_accueil();">Réinitialisation de la page</a></div>  
          </div>
          <div class="cleared"></div>
        </div>
      </div>
  </div>

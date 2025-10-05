<?PHP
session_start();
header('Content-Type: text/html; charset=ISO-8859-15');
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
        <a onclick="window.open('client/visiocode/visio_vlc.php','','menubar=no, status=no, scrollbars=no, menubar=no');">
        <span class="PostHeader">Salle de Visio-code de la route</span>
        </a>
      </h2>
      <div class="PostContent">
      <br /><br />
      <?PHP
	  if ($_SESSION['credit_classique']>=mktime())
	  {
		  ?>
          <fieldset class="list_serie">
            <ul>
                <li>
                    <ul>
                        <?PHP
                        include("../../config.php");
                        $i=1;
                        $req=mysql_query("select nserie from question group by nserie limit 0,20;");
//						SELECT nserie,min(nquestion) from question where nserie not in (select nserie from histo where histo.id_login='".$_SESSION['id_login']."') group by nserie limit 0,20;");
                        while($data=mysql_fetch_array($req))
                        {
                            echo "<li onclick=\"\"><a onclick=\"window.open('client/visiocode/form_visu.php?nserie=".$data['nserie']."&nquestion=1','','menubar=no, status=no, scrollbars=no, menubar=no');\">";
			    echo "<img id=\"serie".$data['nserie']."\" src=\"../images/noir.jpg\" onLoad=\"preload(this,'lib/photo.php?nserie=".$data['nserie']."&nquestion=1&qr=photo_question_redim');\" /><div>Série N°".$data['nserie']." Q1</div>";
                            echo "</a></li>";
                            if ($i%4==0) echo "</ul></li><li><ul>";
                            $i++;
                        }
                        ?>
                    </ul>
                </li>
            </ul>
          </fieldset>
          <?PHP
	  }
	  else
	  {
		  ?>
          Votre forfait ne vous permet pas d'utiliser cette salle de code.
          <?PHP
	  }
	  ?>
      </div>
      <div class="cleared"></div>
    </div>
  </div>
</div>

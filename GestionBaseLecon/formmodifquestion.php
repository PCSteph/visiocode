<?php
header('Content-Type: text/html; charset=ISO-8859-15');
session_start();
$_SESSION['page_actuel']="GestionBaseLecon/formmodifquestion.php";
if (!isset($_POST['nserie']) and !isset($_POST['nquestion']))
{
  $_POST['nserie']=$_SESSION['nserie'];
  $_POST['nquestion']=$_SESSION['nquestion'];
}
else
{
  $_SESSION['nserie']=$_POST['nserie'];
  $_SESSION['nquestion']=$_POST['nquestion'];
}
include('../config.php');
$req = mysql_query("SELECT * FROM `question`,`categorie` where nserie='".$_POST['nserie']."' and nquestion='".$_POST['nquestion']."' and categorie.id_categorie=question.id_categorie;") or die('Erreur SQL !'.mysql_error());
$data=mysql_fetch_array($req);
$req2 = mysql_query("SELECT max(nquestion) FROM `question` where nserie='".$_POST['nserie']."';") or die('Erreur SQL !'.mysql_error());
$data2=mysql_fetch_array($req2);
?>
<script type="text/javascript">
function uploadInit()
{
    // Je pré-charge l'image
    var oLoading = new Image();
    oLoading.src = "loading.gif";
}

function uploadRun()
{
    document.getElementById("etat").innerHTML = "<img src=\"loading.gif\" alt=\"Upload is running...\" width=\"220\" height=\"19\" />";
    document.getElementById("btn_submit").disabled = true;
    return true;
}

function uploadEnd(sError, sPath)
{
    if(sError == 'OK')
    {
      document.getElementById("etat").innerHTML = "<a href=\"" + sPath + "\" title=\"Go to " + sPath + "\">Upload done !</a>";
    }
    else
    {
      document.getElementById("etat").innerHTML = sError;
    }
    document.getElementById("btn_submit").disabled = false;
}
</script>
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
          <div class="PostContent">
            <table width="100%"><tr><td width="33%" align="left">
            <?PHP
            if ($_POST['nquestion']!=1) echo "<a onclick=\"modif_question(".$_POST['nserie'].",".($_POST['nquestion']-1).");\"><img src=\"images/fleche_gauche.gif\" border=0 width=40 alt=\"question précédente\"></a>";
            echo "</td><td width=\"33%\" align=\"center\">";
            echo "<a onclick=\"modif_serie(".($_POST['nserie']).");\"><img src=\"images/maison.gif\" border=0 width=40 alt=\"Retour à la liste des questions\"></a>";
            echo "</td><td width=\"33%\" align=\"right\">";
            if ($_POST['nquestion']!=$data2[0]) echo "<a onclick=\"modif_question(".$_POST['nserie'].",".($_POST['nquestion']+1).");\"><img src=\"images/fleche_droite.gif\" border=0 width=40 alt=\"question suivante\"></a>";
            ?>
            </td></tr></table>
          </div>
          <div class="cleared"></div>
        </div>
      </div>
  </div>

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
            <span class="PostHeader">Modification de la question <?PHP echo $_POST['nquestion']; ?> de la série <?PHP echo $_POST['nserie']; ?></span>
          </h2>
          <div class="PostContent">
                              <form onsubmit="ajax_load('load_submit');" method="POST" enctype="multipart/form-data" target="hiddeniframe" action="GestionBaseLecon/modif_question.php">
                                    <table align="center" width="100%">
                                           <tr>
                                               <td align="center" colspan=3><b>Les éléments en gras sont obligatoires</b></td>
                                           </tr>
                                           <tr>
                                               <td align="left" colspan=3><hr></td>
                                           </tr>
                                           <tr>
                                               <td align="left" colspan=2>Série numéro :</td><td align="left" width=1><input type="text" name="nserie" value="<?PHP echo $_POST['nserie']; ?>" readonly></td>
                                           </tr>
                                           <tr>
                                               <td align="left" colspan=2>Question numéro :</td><td align="left" width=1><input type="text" name="nquestion" value="<?PHP echo $_POST['nquestion']; ?>" readonly></td>
                                           </tr>
                                           <tr>
                                               <td align="left" colspan=2><b>Thème :</b></td><td align="left"><select name="categorie" id="categorie"><option value=<?PHP echo $data['id_categorie'].">".$data['nom']; ?></option>
                                               <?PHP
                                                 include('../config.php');
                                                 $req_cat = mysql_query("SELECT * FROM `categorie` order by nom desc;") or die('Erreur SQL !'.mysql_error());
                                                 while($data_cat=mysql_fetch_array($req_cat))
                                                 {
                                                   echo "<option value=".$data_cat['id_categorie'].">".stripslashes($data_cat['nom'])."</option>";
                                                 }
                                               ?>
                                               </select><br><input type="text" id="new_categorie"><input type="button" value="Ajouter" onclick="if(new_categorie.value) ajout_categorie(new_categorie.value,this.form);"></td>
                                           </tr>
                                           <tr>
                                               <td align="left" colspan=3><hr></td>
                                           </tr>
                                           <tr>
                                               <td align="left" colspan=2><b>Enregistrement audio :</b></td><td align="left" width=1><input type="file" name="lecture_audio"><input type="hidden" name="MAX_FILE_SIZE" value="1000000"></td>
                                           </tr>
                                           <?PHP
                                           if ($data['lecture_audio'])
                                           {
                                             echo "<tr>";
                                               $_SESSION['nserie']=$_POST['nserie'];
                                               $_SESSION['nquestion']=$_POST['nquestion'];
                                               echo "<td align=\"center\" colspan=3><object type=\"application/x-shockwave-flash\" data=\"../telecharger/dewplayer-mini.swf?mp3=GestionBaseLecon/audio.php&amp;autostart=0\" width=\"160\" height=\"20\"><param name=\"wmode\" value=\"transparent\" /><param name=\"movie\" value=\"../telecharger/dewplayer-mini.swf?mp3=GestionBaseLecon/audio.php&amp;autostart=0\" /></object></td>";
                                             echo "</tr>";
                                           }
                                           ?>
                                           <tr>
                                               <td align="left" colspan=3><hr></td>
                                           </tr>
                                           <tr>
                                               <td align="left" colspan=2><b>Photo affichée lors de la question :</b></td><td align="left" width=1><input type="file" name="photo_question" onchange="document.getElementById('chargement_question').innerHTML='<img src=\'../images/ajax-loader_black.gif\'>';submit();"><input type="hidden" name="MAX_FILE_SIZE" value="1000000"></td>
                                           </tr>
                                           <tr>
                                                <td align="center" colspan=3>
                                                	<div id="chargement_question">
													   <?PHP
                                                       if ($data['photo_question'])
                                                       {
                                                            $req_nom_photo_question = mysql_query("SELECT nquestion,nserie from question where nom_question='".$data['nom_question']."'");
                                                            $chaine_nom_photo_question="Photo déjà utilisée<br>";
                                                            while($data_nom_photo_question=mysql_fetch_array($req_nom_photo_question))
                                                            {
                                                                if ($data_nom_photo_question['nserie']!=$_POST['nserie'] or $data_nom_photo_question['nquestion']!=$_POST['nquestion']) $chaine_nom_photo_question.="dans la série N°".$data_nom_photo_question['nserie']." question N°".$data_nom_photo_question['nquestion']."<br>";
                                                            }
                                                            if ($chaine_nom_photo_question!="Photo déjà utilisée<br>") echo $chaine_nom_photo_question;
                                                            echo "<img src=\"GestionBaseLecon/photo.php?nserie=".$_POST['nserie']."&nquestion=".$_POST['nquestion']."&qr=photo_question&rd=".rand()."\" width=300 name=\"".$data['nom_question']."\" alt=\"".$data['nom_question']."\">";
                                                       }
                                                       ?>
													</div>
                                                    <?PHP echo $data['nom_question']; ?>
                                                </td>
                                           </tr>
                                           <tr>
                                               <td align="left" colspan=2><b>Question 1 :</b></td><td align="left"><textarea name='question1' cols=30 rows=5><?PHP echo stripslashes($data['question1']); ?></textarea></td>
                                           </tr>
                                           <tr>
                                               <td align="left" colspan=2>Question 2 :</td><td align="left"><textarea name='question2' cols=30 rows=5><?PHP echo stripslashes($data['question2']); ?></textarea></td>
                                           </tr>
                                           <tr>
                                               <td align="center" colspan=3><b>Cochez les bonnes réponses</b></td>
                                           </tr>
                                           <tr>
                                               <td align="left"><b>Réponse A :</b></td><td><input type="checkbox" name="reponseA_ok"<?PHP if ($data['reponseA_ok']) echo " checked"; ?>></td><td align="left"><textarea name='reponseA' cols=30 rows=2><?PHP echo stripslashes($data['reponseA']); ?></textarea></td>
                                           </tr>
                                           <tr>
                                               <td align="left"><b>Réponse B :</b></td><td><input type="checkbox" name="reponseB_ok"<?PHP if ($data['reponseB_ok']) echo " checked"; ?>></td><td align="left"><textarea name='reponseB' cols=30 rows=2><?PHP echo stripslashes($data['reponseB']); ?></textarea></td>
                                           </tr>
                                           <tr>
                                               <td align="left">Réponse C :</td><td><input type="checkbox" name="reponseC_ok"<?PHP if ($data['reponseC_ok']) echo " checked"; ?>></td><td align="left"><textarea name='reponseC' cols=30 rows=2><?PHP echo stripslashes($data['reponseC']); ?></textarea></td>
                                           </tr>
                                           <tr>
                                               <td align="left">Réponse D :</td><td><input type="checkbox" name="reponseD_ok"<?PHP if ($data['reponseD_ok']) echo " checked"; ?>></td><td align="left"><textarea name='reponseD' cols=30 rows=2><?PHP echo stripslashes($data['reponseD']); ?></textarea></td>
                                           </tr>
                                           <tr>
                                               <td align="left" colspan=3><hr></td>
                                           </tr>
                                           <tr>
                                               <td align="left" colspan=2>Photo affichée lors de l'explication :</td><td align="left"><INPUT type="file" name="photo_reponse" onchange="document.getElementById('chargement_explication').innerHTML='<img src=\'../images/ajax-loader_black.gif\'>';submit();"></td>
                                           </tr>
                                           <tr>
                                                <td align="center" colspan=3>
                                                	<div id="chargement_explication">
													   <?PHP
                                                       if ($data['photo_reponse'])
                                                       {
                                                           echo "<img src=\"GestionBaseLecon/photo.php?nserie=".$_POST['nserie']."&nquestion=".$_POST['nquestion']."&qr=photo_reponse&rd=".rand()."\" width=300>";
                                                       }
                                                       ?>
													</div>
                                                    <?PHP echo $data['nom_reponse']; ?>
                                                </td>
                                           </tr>
                                           <tr>
                                               <td align="left" colspan=2>Explication standard :</td><td align="left"><textarea name='explication_standard' cols=30 rows=10><?PHP echo stripslashes($data['explication_standard']); ?></textarea></td>
                                           </tr>
                                           <tr>
                                               <td align="left" colspan=2>Explication du moniteur :</td><td align="left"><textarea name='explication_moniteur' cols=30 rows=20><?PHP echo stripslashes($data['explication_moniteur']); ?></textarea></td>
                                           </tr>
                                           <tr>
                                               <td align="left" colspan=3><hr></td>
                                           </tr>
                                           <tr>
                                               <td align="center" colspan="3"><div id="load_submit"><input type="submit" value="Valider" id="btn_submit"></div></td>
                                           </tr>
                                    </table>
                                </FORM>
                               <div class="center" id="etat"></div>
                               <iframe id="hiddeniframe" name="hiddeniframe" src="#"></iframe>
          </div>
          <div class="cleared"></div>
        </div>
      </div>
  </div>

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
          <div class="PostContent">
            <table width="100%"><tr><td width="33%" align="left">
            <?PHP
            if ($_POST['nquestion']!=1) echo "<a onclick=\"modif_question(".$_POST['nserie'].",".($_POST['nquestion']-1).");\"><img src=\"images/fleche_gauche.gif\" border=0 width=40 alt=\"question précédente\"></a>";
            echo "</td><td width=\"33%\" align=\"center\">";
            echo "<a onclick=\"modif_serie(".($_POST['nserie']).");\"><img src=\"images/maison.gif\" border=0 width=40 alt=\"Retour à la liste des questions\"></a>";
            echo "</td><td width=\"33%\" align=\"right\">";
            if ($_POST['nquestion']!=$data2[0]) echo "<a onclick=\"modif_question(".$_POST['nserie'].",".($_POST['nquestion']+1).");\"><img src=\"images/fleche_droite.gif\" border=0 width=40 alt=\"question suivante\"></a>";
            ?>
            </td></tr></table>
          </div>
          <div class="cleared"></div>
        </div>
      </div>
  </div>

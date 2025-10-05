<?php
header('Content-Type: text/html; charset=ISO-8859-15');
session_start();
//$_SESSION['page_actuel']="GestionBaseLecon/formsaisiequestion.php";
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
          <h2 class="PostHeaderIcon-wrapper">
            <span class="PostHeader">Saisie d'une nouvelle question dans la série <?PHP echo $_POST['nserie']; ?></span>
          </h2>
          <div class="PostContent">
                <form onsubmit="ajax_load('load_submit');" method="POST" enctype="multipart/form-data" target="hiddeniframe" action="GestionBaseLecon/ajout_question.php">
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
                               <td align="left" colspan=2><b>Thème :</b></td><td align="left"><select name="categorie" id="categorie"><option value=0>Sélectionner</option>
                               <?PHP
                                 include('../config.php');
                                 $req = mysql_query("SELECT * FROM `categorie`;") or die('Erreur SQL !'.mysql_error());
                                 while($data=mysql_fetch_array($req))
                                 {
                                   echo "<option value=".$data['id_categorie'].">".$data['nom']."</option>";
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
                           <tr>
                               <td align="left" colspan=3><hr></td>
                           </tr>
                           <tr>
                               <td align="left" colspan=2><b>Photo affichée lors de la question :</b></td><td align="left" width=1><input type="file" name="photo_question" onchange="document.getElementById('chargement_question').innerHTML='<img src=\'../images/ajax-loader_black.gif\'>';submit();"></td>
                           </tr>
                           <tr>
                           		<td align="center" colspan=3><div id="chargement_question"></div></td>
                           </tr>
                           <tr>
                               <td align="left" colspan=2><b>Question 1 :</b></td><td align="left"><textarea name='question1' cols=30 rows=5></textarea></td>
                           </tr>
                           <tr>
                               <td align="left" colspan=2>Question 2 :</td><td align="left"><textarea name='question2' cols=30 rows=5></textarea></td>
                           </tr>
                           <tr>
                               <td align="center" colspan=3><b>Cochez les bonnes réponses</b></td>
                           </tr>
                           <tr>
                               <td align="left"><b>Réponse A :</b></td><td><input type="checkbox" name="reponseA_ok"></td><td align="left"><textarea name='reponseA' cols=30 rows=2></textarea></td>
                           </tr>
                           <tr>
                               <td align="left"><b>Réponse B :</b></td><td><input type="checkbox" name="reponseB_ok"></td><td align="left"><textarea name='reponseB' cols=30 rows=2></textarea></td>
                           </tr>
                           <tr>
                               <td align="left">Réponse C :</td><td><input type="checkbox" name="reponseC_ok"></td><td align="left"><textarea name='reponseC' cols=30 rows=2></textarea></td>
                           </tr>
                           <tr>
                               <td align="left">Réponse D :</td><td><input type="checkbox" name="reponseD_ok"></td><td align="left"><textarea name='reponseD' cols=30 rows=2></textarea></td>
                           </tr>
                           <tr>
                               <td align="left" colspan=3><hr></td>
                           </tr>
                           <tr>
                               <td align="left" colspan=2>Photo affichée lors de l'explication :</td><td align="left"><INPUT type="file" name="photo_reponse" onchange="document.getElementById('chargement_explication').innerHTML='<img src=\'../images/ajax-loader_black.gif\'>';submit();"></td>
                           </tr>
                           <tr>
                           		<td align="center" colspan=3><div id="chargement_explication"></div></td>
                           </tr>
                           <tr>
                               <td align="left" colspan=2>Explication standard :</td><td align="left"><textarea name='explication_standard' cols=30 rows=10></textarea></td>
                           </tr>
                           <tr>
                               <td align="left" colspan=2>Explication du moniteur :</td><td align="left"><textarea name='explication_moniteur' cols=30 rows=20></textarea></td>
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

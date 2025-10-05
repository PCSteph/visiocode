<?PHP
session_start();
header('Content-Type: text/html; charset=ISO-8859-15');
$_SESSION['page_actuel']="GestionBaseLecon/formmodifserie.php";
if (!isset($_POST['nserie']))
{
  $_POST['nserie']=$_SESSION['nserie'];
}
else
{
  $_SESSION['nserie']=$_POST['nserie'];
}
  include('../config.php');
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
            <span class="PostHeader">Résumé</span>
          </h2>
          <div class="PostContent">
              <div align="center">
              <table border=1 cellSpacing="0" cellPadding="0" width="550">
                <?PHP
                $req = mysql_query("SELECT nom,count(question.id_categorie) FROM question,categorie where nserie='".$_POST['nserie']."' and categorie.id_categorie=question.id_categorie group by question.id_categorie;") or die('Erreur SQL !'.mysql_error());
                while($data = mysql_fetch_array($req))
                {
                  echo "<tr>";
                    echo "<td align=\"center\" width=\"45%\">".stripslashes($data['nom'])."</td>";
                    echo "<td align=\"center\" width=\"5%\">".stripslashes($data[1])."</td>";
					$data = mysql_fetch_array($req);
                    echo "<td align=\"center\" width=\"45%\">".stripslashes($data['nom'])."</td>";
                    echo "<td align=\"center\" width=\"5%\">".stripslashes($data[1])."</td>";
                  echo "</tr>";
                }
                ?>
              </table>
              </div>
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
            <span class="PostHeader"><b>Série numero : <?PHP echo $_POST['nserie']; ?></b></span>
          </h2>
          <div class="PostContent">
            <table width="100%"><tr><td width="33%" align="left">
            <?PHP
            echo "</td><td width=\"33%\" align=\"center\">";
            echo "<a onclick=\"chg_pageactuel('./GestionBaseLecon/baselecon.php');\"><img src=\"images/maison.gif\" border=0 width=40 alt=\"Retour à la liste des séries\"></a>";
            echo "</td><td width=\"33%\" align=\"right\">";
            ?>
            </td></tr></table>
              <br>
              <div align="center">
              <table border=1 cellSpacing="0" cellPadding="0" width="550">
                <tr>
                  <td align="center" width="10%"><b>N°</b></td>
                  <td align="center"><b>Thème</b></td>
                  <td align="center"><b>Question 1</b></td>
                  <td align="center"><b>Question 2</b></td>
                  <td align="center"><b>Photo question</b></td>
                  <td align="center"><b>Photo réponse</b></td>
                  <td align="center" colspan=3>&nbsp;</td>
                </tr>
                <?PHP
                $req = mysql_query("select nquestion,nom,question1,question2,nom_question,nom_reponse from question,categorie where nserie='".$_POST['nserie']."' and question.id_categorie=categorie.id_categorie order by nquestion;") or die('Erreur SQL !'.mysql_error());
                while($data = mysql_fetch_array($req))
                {
                  $nquestion_ajout=$data['nquestion'];
                  echo "<tr>";
                    echo "<td align=\"center\">".$data['nquestion']."</td>";
                    echo "<td align=\"center\">".stripslashes($data['nom'])."</td>";
                    echo "<td align=\"center\">".stripslashes($data['question1'])."</td>";
                    echo "<td align=\"center\">".stripslashes($data['question2'])."&nbsp;</td>";
                    echo "<td align=\"center\">".stripslashes($data['nom_question'])."&nbsp;</td>";
                    echo "<td align=\"center\">".stripslashes($data['nom_reponse'])."&nbsp;</td>";
                    echo "<td align=\"center\"><a onclick=\"modif_question(".($_POST['nserie']).",".$data['nquestion'].");\"><img src=\"images/modif.gif\" border=0 width=30 alt=\"Modifier\"></a></td>";
                    echo "<td align=\"center\"><a onclick=\"window.open('GestionBaseLecon/form_visu.php?nserie=".$_POST['nserie']."&nquestion=".$data['nquestion']."','','menubar=no, status=no, scrollbars=no, menubar=no');\"><img src=\"images/appercu.gif\" border=0 width=30 alt=\"Visualiser\"></a></td>";
                    echo "<td align=\"center\"><a onclick=\"suppr_question(".($_POST['nserie']).",".$data['nquestion'].");\"><img src=\"images/suppr.gif\" border=0 width=30 alt=\"Supprimer\"></a></td>";
                echo "</tr>";
                }
                ?>
              <tr><td colspan=10 align="center"><a onclick="creer_serie(<?PHP echo $_POST['nserie'].",".($nquestion_ajout+1); ?>);"><img src="images/ajout.gif" border=0 width=40 alt="Ajouter"></a></td></tr>
              </table>
              </div>
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
          <h1 class="PostHeaderIcon-wrapper">
            <span class="PostHeader">Résumé</span>
          </h1>
          <div class="PostContent">
              <div align="center">
              <table border=1 cellSpacing="0" cellPadding="0" width="550">
                <?PHP
                $req = mysql_query("SELECT nom,count(question.id_categorie) FROM question,categorie where nserie='".$_POST['nserie']."' and categorie.id_categorie=question.id_categorie group by question.id_categorie;") or die('Erreur SQL !'.mysql_error());
                while($data = mysql_fetch_array($req))
                {
                  echo "<tr>";
                    echo "<td align=\"center\" width=\"45%\">".stripslashes($data['nom'])."</td>";
                    echo "<td align=\"center\" width=\"5%\">".stripslashes($data[1])."</td>";
					$data = mysql_fetch_array($req);
                    echo "<td align=\"center\" width=\"45%\">".stripslashes($data['nom'])."</td>";
                    echo "<td align=\"center\" width=\"5%\">".stripslashes($data[1])."</td>";
                  echo "</tr>";
                }
                ?>
              </table>
              </div>
          </div>
          <div class="cleared"></div>
        </div>
      </div>
  </div>

<?php
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
            <span class="PostHeader">Gestion de la base de leçons de code</span>
          </h2>
          <div class="PostContent">
              <div align="center"><br><br>
              <table border=0 cellSpacing="0" cellPadding="0" width="300">
              	<tr>
              	  <td align="center">
                    N° Série
              	  </td>
              	  <td align="center">
                    Nb questions
              	  </td>
              	  <td>

              	  </td>
              	</tr>
                <?PHP
                  include('../config.php');
                  $req = mysql_query("SELECT nserie,count(*) FROM `question` GROUP BY nserie") or die('Erreur SQL !'.mysql_error());
                  while($data=mysql_fetch_array($req))
                  {
                  	echo "<tr>";
                  	  echo "<td align=\"center\">";
                  	    echo $data['nserie'];
                  	    $dernier_nserie= $data['nserie'];
                  	  echo "</td>";
                  	  echo "<td align=\"center\">";
                  	    echo $data['count(*)'];
                  	  echo "</td>";
#                 	  echo "<td align=\"center\">";
#                             $req_nquestion = mysql_query("SELECT max(nquestion) FROM `question` where nserie='".$data['nserie']."'") or die('Erreur SQL !'.mysql_error());
#                             $data_nquestion=mysql_fetch_array($req_nquestion);
#                             echo "<a onclick=\"creer_serie(".($data['nserie']).",".($data_nquestion[0]+1).");\"><img src=\"images/ajout.gif\" border=0 width=40 alt=\"Ajouter\"></a>";
#                 	  echo "</td>";
#                 	  echo "<td align=\"center\">";
#                 	    echo "<a onclick=\"suppr_serie(".($data['nserie']).");\"><img src=\"images/suppr.gif\" border=0 width=40 alt=\"Supprimer\"></a>";
#                 	  echo "</td>";
                	  echo "<td align=\"center\">";
                	    echo "<a onclick=\"modif_serie(".($data['nserie']).");\"><img src=\"images/modif.gif\" border=0 width=40 alt=\"Modifier\"></a>";
                	  echo "</td>";
#                                 	  echo "<td align=\"center\">";
#                                 	    echo "<a onclick=\"window.open('GestionBaseLecon/visualiser.php','','menubar=no, status=no, scrollbars=no, menubar=no');\"><img src=\"images/appercu.gif\" border=0 width=40 alt=\"Visualiser\"></a>";
#                                 	  echo "</td>";
                  	echo "</tr>";
                  }
              	echo "<tr>";
              	  echo "<td colspan=10 align=\"center\">";
              	    echo "<a onclick=\"creer_serie(".($dernier_nserie+1.0).",1);\"><img src=\"images/ajout.gif\" border=0 width=40 alt=\"Ajouter\"></a>";
              	  echo "</td>";
              	echo "</tr>";
                ?>
              </table>
              </div>
          </div>
          <div class="cleared"></div>
        </div>
      </div>
  </div>

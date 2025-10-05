<?php
header('Content-Type: text/html; charset=ISO-8859-15');
session_start();
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
            <span class="PostHeader">Redimensionner une photo</span>
          </h2>
          <div class="PostContent">
                       <br><br>
                       <div align="center">
                       <form method="POST" enctype="multipart/form-data" target="hiddeniframe" action="GestionBaseLecon/redim.php">
                       <b>Photo à redimensionner : </b><input type="file" name="photo" onchange="ajax_load('photo_redim');submit();"><input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                       </form>
                       <br><br><br><div id="photo_redim"></div>
                       <iframe id="hiddeniframe" name="hiddeniframe" src="#"></iframe>
                       </div>
                       <br><br><br>
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
            <span class="PostHeader">Outils pour enregistrement audio</span>
          </h2>
          <div class="PostContent">
                       <br><br>
                       <div align="center">
                          1 - Installer les deux logiciels ci-dessous.
                          <br><br>
                          <a href="../telecharger/audacity-win-1.2.6.exe">Audacity - logiciel d'enregistrement</a>
                          <br><br>
                          <a href="../telecharger/Lame_v3.98.2_for_Audacity_on_Windows.exe">Logiciel de convertion mp3</a>
                          <br><br>
                          2 - Lancer Audacity et faire un premier enregistrement.
                          <br><br>
                          3 - Cliquer sur Fichier puis exporter comme mp3 puis<br>indiquer à Audacity où se trouve le deuxième logiciel "Lame for Audacity".
                          <br><br>
                          Le système d'enregistrement est installé sur le pc.
                       </div>
                       <br><br><br>
          </div>
          <div class="cleared"></div>
        </div>
      </div>
  </div>

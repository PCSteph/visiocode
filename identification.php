<?PHP
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
if ($_SESSION['autorisation']>=1) {?>
<div class="Block">
  <div class="Block-tl"></div>
  <div class="Block-tr"><div></div></div>
  <div class="Block-bl"><div></div></div>
  <div class="Block-br"><div></div></div>
  <div class="Block-tc"><div></div></div>
  <div class="Block-bc"><div></div></div>
  <div class="Block-cl"><div></div></div>
  <div class="Block-cr"><div></div></div>
  <div class="Block-cc"></div>
  <div class="Block-body">
      <div class="BlockHeader">
          <div class="header-tag-icon">
              <div class="BlockHeader-text">
                  Identification
              </div>
          </div>
          <div class="l"></div>
          <div class="r"><div></div></div>
      </div>
      <div class="BlockContent">
          <div class="BlockContent-body" align="center">
            <?PHP echo $_SESSION['prenom']." ".$_SESSION['nom'];?><br><br />
            <a onclick="deconnection();">Se deconnecter</a>
          </div>
      </div>
  </div>
</div>
<?PHP 
}
?>

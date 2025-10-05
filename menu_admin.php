<?PHP
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
if ($_SESSION['autorisation']>=3) {?>
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
                    Administrateur
                </div>
            </div>
            <div class="l"></div>
            <div class="r"><div></div></div>
        </div>
        <div class="BlockContent">
            <div class="BlockContent-body">
                <div>
                    <ul><li>
                    <a onclick="chg_pageactuel('./GestionBaseLecon/baselecon.php');"><b>Base de leçons</b></a>
                    </li></ul><br />
                    <ul><li>
                    <a onclick="chg_pageactuel('./GestionBaseLecon/form_outils.php');"><b>Boîte à outils</b></a>
                    </li></ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?PHP } ?>

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
                    Menu
                </div>
            </div>
            <div class="l"></div>
            <div class="r"><div></div></div>
        </div>
        <div class="BlockContent">
            <div class="BlockContent-body">
            		<ul><li>
                    <a onclick="chg_pageactuel('principal.php');"><b>Accueil</b></a>
                    </li></ul><br />
                    <ul><li>
                    <a onclick="chg_pageactuel('client/messagerie/index.php');"><b>Messagerie (0)</b></a>
                    </li></ul><br />
                    <ul><li>
                    <a onclick="chg_pageactuel('client/forfait/index.php');"><b>Mon forfait</b></a>
                    </li></ul><br />
                    <ul><li>
                    <a onclick="chg_pageactuel('client/visiocode/index.php');"><b>Leçons de Visio-Code</b></a>
                    </li></ul><br />
                    <ul><li>
                    <a onclick="chg_pageactuel('client/theme/index.php');"><b>Leçons de code à thèmes</b></a>
                    </li></ul><br />
                    <ul><li>
                    <a onclick="chg_pageactuel('client/classique/index.php');"><b>Leçons de code classique</b></a>
                    </li></ul><br />
                    <ul><li>
                    <a onclick="chg_pageactuel('client/statistiques/index.php');"><b>Statistiques</b></a>
                    </li></ul><br />
                    <ul><li>
                    <a onclick="chg_pageactuel('client/compte/index.php');"><b>Gérer mon compte</b></a>
                    </li></ul><br />
                    <ul><li>
                    <a onclick="chg_pageactuel('client/forum/index.php');"><b>Forum</b></a>
                    </li></ul><br />
            </div>
        </div>
    </div>
</div>
<?PHP } ?>

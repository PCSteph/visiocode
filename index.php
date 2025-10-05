<?PHP
session_start();
header('Content-Type: text/html; charset=ISO-8859-1');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="fr-FR" xml:lang="fr">
<head>
    <!--
    Created by Artisteer v2.0.2.15338
    Base template (without user's data) checked by http://validator.w3.org : "This page is valid XHTML 1.0 Transitional"
    -->
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>Visio-CodeDeLaRoute.fr</title>

    <script type="text/javascript" src="script.js"></script>
    <script type="text/javascript" src="ajax.js"></script>
   	<script type="text/javascript" src="dragdrop.js"></script>

    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="style_supp.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
</head>
<?PHP echo "<body onmousemove=\"drag(event);\"";
if (isset($_SESSION['page_actuel'])) echo " onLoad=\"chargement('".$_SESSION['page_actuel']."');\"";
echo ">";
if (isset($_GET['action'])) include($_GET['action'].".php");
?>
<div id="suivi_curseur" style="left:0px;top:0px;"></div>
<div class="PageBackgroundSimpleGradient">
    </div>
    <div class="PageBackgroundGlare">
        <div class="PageBackgroundGlareImage"></div>
    </div>
    <div class="Main">
        <div class="Sheet">
            <div class="Sheet-tl"></div>
            <div class="Sheet-tr"><div></div></div>
            <div class="Sheet-bl"><div></div></div>
            <div class="Sheet-br"><div></div></div>
            <div class="Sheet-tc"><div></div></div>
            <div class="Sheet-bc"><div></div></div>
            <div class="Sheet-cl"><div></div></div>
            <div class="Sheet-cr"><div></div></div>
            <div class="Sheet-cc"></div>
            <div class="Sheet-body">
                <div class="Header">
                    <div class="Header-png"></div>
                    <div class="Header-jpeg"></div>
                    <div class="logo">
                        <h1 id="name-text" class="logo-name"><a href="#">Visio-Code de la route</a></h1>
                        <div id="slogan-text" class="logo-text"></div>
                    </div>
                </div>
                <div class="nav">
                    <ul class="artmenu">
                        <li><a class="active" onclick="chg_pageactuel('principal.php');"><span><span>Accueil</span></span></a></li>
                        <li><a href="#"><span><span>Le Code de la Route</span></span></a></li>
                        <li><a href="#"><span><span>Les Permis</span></span></a>
                                        <ul>
                                <li><a href="#">Permis B</a></li>
                                <li><a href="#">Permis A</a></li>
                            </ul>
                                    </li>
                        <li><a href="#"><span><span>Nous Contacter</span></span></a></li>
                    </ul>
                    <div class="l">
                    </div>
                    <div class="r">
                        <div>
                        </div>
                    </div>
                </div>
                <div class="contentLayout">
                    <div class="sidebar1">
                        <div id="identification">
                        <?PHP if (!(isset($_SESSION['autorisation']))) {?>
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
                                    <div class="BlockContent-body">
                                        <form action="connect_post.php" method="post">
                                        Identifiant : <input type="text" name="login_connect" id="login_connect" style="width: 95%;" />
                                        Mot de passe : <input type="password" name="password_connect" id="password_connect" style="width: 95%;" />
                                        <button class="Button" type="submit">
                                                <span class="btn">
                                                    <span class="t">Connecter</span>
                                                    <span class="r"><span></span></span>
                                                    <span class="l"></span>
                                                </span>
                                        </button>
                                        <div align="center"><a href="./inscription/">S'inscrire</a></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?PHP } ?>
                        </div>
                        <div id="menu_client">
                        </div>
                        <div id="menu_moniteur">
                        </div>
                        <div id="menu_admin">
                        </div>
                    </div>
                    <div class="content" id="principal">
                        <?PHP if (!(isset($_SESSION['autorisation']))) {?>
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
                                <span class="PostHeader">Welcome</span>
                            </h2>
                            <div class="PostContent">
                                <img class="article" src="images/spectacles.gif" alt="an image" style="float: left" />
                                <h1>Heading 1</h1>
                                <h2>Heading 2</h2>
                                <h3>Heading 3</h3>
                                <h4>Heading 4</h4>
                                <h5>Heading 5</h5>
                                <h6>Heading 6</h6>
                                <p>Lorem ipsum dolor sit amet,
                                <a href="#" title="link">link</a>, <a class="visited" href="#" title="visited link">visited link</a>,
                                 <a class="hover" href="#" title="hovered link">hovered link</a> consectetuer
                                adipiscing elit. Quisque sed felis. Aliquam sit amet felis. Mauris semper,
                                velit semper laoreet dictum, quam diam dictum urna, nec placerat elit nisl
                                in quam. Etiam augue pede, molestie eget, rhoncus at, convallis ut, eros.</p>
                                <p><a href="javascript:void(0)">Read more...</a></p>

                                <table class="table" width="100%">
                                	<tr>
                                		<td width="33%" valign="top">
                                		<div class="Block">
                                			<div class="Block-body">
                                				<div class="BlockHeader">
                                					<!--div class="header-tag-icon"-->
                                					<div class="BlockHeader-text">
                                						<center>Support</center></div>
                                					<!--/div-->
                                					<div class="l">
                                					</div>
                                					<div class="r">
                                						<div>
                                						</div>
                                					</div>
                                				</div>
                                				<div class="BlockContent">
                                					<div class="PostContent">
                                						<img src="images/01.png" width="55px" height="55px" alt="an image" style="margin: 0 auto; display: block; border: 0" />
                                						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                						Quisque sed felis. Aliquam sit amet felis. Mauris semper,
                                						velit semper laoreet dictum, quam diam dictum urna. </p>
                                					</div>
                                				</div>
                                			</div>
                                		</div>
                                		</td>
                                		<td width="33%" valign="top">
                                		<div class="Block">
                                			<div class="Block-body">
                                				<div class="BlockHeader">
                                					<!--div class="header-tag-icon"-->
                                					<div class="BlockHeader-text">
                                						<center>Development</center></div>
                                					<!--/div-->
                                					<div class="l">
                                					</div>
                                					<div class="r">
                                						<div>
                                						</div>
                                					</div>
                                				</div>
                                				<div class="BlockContent">
                                					<div class="PostContent">
                                						<img src="images/02.png" width="55px" height="55px" alt="an image" style="margin: 0 auto; display: block; border: 0" />
                                						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                						Quisque sed felis. Aliquam sit amet felis. Mauris semper,
                                						velit semper laoreet dictum, quam diam dictum urna. </p>
                                					</div>
                                				</div>
                                			</div>
                                		</div>
                                		</td>
                                		<td width="33%" valign="top">
                                		<div class="Block">
                                			<div class="Block-body">
                                				<div class="BlockHeader">
                                					<!--div class="header-tag-icon"-->
                                					<div class="BlockHeader-text">
                                						<center>Strategy</center></div>
                                					<!--/div-->
                                					<div class="l">
                                					</div>
                                					<div class="r">
                                						<div>
                                						</div>
                                					</div>
                                				</div>
                                				<div class="BlockContent">
                                					<div class="PostContent">
                                						<img src="images/03.png" width="55px" height="55px" alt="an image" style="margin: 0 auto; display: block; border: 0" />
                                						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                						Quisque sed felis. Aliquam sit amet felis. Mauris semper,
                                						velit semper laoreet dictum, quam diam dictum urna. </p>
                                					</div>
                                				</div>
                                			</div>
                                		</div>
                                		</td>
                                	</tr>
                                </table>

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
                                <span class="PostHeader">Who uses our products?</span>
                            </h2>
                            <div class="PostContent">



                                  <p>Lorem <sup>superscript</sup> dolor <sub>subscript</sub> amet, consectetuer adipiscing elit, <a href="#" title="test link">test link</a>.
                                	Nullam dignissim convallis est. Quisque aliquam. <cite>cite</cite>.
                                	Nunc iaculis suscipit dui. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl.
                                	Praesent mattis, massa quis luctus fermentum, turpis mi volutpat justo, eu volutpat enim diam eget metus.
                                	Maecenas ornare tortor. Donec sed tellus eget sapien fringilla nonummy. <acronym title="National Basketball Association">NBA</acronym> Mauris a ante.
                                	Suspendisse quam sem, consequat at, commodo vitae, feugiat in, nunc.
                                	Morbi imperdiet augue quis tellus.  <abbr title="Avenue">AVE</abbr></p>

                                    <blockquote>
                                        <p>
                                            &#8220;This stylesheet is going to help so freaking much.&#8221;
                                            <br />
                                            -Blockquote
                                        </p>
                                    </blockquote>
                                  <br />
                                  <table class="article" border="0" cellspacing="0" cellpadding="0">
                                  <tbody>
                                    <tr>
                                      <th>Header</th>
                                      <th>Header</th>
                                      <th>Header</th>
                                    </tr>
                                    <tr>
                                      <td>Data</td>
                                      <td>Data</td>
                                      <td>Data</td>
                                    </tr>
                                    <tr class="even">
                                      <td>Data</td>
                                      <td>Data</td>
                                      <td>Data</td>
                                    </tr>
                                    <tr>
                                      <td>Data</td>
                                      <td>Data</td>
                                      <td>Data</td>
                                    </tr>
                                  </tbody></table>

                                  <p>
                                        <a class="Button" href="javascript:void(0)">
                                          <span class="btn">
                                            <span class="t">Join&nbsp;Now!</span>
                                            <span class="r"><span></span></span>
                                            <span class="l"></span>
                                          </span>
                                        </a>
                                  </p>

                            </div>
                            <div class="cleared"></div>
                        </div>

                            </div>
                        </div>
                        <?PHP } ?>
                    </div>
                </div>
                <div class="cleared"></div><div class="Footer">
                    <div class="Footer-inner">
                        <div class="Footer-text">
                            <p><a href="#">Contact Us</a> | <a href="#">Terms of Use</a> | <a href="#">Trademarks</a>
                                | <a href="#">Privacy Statement</a><br />
                                Copyright &copy; 2009 ---. All Rights Reserved.</p>
                        </div>
                    </div>
                    <div class="Footer-background"></div>
                </div>
            </div>
        </div>
        <div class="cleared"></div>
        <!-- If you'd like to support Artisteer, having the "created with" link somewhere on your blog is the best way; it's our only promotion or advertising. -->
        <p class="page-footer"><a href="http://www.artisteer.com/">Web Template</a> created with Artisteer.</p>
    </div>
    
</body>
</html>

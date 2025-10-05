<?PHP
header('Content-Type: text/xml;charset=ISO-8859-1');
echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
echo "<corps>\n";
if ($_POST['contenu']!='')
{
    echo "<acc>1</acc>";
    echo "<donnee><![CDATA[&nbsp;]]></donnee>\n";
}
else
{
    echo "<acc>0</acc>";
    echo "<donnee><![CDATA[Non renseigné]]></donnee>\n";
}
echo "</corps>\n";
?>

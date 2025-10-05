<?PHP
header('Content-Type: text/xml;charset=ISO-8859-1');
echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
echo "<corps>\n";
if (($_POST['date_naissance']!="xx/xx/xxxx") and ($_POST['date_naissance']!=""))
{
  if(!preg_match('`^(((0[1-9])|(1\d)|(2\d)|(3[0-1]))\/((0[1-9])|(1[0-2]))\/(\d{4}))$`',$_POST['date_naissance']))
  {
      echo "<acc>0</acc>";
      echo "<donnee><![CDATA[Non reconnu(JJ/MM/AAAA)]]></donnee>\n";
  }
  else
  {
      echo "<acc>1</acc>";
      echo "<donnee><![CDATA[&nbsp;]]></donnee>\n";
  }
}
else
{
    echo "<acc>0</acc>";
    echo "<donnee><![CDATA[Non renseigné]]></donnee>\n";
}
echo "</corps>\n";
?>

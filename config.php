<?PHP
$host="192.168.1.134";
$base="visiocode";
$logindb="remote";
$passdb="Superman26$";
$db = mysql_connect($host,$logindb,$passdb);
mysql_select_db($base,$db);
?>

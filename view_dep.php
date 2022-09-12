<? include ("blocks/bd.php");
if (isset($_GET['dep'])) {$dep = $_GET['dep']; }
if (!isset($dep)) {$dep = 1;}

if (!preg_match("|^[\d]+$|", $dep)) {
exit ("<p>Неверный формат запроса! Проверьте URL!");
}

$result = mysql_query("SELECT * FROM departments WHERE id='$dep'",$db);

if (!$result) {
echo "<p>Извлечь данные из базы не удалось.<br></p>";
exit(mysql_error());
}

if (mysql_num_rows($result) > 0) {
	$myrow = mysql_fetch_array($result);}
	else {
		echo "<p>Извлечь данные из базы не удалось, в таблице нет записей.</p>";
		exit();
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title><? echo "Новости - $myrow[name]"; ?></title>
<link href="style.css" rel="stylesheet" type="text/css">


<style type="text/css">
body,td,th {
	font-family:Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #424242;
}
</style>
</head>

<body>
<table width="690" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="main_border">
  <?php include ("blocks/header.php"); ?>
  <tr>
    <td valign="top"><?php include ("blocks/adds.php"); ?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
          <?php include ("blocks/lefttd.php"); ?>
        <td valign="top"><?  
    
		$result2 = mysql_query("SELECT news.title,news.date,news.text,departments.name FROM news, departments WHERE dep='$dep' AND news.dep = departments.id ORDER BY date DESC, news.id DESC",$db);
		$myrow2 = mysql_fetch_array($result2);
if (mysql_num_rows($result2) > 0)

{		echo $myrow["text"];
			do {	
printf ("<table align='center' class='news'>
  <tr>
    <td class='news_title'><p class='news_name'>%s</p>
	<p class='news_date'>Новость добавлена: %s</p>
	<p class='news_date'>Размещено для: %s</p></td>
  </tr>
  <tr>
    <td>%s</td>
  </tr>
</table><br><br>",$myrow2["title"],$myrow2["date"],$myrow2["name"],$myrow2["text"]);} 
while ($myrow2 = mysql_fetch_array($result2)); }

else
{
echo "<p>Для этого отдела новостей пока нет</p>";
exit();
}

      ?>       
        </td>
      </tr>
    </table></td>
  </tr>
    <?php include ("blocks/footer.php"); ?>
</table>
</body>

</html>
<? include ("blocks/bd.php");
mysql_query('set character_set_client="utf8"');
mysql_query('set character_set_results="utf8"'); 
if (isset($_POST['submit_s'])) {$submit_s = $_POST['submit_s'];}
if (isset($_POST['search'])) {$search = $_POST['search'];}
if (isset($submit_s)) {if (empty($search) or strlen($search) < 4)
{
exit ("<p>Поисковый запрос не введен, либо он менее 4-х символов.</p>");
}

$search = trim($search);
$search = stripslashes($search);
$search = htmlspecialchars($search);

}

else 
{
exit("<p>Вы обратились к файлу без необходимых параметров.</p>");
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><? echo "Результаты запроса: $search"; ?></title>
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
  <? include ("blocks/header.php"); ?>
  <tr>
    <td valign="top"><?php include ("blocks/adds.php"); ?><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
       <? include ("blocks/lefttd.php"); ?>
        <td valign="top">
         
<? 
        $result = mysql_query("SELECT * FROM news WHERE MATCH(text) AGAINST('$search')",$db);

if (!$result)
{
echo "<p>Запрос на выборку данных из базы не прошел. </p>";
exit(mysql_error());
}

if (mysql_num_rows($result) > 0)

{
$myrow = mysql_fetch_array($result); 

do 
{


echo "<h3 align='center'>Результаты поиска:</h3>";
printf ("<table align='center' class='news'>
  <tr>
    <td class='news_title'><p class='news_name'>%s</p>
	<p class='news_date'>Новость добавлена: %s</p></td>
  </tr>
  <tr>
    <td>%s</td>
  </tr>
</table><br><br>",$myrow["title"],$myrow["date"],$myrow["text"]);} 



while ($myrow = mysql_fetch_array($result));



}

else
{
echo "<p>Информация по Вашему запросу на сайте не найдена.</p>";
exit();
}

?>
        
        </td>
      </tr>
    </table></td>
  </tr>
  <? include ("blocks/footer.php"); ?>
</table>
</body>
</html>
<?php 
include ("lock.php");
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Страница удаления отделов</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="690" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="main_border">

<? include("blocks/header.php");   ?> 
  <tr>
    <td><table width="690" border="0" cellspacing="0" cellpadding="0">
      <tr>

<? include ("blocks/lefttd.php");  ?>      
        <td valign="top">
 
          <h3 align="center">Выберите отдел для удаления</h3>
          <form action="drop_dep.php" method="post">
<? 
mysql_query('set character_set_client="utf8"');
mysql_query('set character_set_results="utf8"');
$result = mysql_query("SELECT id,name,text FROM departments WHERE NOT id='1'");      
$myrow = mysql_fetch_array($result);

do 
{
printf ("<p><input name='id' type='radio' value='%s'><label>%s</label></p>",$myrow["id"],$myrow["name"]);
}

while ($myrow = mysql_fetch_array($result));
?>

<p> <input name="submit" type="submit" value="Удалить"></p>

</form>
       
       
       </td>
      </tr>
    </table></td>
  </tr>

<?  include ("blocks/footer.php");        ?>  
</table>
</body>
</html>

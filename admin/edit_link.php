<?php 
include ("lock.php");

if (isset($_GET['id'])) {$id = $_GET['id'];}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Страница редактирования ссылок</title>
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
<h3 align="center">Выберите сайт для редактирования</h3>
<? 
if (!isset($id))

{
	mysql_query('set character_set_client="utf8"');
mysql_query('set character_set_results="utf8"');
$result = mysql_query("SELECT title,id FROM links");      
$myrow = mysql_fetch_array($result);

do 
{
printf ("<p><a href='edit_link.php?id=%s'>%s</a></p>",$myrow["id"],$myrow["title"]);
}

while ($myrow = mysql_fetch_array($result));

}

else

{
mysql_query('set character_set_client="utf8"');
mysql_query('set character_set_results="utf8"');
$result = mysql_query("SELECT * FROM links WHERE id=$id");      
$myrow = mysql_fetch_array($result);

print <<<HERE

<form name='form1' method='post' action='update_link.php'>
         <p>
           <label>Измените название сайта<br>
             <input value="$myrow[title]" type="text" name="title" id="title">
             </label>
         </p>
         <p>
           <label>Измените ссылку най сайт<br>
           <input value="$myrow[link]" type="text" name="link" id="link">
           </label>
         </p>
        
		 <input name="id" type="hidden" value="$myrow[id]">
		 
         <p>
           <label>
           <input type="submit" name="submit" id="submit" value="Сохранить изменения">
           </label>
         </p>
       </form>



HERE;
}


?>
       
       
       </td>
      </tr>
    </table></td>
  </tr>

<?  include ("blocks/footer.php");        ?>  
</table>
</body>
</html>

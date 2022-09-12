<?php 
include ("lock.php");

if (isset($_GET['id'])) {$id = $_GET['id'];}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Страница редактирования новостей</title>
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
<h3 align="center">Выберите новость и отредактируйте ее</h3>
<? 
if (!isset($id))

{
	mysql_query('set character_set_client="utf8"');
mysql_query('set character_set_results="utf8"');
$result = mysql_query("SELECT * FROM news ORDER BY date DESC, id DESC");      
$myrow = mysql_fetch_array($result);

do 
{
printf ("<p><a href='edit_new.php?id=%s'>%s от %s</a></p>",$myrow["id"],$myrow["title"],$myrow["date"]);
}

while ($myrow = mysql_fetch_array($result));

}

else

{
mysql_query('set character_set_client="utf8"');
mysql_query('set character_set_results="utf8"');
$result = mysql_query("SELECT * FROM news WHERE id=$id");      
$myrow = mysql_fetch_array($result);

$result2 = mysql_query("SELECT id,name FROM departments");      
$myrow2 = mysql_fetch_array($result2);

echo "<form name='form1' method='post' action='update_new.php'>
        		  <p>Измените отделы, для которых публикуется новость<br>
            <select name='dep'>";
do 
{

if ($myrow['dep'] == $myrow2['id'])
{
printf ("<option value='%s' selected>%s</option>",$myrow2["id"],$myrow2["name"]);
}

else
{
printf ("<option value='%s'>%s</option>",$myrow2["id"],$myrow2["name"]);
}

}
while ($myrow2 = mysql_fetch_array($result2));
 
echo "</select></p>";			           
print <<<HERE
<p>
           <label>Измените заголовок новости<br>
             <input value="$myrow[title]" type="text" name="title" id="title">
             </label>
         </p>
         <p>
           <label>Измените дату добавления новости, соблюдая формат<br>
           <input value="$myrow[date]" type="text" name="date" id="date">
           </label>
         </p>
		  <p>
           <label>Измените текст новости<br>
           <textarea name="text" id="text" cols="40" rows="15">$myrow[text]</textarea>
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

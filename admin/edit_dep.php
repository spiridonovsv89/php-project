<?php 
include ("lock.php");

if (isset($_GET['id'])) {$id = $_GET['id'];}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Страница редактирования отделов</title>
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
<h3 align="center">Выберите отдел и отредактируйте его</h3>
<? 
if (!isset($id))

{
	mysql_query('set character_set_client="utf8"');
mysql_query('set character_set_results="utf8"');
$result = mysql_query("SELECT * FROM departments");      
$myrow = mysql_fetch_array($result);

do 
{
printf ("<p><a href='edit_dep.php?id=%s'>%s</a></p>",$myrow["id"],$myrow["name"]);
}

while ($myrow = mysql_fetch_array($result));

}

else

{
mysql_query('set character_set_client="utf8"');
mysql_query('set character_set_results="utf8"');
$result = mysql_query("SELECT * FROM departments WHERE id=$id");      
$myrow = mysql_fetch_array($result);

$result2 = mysql_query("SELECT id,name FROM departments");      
$myrow2 = mysql_fetch_array($result2);

print <<<HERE
<p>
           <label>Измените название отдела<br>
             <input value="$myrow[name]" type="text" name="name" id="name">
             </label>
         </p>
         		  <p>
           <label>Измените текст со страницы отдела<br>
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

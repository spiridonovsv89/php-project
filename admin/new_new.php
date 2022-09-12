<? include ("lock.php");  ?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Страница добавления новости</title>
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
        <h3 align="center">Страница добавления новости</h3>
       <form name="form1" method="post" action="add_new.php">
        <p>
           <label>Выберите отделы, для которых публикуется новость<br>
             <select name="dep">
             <?
			  $result = mysql_query("SELECT name,id FROM departments",$db);

if (!$result) {
echo "<p>Извлечь данные из базы не удалось.<br></p>";
exit(mysql_error());
}

if (mysql_num_rows($result) > 0)

{
$myrow = mysql_fetch_array($result); 

do 
{
printf ("<option value='%s'>%s</option>",$myrow["id"],$myrow["name"]);
}
while ($myrow = mysql_fetch_array($result));
}

else {
		echo "<p>Извлечь данные из базы не удалось, в таблице нет записей.</p>";
		exit();
	}		 
			  ?>
             </select>
             </label>
         </p>
         <p>
           <label>Введите заголовок новости<br>
             <input type="text" name="title" id="title">
             </label>
         </p>        
         <p>
           <label>Введите дату добавления новости (в формате ГГГГ-ММ-ДД)<br>
             <input type="text" name="date" id="date" value="<? $date = date("Y-m-d"); echo $date; ?>">
             </label>
         </p>
         
         <p>
           <label>Введите полный текст новости с тэгами
           <textarea name="text" id="text" cols="40" rows="15"></textarea>
           </label>
         </p>    
         <p>
           <label>
           <input type="submit" name="submit" id="submit" value="Занести новость в базу">
           </label>
         </p>
       </form>
       <p>&nbsp;</p>        </td>
      </tr>
    </table></td>
  </tr>

<?  include ("blocks/footer.php");        ?>  
</table>
</body>
</html>

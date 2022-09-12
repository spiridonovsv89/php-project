<?php include("blocks/bd.php");?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Страница оформления заявки на техническую поддержку</title>
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
        <td valign="top">
		<h3 align="center">Страница оформления заявки на техническую поддержку</h3>
     
<form name="form1" method="post" action="add_bid.php">
        <p>
           <label>Введите ваше ФИО полностью<br>
             <input type="text" name="author" id="author">
             </label>
         </p>   
        <p>
           <label>Выберите ваш отдел<br>
             <select name="dep">
             <?
			  $result = mysql_query("SELECT name,id FROM departments WHERE NOT id='1'",$db);

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
           <label>Введите тему заявки<br>
             <input type="text" name="title" id="title">
             </label>
         </p>   
       
        <? $date = date("Y-m-d");
		$done = 0;?>
      
         <p>
           <label>Введите краткое описание вашей проблемы
           <textarea name="text" id="text" cols="40" rows="7"></textarea>
           </label>
         </p>    
       
           <label>
           <input class="search_button" type="submit" name="submit" id="submit" value="Отправить">
           </label>
      
       </form> 
        <h5>* Все поля обязательны для заполнения </h5>
        </td>
        </tr>
    </table></td>
  </tr>
    <?php include ("blocks/footer.php"); ?>
</table>
</body>

</html>
<?php 
include ("lock.php");

if (isset($_POST['name'])) {$name = $_POST['name']; if ($name == '') {unset($name);}}

if (isset($_POST['text']))      {$text = $_POST['text']; if ($text == '') {unset($text);}}
if (isset($_POST['id']))      {$id = $_POST['id'];}

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Обработчик</title>
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
      
         <?php 
if (isset($name) && isset($text))
{
mysql_query('set character_set_client="utf8"');
mysql_query('set character_set_results="utf8"');
$result = mysql_query ("UPDATE departments SET name='$name', text='$text' WHERE id='$id'");

if ($result == 'true') {echo "<p>Отдел успешно обновлен.</p>";}
else {echo "<p>Отдел не обновлен.</p>";}


}		 
else 

{
echo "<p>Вы ввели не всю информацию, поэтому отдел не может быть обновлен.</p>";
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

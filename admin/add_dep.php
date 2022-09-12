<?php 
include ("lock.php");

if (isset($_POST['name']))    {$name = $_POST['name']; if ($name == '') {unset($name);}}

if (isset($_POST['text']))        {$text = $_POST['text']; if ($text == '') {unset($text);}}

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
$result = mysql_query ("INSERT INTO departments (name,text) VALUES ('$name','$text')");

if ($result == 'true') {echo "<p>Новый отдел успешно добавлен</p>";}
else {echo "<p>Новый отдел не добавлен</p>";}


}		 
else 

{
echo "<p>Вы ввели не всю информацию, поэтому отдел не может быть добавлен.</p>";
}		 ?>        
             </td>
      </tr>
    </table></td>
  </tr>

<?  include ("blocks/footer.php");        ?>  
</table>
</body>
</html>

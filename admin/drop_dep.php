﻿<?php 
include ("lock.php");

if (isset($_POST['id'])) {$id = $_POST['id'];}
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
if (isset($id))
{
$result = mysql_query ("DELETE FROM departments WHERE id='$id'");

if ($result == 'true') {echo "<p>Отдел успешно удален.</p>";}
else {echo "<p>Отдел не удален.</p>";}


}		 
else 

{
echo "<p>Вы не выбрали радиокнопку на предыдущем шаге.</p>";
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

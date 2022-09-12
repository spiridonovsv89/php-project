<?php 
include ("blocks/bd.php");

if (isset($_POST['title']))    {$title = $_POST['title']; if ($title == '') {unset($title);}}
if (isset($_POST['date']))      {$date = $_POST['date']; if ($date == '') {unset($date);}}
if (isset($_POST['text']))        {$text = $_POST['text']; if ($text == '') {unset($text);}}
if (isset($_POST['dep']))        {$dep = $_POST['dep']; if ($dep == '') {unset($dep);}}
if (isset($_POST['author']))        {$author = $_POST['author']; if ($author == '') {unset($author);}}
if (isset($_POST['done']))        {$done = $_POST['done']; if ($done == '') {unset($done);}}

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Обработчик</title>
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

<? include("blocks/header.php");   ?> 
  <tr>
    <td><?php include ("blocks/adds.php"); ?><table width="690" border="0" cellspacing="0" cellpadding="0">
      <tr>

<? include ("blocks/lefttd.php");  ?>      
        <td valign="top">
      
         <?php 
		 $date = date("Y-m-d");
		$done = 1;
if (isset($title) && isset($date) && isset($text) && isset($dep) && isset($author) && isset($done))
{

$result = mysql_query ("INSERT INTO bids (title,date,text,dep,author,done) VALUES ('$title','$date','$text','$dep','$author','$done')");

if ($result == 'true') {echo "<p>Ваша заявка успешно добавлена, в скором времени проблема будет устранена</p>";}
else {echo "<p>Ваша заявка не добавлена</p>";}


}		 
else 

{
echo "<p>Вы ввели не всю информацию, поэтому заявка в базу не может быть добавлена</p>";
}		 ?>        
             </td>
      </tr>
    </table></td>
  </tr>

<?  include ("blocks/footer.php");        ?>  
</table>
</body>
</html>

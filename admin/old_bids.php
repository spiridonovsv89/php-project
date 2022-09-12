<?php
//include("blocks/bd.php");
include ("lock.php"); 
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Выполненные заявки</title>
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	color:#424242;
}
</style>
</head>
<body>
<table width="690" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="main_border">

<? include("blocks/header.php");   ?> 
  <tr>
    <td><table width="690" border="0" cellspacing="0" cellpadding="0">
      <tr>

<? include ("blocks/lefttd.php");  ?>      
        <td valign="top">
       <h3 align="center">Выполненные заявки</h3>
       <? if (!isset($_POST['bids_id'])&&!isset($_POST['status_id'])) {
		   
		    
      
 
 $result = mysql_query("SELECT bids.author,bids.title,bids.date,bids.text,departments.name,status.stat FROM bids,departments,status WHERE bids.dep = departments.id AND bids.done = status.id AND bids.done = '2' ORDER BY bids.date DESC, bids.id DESC",$db);
	//	$myrow = mysql_fetch_array($result);
	
if (!$result) {
echo "<p>Извлечь данные из базы не удалось.<br></p>";
exit(mysql_error());
}
if (mysql_num_rows($result) > 0) { echo '<table align="center" width="98%" cellspacing="0" cellpadding="0" border="1">
  <tr>
    <td align="center">Отправитель</td>
    <td align="center">Отдел</td>
    <td align="center">Тема</td>
    <td align="center">Описание</td>
    <td align="center">Дата</td>
    <td align="center">Статус</td>
  </tr>';	}
if (mysql_num_rows($result) > 0) {
	$myrow = mysql_fetch_array($result);
		do {	
	
echo "<tr><td>";
echo $myrow["author"];
echo "</td><td>";
echo $myrow["name"];
echo "</td><td>";
echo $myrow["title"];
echo "</td><td>";
echo $myrow["text"];
echo "</td><td width='12%'>";
echo $myrow["date"];
echo "</td><td>";
echo $myrow["stat"];
echo "</td></tr>";
} 
while ($myrow = mysql_fetch_array($result));
	}
	else {
		echo "<p>Выполненных заявок на данный момент нет.</p>";
		exit();
	}	
  echo '</table>';
}

?>        </td>
      </tr>
    </table></td>
  </tr>

<?  include ("blocks/footer.php");        ?>  
</table>
</body>
</html>

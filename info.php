<? include ("blocks/bd.php"); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Информация</title>
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
		<h3 align="center">Информация</h3>
        
        <?
		$result = mysql_query("SELECT id,title,link FROM info",$db);
		$myrow = mysql_fetch_array($result);
		
		
	do {	
printf ("<p><a href='%s'>%s</a></p>",$myrow["link"],$myrow["title"]);} 
while ($myrow = mysql_fetch_array($result));

      ?>
        
        </td>
        </tr>
    </table></td>
  </tr>
    <?php include ("blocks/footer.php"); ?>
</table>
</body>

</html>
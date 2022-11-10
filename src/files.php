<? include ("blocks/bd.php"); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Файлы</title>
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
		<h3 align="center">Файлы</h3>

    <?
    $sql_link = "select * from files";
    $result_link = $conn->query($sql_link);
    if ($result_link->num_rows > 0){
    while($row = $result_link->fetch_assoc() ){
          echo "<p><a href='" . $row["file"] . "'>" .  $row["title"] . "</a></p>";
    }
    } else {
          echo "<h3 align='center'>В базе данных нет записей</h3>";
    }

    ?>
        </td>
        </tr>
    </table></td>
  </tr>
    <?php include ("blocks/footer.php"); ?>
</table>
</body>

</html>

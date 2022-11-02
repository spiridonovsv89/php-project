<?php include("blocks/bd.php");?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Главная страница внутрикорпоративного сайта ЗАО "Далур"</title>
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color:#424242;
}
</style>
</head>

<body>
<table width="690" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="main_border"><?php include ("blocks/header.php"); ?>
  <tr>
    <td valign="top"><?php include ("blocks/adds.php"); ?><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
          <?php include ("blocks/lefttd.php"); ?>
        <td valign="top">
          <h3 align="center">Новости</h3>
          <?

          $sql = "select * from news";
          $result = $conn->query($sql);

          while($row = $result->fetch_assoc() ){

        echo "<table align='center' class='news'>";
        echo "<tr>";
        echo "<td class='news_title'><p class='news_name'>". $row["title"] ."</p>";
	      echo "<p class='news_date'>Новость добавлена: " . $row["date"] . "</p>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>" . $row["text"] . "</td>";
        echo "</tr>";
        echo "</table><br>";

                              }



        $conn->close();


          ?>
        </td>
        </tr>
    </table></td>
  </tr>
    <?php include ("blocks/footer.php"); ?>
</table>
</body>

</html>

<? include ("blocks/bd.php");

if (isset($_POST['submit_s'])) {$submit_s = $_POST['submit_s'];}
if (isset($_POST['search'])) {$search = $_POST['search'];}
if (isset($submit_s)) {if (empty($search) or strlen($search) < 4)
{
exit ("<p>Поисковый запрос не введен, либо он менее 4-х символов.</p>");
}

$search = trim($search);
$search = stripslashes($search);
$search = htmlspecialchars($search);

}

else
{
exit("<p>Вы обратились к файлу без необходимых параметров.</p>");
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><? echo "Результаты запроса: $search"; ?></title>
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
  <? include ("blocks/header.php"); ?>
  <tr>
    <td valign="top"><?php include ("blocks/adds.php"); ?><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
       <? include ("blocks/lefttd.php"); ?>
        <td valign="top">

<?

    $sql = "SELECT * FROM news WHERE match(text) against('$search')";
    $result = $conn->query($sql);


    if (!$result)
    {
    echo "<p>Запрос на выборку данных из базы не прошел. </p>";
    exit(mysqli_error());
    }



    if ($result->num_rows > 0){
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
    } else {
          echo "<h3 align='center'>В базе данных нет записей</h3>";
    }





?>

        </td>
      </tr>
    </table></td>
  </tr>
  <? include ("blocks/footer.php"); ?>
</table>
</body>
</html>

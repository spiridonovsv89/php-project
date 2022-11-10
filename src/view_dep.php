<? include ("blocks/bd.php");

if (isset($_GET['dep'])) {$dep = $_GET['dep']; }
if (!isset($dep)) {$dep = 1;}

if (!preg_match("|^[\d]+$|", $dep)) {
exit ("<p>Неверный формат запроса! Проверьте URL!");
}
$sql_dep = "select * from departments where id='$dep'";
$result_dep = $conn->query($sql_dep);

if ($result_dep->num_rows > 0){
while($row = $result_dep->fetch_assoc() ){
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title><? echo "Отделы - " . $row["title"]; }}?> </title>
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

            <?
  $sql_dep = "select * from workers, departments where departments.id='$dep' and workers.department='$dep'";
$result_dep = $conn->query($sql_dep);



if($result_dep->num_rows > 0){

while($row = $result_dep->fetch_assoc() ){

        echo "<table align='center' class='news'>";
        echo "<tr>";
        echo "<td class='news_title'><p class='news_name'>". $row["position"] ."</p>";

        echo "</tr>";
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "</tr>";
        echo "</table><br>";
}}

else {
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

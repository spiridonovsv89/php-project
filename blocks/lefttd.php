<td width="184" valign="top" class="left">
<div class="menu_title">Главное меню</div>
<div id="coolmenu">
<a href="index.php">Новости</a>
<a href="info.php">Информация</a>
<a href="files.php">Файлы</a>
</div>
<div class="menu_title">Отделы</div>
<div id="coolmenu">

<?

$sql_dep = "select * from departments";
$result_dep = $conn->query($sql_dep);
if ($result_dep->num_rows > 0){
while($row = $result_dep->fetch_assoc() ){
      echo "<a href='view_dep.php?dep=" . $row["id"] . "'>" .  $row["title"] . "</a>";
}
} else {
      echo "В базе данных нет записей";
}

?>

</div>
<div class="menu_title">Корпоративные ссылки</div>
<div id="coolmenu">

<?

$sql_link = "select * from links";
$result_link = $conn->query($sql_link);
if ($result_link->num_rows > 0){
while($row = $result_link->fetch_assoc() ){
      echo "<a href='" . $row["link"] . "'>" .  $row["title"] . "</a>";
}
} else {
      echo "0 records";
}

?>


</div>
<div class="menu_title">Поиск</div>
<div id="coolmenu">
<form class="bottom" action="view_search.php" method="post" name="form_s">
<p class="search_text">Введите данные для поиска:</p><br>
<p class="search_input"><input  type="text" size="17" maxlength="50" name="search"></p><br>
<input class="search_button" type="submit" name="submit_s" value="Искать">
</form></div>
</td>

<td width="184" valign="top" class="left">
<div class="menu_title">Главное меню</div>
<div id="coolmenu">
<a href="index.php">Новости</a>
<a href="info.php">Информация</a>
<a href="files.php">Файлы</a>
<a href="new_bid.php">Техническая поддержка</a>
<a href="admin/index.php">Администраторский блок</a>
</div>
<div class="menu_title">Корпоративные ссылки</div>
<div id="coolmenu">
<?
mysql_query('set character_set_client="utf8"');
mysql_query('set character_set_results="utf8"');
$result_links = mysql_query("SELECT title,link FROM links",$db);
if (!$result_links) {
echo "<p>Извлечь данные из базы не удалось.<br></p>";
exit(mysql_error());
}

if (mysql_num_rows($result_links) > 0) {
	$myrow_links = mysql_fetch_array($result_links);
	
	do {	
printf ("<a href='%s' target='_blank'>%s</a>",$myrow_links["link"],$myrow_links["title"]);
} 
while ($myrow_links = mysql_fetch_array($result_links));
	}
	
	else {
		echo "<p>Извлечь данные из базы не удалось, в таблице нет записей.</p>";
		exit();
	}

?></div>
<div class="menu_title">Отделы</div>
<div id="coolmenu">
<?
$result_dep = mysql_query("SELECT * FROM departments WHERE NOT id=1",$db);
if (!$result_dep) {
echo "<p>Извлечь данные из базы не удалось.<br></p>";
exit(mysql_error());
}

if (mysql_num_rows($result_dep) > 0) {
	$myrow_dep = mysql_fetch_array($result_dep);
	
	do {	
printf ("<a href='view_dep.php?dep=%s'>%s</a>",$myrow_dep["id"],$myrow_dep["name"]);
} 
while ($myrow_dep = mysql_fetch_array($result_dep));
	}
	
	else {
		echo "<p>Извлечь данные из базы не удалось, в таблице нет записей.</p>";
		exit();
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
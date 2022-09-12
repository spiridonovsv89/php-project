<?php
$db = mysql_connect ("localhost","admin","123456");
mysql_select_db ("dalursite",$db);
mysql_query('set character_set_client="utf8"');
mysql_query('set character_set_results="utf8"');
?>
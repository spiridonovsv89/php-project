<? include ("blocks/bd.php");
//переводим глобальные массивы в обычные переменные и обрабатываем данные
$ok = $_POST['ok'] ?? null;
//заменяем HTML-теги безопасными эквивалентами и вырезаем крайние пробелы
$name = htmlspecialchars(strval($_POST['name'] ?? null));
$email = htmlspecialchars(strval($_POST['email'] ?? null));
$message = htmlspecialchars(strval($_POST['message'] ?? null));
$message = str_replace("\r\n","<br />",$message); //добавляем переносы
//Если была нажата нопка OK
if (isset($ok))
{

    //если не заполнены обязательные поля
    if (empty($name) or empty($email) or empty($message))
    {
    //информируем об этом пользователя и выходим
    echo "<p>Вы ввели не все данные!</p>";
    exit;
    }

    //куда будем отправлять письмо
    $address = "seregakvn@ya.ru";
    //тема письма
    $subject = "Вам поступило новое сообщение";
    //само письмо
    $letter = "<p><strong>Вам пришло новое письмо от</strong> ".$name."</p>
<p><strong>e-mail:</strong>
".$email."</p><p><strong>Текст письма:</strong><br>".$message."</p>";
    //Заголовки
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= 'From: feedback@yoursite.com'. "\r\n";

    //отправляем письмо
    mail($address, $subject, $letter, $headers);
    //информируем об этом пользователя и перенапрвляем обратно с таймаутом 5 сек.
    echo "<p>Ваше письмо отправлено, сейчас Вы будете перенаправлены</p>";
    echo "<meta http-equiv='refresh' content='5; url=contact.php'>";
    exit;

}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Связаться с администратором</title>
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
		<h3 align="center">Связаться с администратором</h3>

<form action="" method="post">
<p>Ваше имя:<br>
<input type="text" name="name">
</p>
<p>Ваш e-mail:<br>
<input type="text" name="email">
</p>
<p>Сообщение:<br><textarea  name="message" cols=40 rows=10></textarea>
</p>
<input class="search_button" type="submit" name="ok" value="Отправить">
</form>
        <h5>* Все поля обязательны для заполнения </h5>

        </td>
        </tr>
    </table></td>
  </tr>
    <?php include ("blocks/footer.php"); ?>
</table>
</body>

</html>

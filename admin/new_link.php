<? include ("lock.php");  ?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Страница добавления новой ссылки</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="690" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="main_border">

<? include("blocks/header.php");   ?> 
  <tr>
    <td><table width="690" border="0" cellspacing="0" cellpadding="0">
      <tr>

<? include ("blocks/lefttd.php");  ?>      
        <td valign="top">
        <h3 align="center">Страница добавления новой ссылки</h3>
       <form name="form1" method="post" action="add_link.php">
         <p>
           <label>Введите название сайта<br>
             <input type="text" name="title" id="title">
             </label>
         </p>
                     
         <p>
           <label>Введите ссылку на сайт (в формате http://ссылка/)<br>
            <input type="text" name="link" id="link">
           </label>
         </p> 
           <p>
           <label>
           <input type="submit" name="submit" id="submit" value="Добавить сайт в базу">
           </label>
         </p>
       </form>
       <p>&nbsp;</p>        </td>
      </tr>
    </table></td>
  </tr>

<?  include ("blocks/footer.php");        ?>  
</table>
</body>
</html>

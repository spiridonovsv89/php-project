<? include ("lock.php");  ?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Страница добавления нового отдела</title>
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
        <h3 align="center">Страница добавления нового отдела</h3>
       <form name="form1" method="post" action="add_dep.php">
                 <p>
           <label>Введите название нового отдела<br>
             <input type="text" name="name" id="name">
             </label>
         </p>        
                  <p>
           <label>Введите текст для страницы отдела
           <textarea name="text" id="text" cols="40" rows="15"></textarea>
           </label>
         </p>    
         <p>
           <label>
           <input type="submit" name="submit" id="submit" value="Добавить отдел">
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

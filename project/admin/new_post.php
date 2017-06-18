<? include ("lock.php");  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Страница добавления нового урока</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<? include ("blocks/page_settings.php"); ?>
<table width="<?php echo $table_width; ?>" border="<?php echo $table_border; ?>" align="center" cellpadding="<?php echo $table_cellpadding; ?>" cellspacing="<?php echo $table_cellspacing; ?>" bgcolor="$table_bgcolor" class="main_border">
<!--Подключаем шапку сайта-->
<? include("blocks/header.php");   ?> 
  <tr>
    <td><table width="<?php echo $table_width; ?>" border="<?php echo $table_border; ?>" cellspacing="<?php echo $table_cellspacing; ?>" cellpadding="<?php echo $table_cellpadding; ?>">
      <tr>
<!--Подключаем левый блок сайта-->
<? include ("blocks/lefttd.php");  ?>      
        <td valign="top">
       <form name="form1" method="post" action="add_post.php">
         <p>
           <label>Введите название урока<br>
             <input type="text"  size="100%" name="title" id="title">
             </label>
         </p>
         <p>
           <label>Введите краткое описание урока<br>
           <textarea name="meta_d" id="meta_d" cols="100" rows="4"></textarea>
           </label>
         </p>
         <p>
           <label>Введите ключевые слова для урока<br>
           <input type="text"  size="100%" name="meta_k" id="meta_k">
           </label>
         </p>
         <p>
           <label>Введите дату добавления урока (например: 2009-12-01)<br>
           <input name="date" type="text" id="date" value="<?php $date = date("Y-m-d"); echo $date; ?>">
           </label>
         </p>
         <p>
           <label>Ведите краткое описание урока с тэгами абзацев
           <textarea name="description" id="description" cols="100" rows="5"></textarea>
           </label>
         </p>
         <p>
           <label>Введите полный текст урока с тэгами
           <textarea name="text" id="text" cols="100" rows="20"></textarea>
           </label>
         </p>
         <p>
           <label>Введите автора урока<br>
           <input type="text"  size="100%" name="author" id="author" value="ЦЗЭП">
           </label>
         </p>
         
         <p>
           <label>Введите где лежит миниатюра<br>
           <input type="text"  size="100%" name="img" id="img" value="no">
           </label>
         </p>
         
         <p>
           <label>Выберите категорию урока<br>
           
           <select name="cat">
           
           <?
		   
       $result = mysql_query("SELECT title,id FROM modules",$db);

if (!$result)
{
echo "<p>Запрос на выборку данных из базы не прошел. Напишите об этом администратору admin@sustdevedu.com. <br> <strong>Код ошибки:</strong></p>";
exit(mysql_error());
}

if (mysql_num_rows($result) > 0)

{
$myrow = mysql_fetch_array($result); 

do 
{
printf ("<option value='%s'>%s</option>",$myrow["id"],$myrow["title"]);



}
while ($myrow = mysql_fetch_array($result));



}

else
{
echo "<p>Информация по запросу не может быть извлечена в таблице нет записей.</p>";
exit();
}

?>
       
       
       
           </select>
           
           </label>
         </p>
         
         
 
         
         
         <p>
           <label>
           <input type="submit" name="submit" id="submit" value="Занести урок в базу">
           </label>
         </p>
       </form>
       <p>&nbsp;</p>        </td>
      </tr>
    </table></td>
  </tr>
<!--Подключаем нижний графический элемент-->  
<?  include ("blocks/footer.php");        ?>  
</table>
</body>
</html>

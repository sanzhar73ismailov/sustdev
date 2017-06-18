<?php 
include ("lock.php");
include ("blocks/bd.php");
if (isset($_GET['id'])) {$id = $_GET['id'];}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Страница редактирования урока</title>
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
      
<? 

if (!isset($id))

{
$result = mysql_query("SELECT title,id FROM lessons");      
$myrow = mysql_fetch_array($result);

do 
{
printf ("<p><a href='edit_post.php?id=%s'>%s</a></p>",$myrow["id"],$myrow["title"]);
}

while ($myrow = mysql_fetch_array($result));

}

else

{

$result = mysql_query("SELECT * FROM lessons WHERE id=$id");      
$myrow = mysql_fetch_array($result);

$result2 = mysql_query("SELECT id,title FROM modules");      
$myrow2 = mysql_fetch_array($result2);

$count = mysql_num_rows($result2);

echo "<h3 align='center'>Редактирование урока</h3>";

echo "<form name='form1' method='post' action='update_post.php'>
 <p>Выберит модуль для урока<br>
 
 <select name='cat' size='1'>";

do 
{

if ($myrow['module'] == $myrow2['id'])
{
printf ("<option value='%s' selected>%s</option>",$myrow2["id"],$myrow2["title"]);
}

else
{
printf ("<option value='%s'>%s</option>",$myrow2["id"],$myrow2["title"]);
}

}
while ($myrow2 = mysql_fetch_array($result2));
 
echo "</select></p>"; 
 


print <<<HERE

         <p>
           <label>Введите название урока<br>
             <input value="$myrow[title]" type="text"  size="100%"  name="title" id="title">
             </label>
         </p>
         <p>
           <label>Введите краткое описание урока<br>
             <textarea name="meta_d" id="meta_d" cols="100" rows="4">$myrow[meta_d]</textarea>
           </label>
         </p>
         <p>
           <label>Введите ключевые слова для урока<br>
           <input value="$myrow[meta_k]" type="text"  size="100%"  name="meta_k" id="meta_k">
           </label>
         </p>
         <p>
           <label>Введите дату добавления урока (например: 2009-12-01)<br>
           <input value="$myrow[date]" name="date" type="text" id="date" value="2007-01-27">
           </label>
         </p>
         <p>
           <label>Ведите краткое описание урока с тэгами абзацев
           <textarea name="description" id="description" cols="100" rows="5">$myrow[description]</textarea>
           </label>
         </p>
         <p>
           <label>Введите полный текст урока с тэгами
           <textarea name="text" id="text" cols="100" rows="20">$myrow[text]</textarea>
           </label>
         </p>
         <p>
           <label>Введите автора урока<br>
           <input value="$myrow[author]" type="text"  size="100%"  name="author" id="author">
           </label>
         </p>
		 
		 <p>
           <label>Введите где лежит миниатюра<br>
           <input value="$myrow[mini_img]" type="text"  size="100%"  name="img" id="img">
           </label>
         </p>
		 
		 
		 <input name="id" type="hidden" value="$myrow[id]">
		 
         <p>
           <label>
           <input type="submit" name="submit" id="submit" value="Сохранить изменения">
           </label>
         </p>
       </form>



HERE;
}


?>
       
       
       </td>
      </tr>

    </table></td>
  </tr>
<!--Подключаем нижний графический элемент-->  
<?  include ("blocks/footer.php");        ?>  
</table>
</body>
</html>

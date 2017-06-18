<?php 
include ("lock.php");
include ("blocks/bd.php");
if (isset($_GET['id'])) {$id = $_GET['id'];}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Страница редактирования модуля</title>
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
$result = mysql_query("SELECT title,id FROM modules");      
$myrow = mysql_fetch_array($result);

do 
{
printf ("<p><a href='edit_module.php?id=%s'>%s</a></p>",$myrow["id"],$myrow["title"]);
}

while ($myrow = mysql_fetch_array($result));

}

else

{

$result = mysql_query("SELECT * FROM modules WHERE id=$id");      
$myrow = mysql_fetch_array($result);

echo "<h3 align='center'>Редактирование модуля</h3>";

print <<<HERE

<form name='form1' method='post' action='update_module.php'>
         <p>
           <label>Введите название модуля<br>
             <input value="$myrow[title]" type="text"  size="100%"  name="title" id="title">
             </label>
         </p>
         <p>
           <label>Введите краткое описание модуля<br>
            <textarea name="meta_d" id="meta_d" cols="100" rows="4">$myrow[meta_d]</textarea>
           </label>
         </p>
         <p>
           <label>Введите ключевые слова для модуля<br>
           <input value="$myrow[meta_k]" type="text"  size="100%"  name="meta_k" id="meta_k">
           </label>
         </p>
        
         <p>
           <label>Введите полный текст описании модуля
           <textarea name="text" id="text" cols="100" rows="20">$myrow[text]</textarea>
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

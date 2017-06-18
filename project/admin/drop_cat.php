<?php 
include ("lock.php");
include ("blocks/bd.php");
if (isset($_POST['id'])) {$id = $_POST['id'];}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Обработчик</title>
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
      
         <?php 
if (isset($id))
{

$result0 = mysql_query ("SELECT id FROM data WHERE cat='$id'",$db);
if (mysql_num_rows($result0) > 0) {

echo "<p>В категории, которую Вы хотите удалить, есть заметки. Сначала перекиньте их по другим категориям.</p>";

}

else

{
$result = mysql_query ("DELETE FROM categories WHERE id='$id'");

if ($result == 'true') {echo "<p>Ваша категория успешно удалена!</p>";}
else {echo "<p>Ваша категория не удалена!</p>";}

}
}		 
else 

{
echo "<p>Вы запустили данный фаил без параметра id и поэтому, удалить категорию невозможно (скорее всего Вы не выбрали радиокнопку на предыдущем шаге).</p>";
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

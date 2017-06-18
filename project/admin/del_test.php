<?php 
include ("lock.php");
include ("blocks/bd.php");?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Страница удаления урока</title>
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
 
          <p><strong>Выберите урок для удаления          </strong></p>
          <form action="drop_test.php" method="post">
<? 

$result = mysql_query("
SELECT 
  modules.title as module_name,
  lessons.title as lesson_name,
  tests.question as question_text,
  tests.test_id as testId
FROM
  modules
  INNER JOIN lessons ON (modules.id = lessons.module)
  INNER JOIN tests ON (lessons.id = tests.lesson_id)
ORDER BY
  modules.id,
  tests.lesson_id,
  tests.test_id
");      
$myrow = mysql_fetch_array($result);
echo '<table width="100%" border="1">
  <tr>
 <th scope="col">Модуль</th>
    <th scope="col">Урок</th>
    <th scope="col">Вопрос</th>  
	   <th scope="col">Удалить</th>  
	</tr>';


do 
{

printf ("
<tr>
    <td>%s</td>
    <td>%s</td>
    <td>%s</td>
	<td><input name='id' type='radio' value='%s'></td>
  </tr>
",$myrow["module_name"],$myrow["lesson_name"],$myrow["question_text"],$myrow["testId"]);
}

while ($myrow = mysql_fetch_array($result));

  
 

?>
</table>
<p> <input name="submit" type="submit" value="Удалить"></p>

</form>
       
       
       </td>
      </tr>
    </table></td>
  </tr>
<!--Подключаем нижний графический элемент-->  
<?  include ("blocks/footer.php");        ?>  
</table>
</body>
</html>

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
 
          <p><strong> Пользователи прошедшие контрольные вопросы  </strong></p>
        
<? 

$result = mysql_query("
SELECT 
  users.surname,
  users.name,
  modules.title,
  lessons.title,
  user_test_passed.quantity_quest,
  user_test_passed.quantity_tried,
  user_test_passed.date_time
FROM
  modules
  INNER JOIN lessons ON (modules.id = lessons.module)
  INNER JOIN user_test_passed ON (lessons.id = user_test_passed.lesson)
  INNER JOIN users ON (user_test_passed.user_id = users.id)
ORDER BY
  user_test_passed.id" );  


     
$myrow = mysql_fetch_array($result);

echo "<h3 align='center'>Всего строк:".mysql_num_rows($result)."<h3>";  
echo "<table class='test_table' border = '1' width='100%' align='center'>
<tr>
  <th>№</th>
  <th>Фамилия</th>
  <th>Имя</th>
  <th>Модуль</th>
  <th>Урок</th>
  <th>Кол. вопр.</th>
  <th>Кол. попыток</th>
  <th>Дат сдачи</th>
   </tr>
";


do 
{

printf ("
<tr>
  <td>%s</td>
  <td>%s</td>
  <td>%s</td>
  <td>%s</td>
  <td>%s</td>
  <td>%s</td>
  <td>%s</td>
  <td>%s</td>
 </tr>",
++$i,
$myrow[0],
$myrow[1],
$myrow[2],
$myrow[3],
$myrow[4],
$myrow[5],
$myrow[6]
);
}
while ($myrow = mysql_fetch_array($result));

 
 

?>

</table>


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

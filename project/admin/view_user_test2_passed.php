<?php 
include ("lock.php");
include ("blocks/bd.php");
function yes_no($num){
if($num==1) return "Да";
else  return "Нет";
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Статистика прохождения тестов</title>
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
 
          <p><strong> Пользователи, прошедшие тестирование  </strong></p>
          <p><a href="view_user_test2_passed_for_print.php" title="Вариант для печати" target="_self">Вариант для печати</a></p>
        
<? 

$result = mysql_query("
SELECT 
  users.surname,
  users.name,
  users.place_working,
  users.status,
  user_test_sert.quantity_module,
  user_test_sert.procents,
  user_test_sert.passed,
  user_test_sert.date_time,
  user_test_sert.id as t,
  user_test_sert.sertificate
FROM
  users
  INNER JOIN user_test_sert ON (users.id = user_test_sert.user_id)
ORDER BY
  user_test_sert.date_time" );  



     
$myrow = mysql_fetch_array($result);

echo "<h3 align='center'>Всего строк:".mysql_num_rows($result)."<h3>";  
echo "<table class='test_table' border = '1' width='100%' align='center'>
<tr>
  <th>№</th>
  <th>Фамилия</th>
  <th>Имя</th>
  <th>Место работы</th>
  <th>Должность</th>
  <th>Количество модулей</th>
  <th>Процент пр.отв.</th>
  <th>Прошел</th>
  <th>Дата</th>
  <th>Наимен. модулей</th>
  <th>Сертификат</th>
   </tr>
";


do 
{
$result2 = mysql_query("
SELECT 
  modules.title
FROM
  user_sert_modules
  INNER JOIN modules ON (user_sert_modules.module = modules.id)
WHERE
  user_sert_modules.user_test_sert_id = '$myrow[t]'
ORDER BY
  modules.id");
  $myrow2 = mysql_fetch_array($result2);
  $name_mod='';
do{$name_mod .='<br>'.$myrow2[0];}while(  $myrow2 = mysql_fetch_array($result2));
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
   <td>%s</td>
   <td>%s</td>
   <td><a href='%s' title='Просмотреть сертификат'>Просмотреть</td>
 </tr>",
++$i,
$myrow[0],
$myrow[1],
$myrow[2],
$myrow[3],
$myrow[4],
$myrow[5],
yes_no($myrow[6]),
$myrow[7],
$name_mod,
'../'.$myrow['sertificate']
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

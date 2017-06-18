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
 
          <p><strong>Выберите пользователя для редактирования или удаления          </strong></p>
          <p><strong>Отсортировать по:</strong></p>
          <div class="sorting">
          <a href="view_user.php?sort_id=<?php echo 'id'; ?>">внутр. идентификатор</a><br>
                    <a href="view_user.php?sort_id=<?php echo 'login';  ?>">логин</a><br>
                              <a href="view_user.php?sort_id=<?php echo 'sex'; ?>">пол</a><br>
                                        <a href="view_user.php?sort_id=<?php echo 'name'; ?>">имя</a><br>
                                                  <a href="view_user.php?sort_id=<?php echo 'surname'; ?>">фамилия</a><br>
                                                            <a href="view_user.php?sort_id=<?php echo 'place_working'; ?>">место работы</a><br>
                                                                      <a href="view_user.php?sort_id=<?php echo 'status';  ?>">должность</a><br>
                                                                      <a href="view_user.php?sort_id=<?php echo 'date_enter';  ?>">дата регистрации</a><br>
                                                                      </div>
        
<? 


if(isset($_GET['sort_id'])){

$sort_id=$_GET['sort_id'];

}else{$sort_id='id';}
$result = mysql_query("SELECT 
  `id`,
  `login`,
  `sex`,
  `name`,
  `surname`,
  `patrname`,
  `country`,
  `phone`,
  `city`,
  `address`,
  `place_working`,
  `status`,
  `date_birth`,
  `email`,
  `password`,
  `date_enter`
FROM 
  `users`
  order by `$sort_id`"
  );   
     
$myrow = mysql_fetch_array($result);

echo "Всего пользователей:".mysql_num_rows($result);  

echo '<form action="drop_user.php" method="post" name="drop_form">';
do 
{

$i_for_button=bcmod (++$sch,2);
if ($i_for_button==0){$button="<input name='delbutton' type='submit' value='Удалить выбранные'><input name='reset' type='reset' value='сброс'>";}else{$button="";}
printf ("

  <p>N: %s<input name='delbox[%s]' type='checkbox' value='%s'>
 $button 
 <br>Id:<a name='%s'>%s</a>
    <br>Логин: %s
    <br>Пол: %s
	   <br>Имя: %s
	    <br>Фамилия: %s
    <br>Отчество: %s
    <br>Страна: %s
	   <br>тел: %s
<br>Город: %s
    <br>Адрес: %s
    <br>Место работы: %s
	   <br>Должность: %s
	   <br>Дата рожд: %s
    <br>Эл. почта: %s
    <br>Пароль: %s
	   <br>Дата регистр: %s
	   <br><a href='edit_user.php?id=%s'>Редактировать </a>
	   <br><a href='drop_user.php?id=%s' onclick='%s'>Удалить</a>
	</p>
",
++$i,
$myrow[1],
$myrow[0],
$myrow[0],
$myrow[0],
$myrow[1],
$myrow[2],
$myrow[3],
$myrow[4],
$myrow[5],
$myrow[6],
$myrow[7],
$myrow[8],
$myrow[9],
$myrow[10],
$myrow[11],
$myrow[12],
$myrow[13],
$myrow[14],
$myrow[15],
$myrow[0],
$myrow[0],
'alert("Вы уверены?");'
);
}
while ($myrow = mysql_fetch_array($result));

 
 

?>
</form> 
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

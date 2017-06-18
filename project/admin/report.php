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
        

<?php


	// выбираем необходимые данные с 
	// одновлеменной группировкой
 	$sql = "SELECT user_ip, user_agent, page, 
					COUNT(user_agent) cnt 	
			FROM user_tracker
			GROUP BY user_ip, user_agent, page
			ORDER BY user_ip, user_agent";

	// выполняем запрос и проверяем результат 	
	$qry = mysql_query($sql, $db);
 	if(!$qry)
 	{
 		die('Ошибка выполнения запроса' . 
 			mysql_error($db));
 	}

	// проверяем наличие записей
 	$empty = mysql_num_rows($qry);

	// дальше при помощи PHP-вставок в HTML-код 
	// выводим либо таблицу с записями, 
	// либо сообщение об отсутствии записей
	
	
	
	
if($empty == 0){ ?>
 	 	<h1>Таблица логов пуста</h1>
 	<?php } else { ?>
 		<table border="1">
	 		<tr>
				<td>IP-адрес пользователя</td>    
				<td>Браузер пользователя</td>
 				<td>Количество просмотров</td>
				<td>Страница</td>
 			</tr>
 		<?php $row = mysql_fetch_assoc($qry); 		while($row){?>
 			<tr>
 				<td>
 			<?php echo $row["user_ip"];?>
 				</td>
 				<td>
 			<?php echo $row["user_agent"];?>
 				</td>
 				<td>
 			<?php echo $row["cnt"];?>
 				</td>
				<td>
 			<?php echo $row["page"];?>
 				</td>
 			</tr>
			<?php $row = mysql_fetch_assoc($qry);?>
 		<?php }?>
		</table>
 		<?php
	 		mysql_free_result($qry);
 			mysql_close($db);
 		}?>



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

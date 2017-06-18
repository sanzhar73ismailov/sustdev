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
exit("Ошибка");

}

else

{

$result = mysql_query("SELECT * FROM users WHERE id='$id'");      
$myrow = mysql_fetch_array($result);

echo "<h3 align='center'>Редактирование данных пользователя</h3>";

echo "<form name='form1' method='post' action='update_user.php'>";


 


echo <<<TEXT

         <p>
           <label>Логин<br>
           <input value="$myrow[login]" type="text"  size="100%"  name="login" id="login">
             </label>
         </p>
         <p>
           <label>Пол (1-муж, 0 - жен)<br>
           <input value="$myrow[sex]" type="text"  size="100%"  name="sex" id="sex">
           </label>
         </p>
         <p>
           <label>Имя<br>
           <input value="$myrow[name]" type="text"  size="100%"  name="name" id="name">
           </label>
         </p>
		 
         <p>
           <label>Фамилия<br>
           <input value="$myrow[surname]" name="surname" type="text" id="surname">
           </label>
         </p>
		       <p>
           <label>Отчество<br>
           <input value="$myrow[patrname]" name="patrname" type="text" id="surname">
           </label>
         </p>
		 
          <p>
           <label>Страна<br>
           <input value="$myrow[country]" name="country" type="text" id="country">
           </label>
         </p>
		   
		   <p>
           <label>Телефон<br>
           <input value="$myrow[phone]" name="phone" type="text" id="phone">
           </label>
         </p>
		 
		   <p>
           <label>Город<br>
           <input value="$myrow[city]" name="city" type="text" id="city">
           </label>
         </p>
		 
		   <p>
           <label>Адрес<br>
           <input value="$myrow[address]" name="address"  type="text"  size="100%"  id="address">
           </label>
         </p>

		   <p>
           <label>Место работы<br>
           <textarea name="place_working" id="text" cols="100" rows="5">$myrow[place_working]</textarea>
           </label>
         </p>

         <p>
           <label>Должность<br>
           <textarea name="status" id="status " cols="100" rows="5">$myrow[status]</textarea>
           </label>
         </p>
		 		   <p>
           <label>День рождения<br>
           <input value="$myrow[date_birth]" name="date_birth" type="text" id="date_birth">
           </label>
         </p>
		 		   <p>
           <label>Эл. почта<br>
           <input value="$myrow[email]" name="email" type="text" id="email">
           </label>
         </p>
		 
			<p>
           <label>Пароль<br>
           <input value="$myrow[password]" name="password" type="text" id="password">
           </label>
         </p>
		 			<p>
           <label>Дата регистрации<br>
           <input value="$myrow[date_enter]" name="date_enter" type="text" id="date_enter">
           </label>
  
		 
		 
		 <input name="id" type="hidden" value="$myrow[id]">
		 
         <p>
           <label>
           <input type="submit" name="submit" id="submit" value="Сохранить изменения">
           </label>
         </p>
       </form>



TEXT;
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

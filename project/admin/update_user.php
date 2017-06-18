<?php 
include ("lock.php");
include ("blocks/bd.php");


/* Если существует в глобальном массиве $_POST['title'] опр. ячейка, то мы создаем простую переменную из неё. Если переменная пустая, то уничтожаем переменную.   */

if (isset($_POST['id']))      {$id = $_POST['id']; if ($id == '') {unset($id);}}
if (isset($_POST['login']))      {$login = $_POST['login']; if ($login == '') {unset($login);}}
if (isset($_POST['sex']))      {$sex = $_POST['sex']; if ($sex == '') {unset($sex);}}
if (isset($_POST['name']))      {$name = $_POST['name']; if ($name == '') {unset($name);}}
if (isset($_POST['surname']))        {$surname = $_POST['surname']; if ($surname == '') {unset($surname);}}
if (isset($_POST['patrname'])) {$patrname = $_POST['patrname']; if ($patrname == '') {unset($patrname);}}
if (isset($_POST['country']))        {$country = $_POST['country']; if ($country == '') {unset($country);}}
if (isset($_POST['phone']))      {$phone = $_POST['phone']; if ($phone == '') {unset($phone);}}
if (isset($_POST['city']))      {$city = $_POST['city']; if ($city == '') {unset($city);}}
if (isset($_POST['address']))      {$address = $_POST['address']; if ($address == '') {unset($address);}}
if (isset($_POST['place_working']))      {$place_working = $_POST['place_working']; if ($place_working == '') {unset($place_working);}}
if (isset($_POST['status']))      {$status = $_POST['status']; if ($status == '') {unset($status);}}
if (isset($_POST['date_birth']))      {$date_birth = $_POST['date_birth']; if ($date_birth == '') {unset($date_birth);}}
if (isset($_POST['email']))      {$email = $_POST['email']; if ($email == '') {unset($email);}}
if (isset($_POST['password']))      {$password = $_POST['password']; if ($password == '') {unset($password);}}
if (isset($_POST['date_enter']))      {$date_enter = $_POST['date_enter']; if ($date_enter == '') {unset($date_enter);}}


//while (list($name, $value) = each($HTTP_POST_VARS)) {
//echo "$name = $value<br>\n";
//}
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
 /*
echo "<br>";
 if (isset($id)) {echo "id ok";}else{echo "id no<>";}
echo "<br>";
	if( isset($login)){echo "login ok";}else{echo "login no";}
echo "<br>";
	if( isset($sex)){echo "sex ok";}else{echo "sex no";}
echo "<br>";
	if( isset($name)){echo "name ok";}else{echo "name no";}
echo "<br>";
	if( isset($surname)){echo "surname ok";}else{echo "surname no";}
echo "<br>";
	if( isset($patrname)){echo "patrname ok";}else{echo "patrname no";}
echo "<br>";
	if( isset($country)){echo "country ok";}else{echo "country no";}
echo "<br>";
	if( isset($phone)) {echo "phone ok";}else{echo "phone no";}
echo "<br>";
	if( isset($city)){echo "city ok";}else{echo "city no";}
echo "<br>";
	if( isset($address)){echo "addres ok";}else{echo "address no";}
echo "<br>";
	if( isset($place_working)) {echo "pl_w ok";}else{echo "pl_w no";}
echo "<br>";
	if( isset($status)) {echo "status ok";}else{echo "ststaus no";}
echo "<br>";
	if( isset($date_birth)) {echo "date_birth ok";}else{echo "date_birth no";}
echo "<br>";
	if( isset($email)) {echo "e_mail ok";}else{echo "e_mail no";}
echo "<br>";
	if( isset($password)) {echo "$login ok";}else{echo "$login no";}
echo "<br>";
	if( isset($date_enter)){echo "dateEn ok";}else{echo "dateEn no";}
	

*/

		 
	if (isset($id)  && isset($login) && isset($sex) && isset($name) && isset($surname) && isset($patrname) && isset($country) && isset($phone) && isset($city) && 
	isset($address) && isset($place_working) && isset($status) && isset($date_birth) && isset($email) && isset($password) && isset($date_enter))
{
/* Здесь пишем что можно заносить информацию в базу */




$result = mysql_query ("
UPDATE 
  `users`  
SET 
  `login` = '$login',
  `sex` = '$sex',
  `name` = '$name',
  `surname` = '$surname',
  `patrname` = '$patrname',
  `country` = '$country',
  `phone` = '$phone',
  `city` = '$city',
  `address` = '$address',
  `place_working` = '$place_working',
  `status` = '$status',
  `date_birth` = '$date_birth',
  `email` = '$email',
  `password` = '$password',
  `date_enter` = '$date_enter'
 
WHERE 
  `id` = '$id'
");

if ($result == 'true') {echo "<p>Ваш пользователь успешно обновлен!</p>";}
else {echo "<p>Ваш пользователь не обновлен!</p>";}


}		 
else 

{
echo "<p>Вы ввели не всю информацию, поэтом пользователь в базе не может быть обновлен.</p>";
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

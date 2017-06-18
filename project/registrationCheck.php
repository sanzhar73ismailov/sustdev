<?session_start();
include 'procedures/proc_for_test.php';
if(isset ($_POST['submit'])) {
    header('Content-Type: text/html; charset=utf-8');
    if(isset ($_POST['userSurname'])) {$userSurname=$_POST['userSurname'];}
    if(isset ($_POST['userName'])) {$userName=$_POST['userName'];}
    if(isset ($_POST['userPatronicName'])) {$userPatronicName=$_POST['userPatronicName'];}
    if(isset ($_POST['country'])) {$country=$_POST['country'];}
    if(isset ($_POST['city'])) {$city=$_POST['city'];}
    if(isset ($_POST['userPlaceWorking'])) {$userPlaceWorking=$_POST['userPlaceWorking'];}
    if(isset ($_POST['status'])) {$status=$_POST['status'];}
    if(empty ($_POST['day_birth'])
        or empty ($_POST['month_birth'])
        or empty ($_POST['year_birth'])) {
        $_POST['day_birth']=33;
        $_POST['month_birth']=55;
        $_POST['year_birth']=1;}
    else {$dateOfBirth=$_POST['year_birth']."-".$_POST['month_birth']."-".$_POST['day_birth'];}

    if(isset ($_POST['email'])) {$email=$_POST['email'];}
    if(isset ($_POST['password'])) {$password=$_POST['password'];}
    if(isset ($_POST['code_number'])) {$code_number=$_POST['code_number'];}
    if(isset ($_POST['sec_code'])) {$sec_code=$_POST['sec_code'];}
    if(isset ($_POST['login'])) {$login=$_POST['login'];}
    if(isset ($_POST['sex'])) {$sex=$_POST['sex'];}
    if(isset ($_POST['address'])) {$address=$_POST['address'];}
    if(isset ($_POST['phone'])) {$phone=$_POST['phone'];}

    if(isset($sec_code)) {$sec_code=trim($sec_code);}else {$sec_code="";}
    if(isset($userSurname)) {$userSurname=trim($userSurname);}else {$userSurname="";}
    if(isset($userName)) {trim($userName=$userName);}else {$userName="";}
    if(isset($userPatronicName)) {$userPatronicName=trim($userPatronicName);}else {$userPatronicName="";}
    if(isset($country)) {$country=trim($country);}else {$country="";}
    if(isset($city)) {$city=trim($city);}else {$city="";}
    if(isset($userPlaceWorking)) {$userPlaceWorking=trim($userPlaceWorking);}else {$userPlaceWorking="";}
    if(isset($status)) {$status=trim($status);}else {$status="";}
    if(isset($email)) {$email=trim($email);}else {$email="";}
    if(isset($login)) {$login=trim($login);}else {$login="";}
    if(isset($address)) {$address=trim($address);}else {$address="";}
    if(isset($phone)) {$phone=trim($phone);}else {$phone="";}

    if($code_number!=$sec_code) {

        exit("<p>Введенный код и код с картинки не совпадает, пожалуйста, введите заново.
<br><input type='button' value='Вернуться назад' name='back' onclick='javascript:history.go(-1);'/> ");
    }

    if(empty ($login) or empty ($userSurname) or empty($userName) or empty($country) or empty($city) or empty($userPlaceWorking) or empty($status) or empty($email)) {
        exit("<p>Вы ввели не всю информацию, вернитесь назад и заполните все поля.
<br><input type='button' value='Вернуться назад' name='back' onclick='javascript:history.go(-1);'/> ");
    }
        if(empty($address)) {
        exit("<p>Вы не ввели почтвый адрес, пожалуйста, вернитесь назад и заполните это поле.
<br><input type='button' value='Вернуться назад' name='back' onclick='javascript:history.go(-1);'/> ");
    }

    if(isset($dateOfBirth) && !checkdate($_POST['month_birth'], $_POST['day_birth'], $_POST['year_birth'])) {
        exit("<p>Вы ввели неправильную дату рождения, вернитесь назад и исправьте.
<br><input type='button' value='Вернуться назад' name='back' onclick='javascript:history.go(-1);'/> ");
    }
    include("blocks/bd.php");
    $resultCheckLogin=mysql_query("SELECT login from users WHERE login='$login'");
    $mr=mysql_fetch_array($resultCheckLogin);
    echo $mr['0'];
    if(mysql_num_rows($resultCheckLogin)>0) {
        exit("<p>Введенный логин уже используется, вернитесь назад и введите другой.
<br><input type='button' value='Вернуться назад' name='back' onclick='javascript:history.go(-1);'/> ");
    }



    $userSurname =htmlspecialchars(stripslashes(ucfirst_utf8($userSurname)));
    $userName = htmlspecialchars(stripslashes(ucfirst_utf8($userName)));
    $userPatronicName = htmlspecialchars(stripslashes(ucfirst_utf8($userPatronicName)));
    $country = htmlspecialchars(stripslashes(ucfirst_utf8($country)));
    $city = htmlspecialchars(stripslashes(ucfirst_utf8($city)));
    $userPlaceWorking = substr(htmlspecialchars(stripslashes($userPlaceWorking)),0,500);
    $status = substr(htmlspecialchars(stripslashes($status)),0,69);
    //  $dateOfBirth = substr(htmlspecialchars(stripslashes($dateOfBirth)),0,10);
    $email = substr(htmlspecialchars(stripslashes($email)),0,29);
    $login = substr(htmlspecialchars(stripslashes($login)),0,29);
    $address = substr(htmlspecialchars(stripslashes($address)),0,450);
    $phone =substr(htmlspecialchars(stripslashes($phone)),0,29);

    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Проверка данных</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>

    <body>

         <table width="850" border="0" align="center" bgcolor="#FFFFFF" class="main_border">
                <?php include("blocks/header.php"); ?>
            <tr>
             <td valign="top"><table width="100%" border="0" align="center">
                        <tr>
                            <td width="20%">&nbsp;</td>
                            <td align="left"><h3 align='center'>Проверьте Ваши данные:</h3>

                                <p >&nbsp;</p>

                                <form name="form_registrCheck" action="<? echo $PHP_SELF; ?>" method="POST">
                                    <table border="0" width="100%" cellspacing="1" cellpadding="1">
                                        <tr>
                                            <td>Фамилия:</td>
                                            <td><? print($userSurname."<p>"); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Имя:</td>
                                            <td><? print($userName."<p>"); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Отчество:</td>
                                            <td><? print($userPatronicName."<p>"); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Пол:</td>
                                            <td><?
                                                    if($sex==1) print("мужской"."<p>");
                                                    else print("женский"."<p>");
                                                    ?></td>
                                        </tr>
                                        <tr>
                                            <td>Страна проживания:</td>
                                            <td><? print($country."<p>"); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Город (область):</td>
                                            <td><? print($city."<p>"); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Почтовый адрес:</td>
                                            <td><? print($address."<p>"); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Место работы:</td>
                                            <td><? print($userPlaceWorking."<p>"); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Должность:</td>
                                            <td><? print($status."<p>"); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Дата рождения (дд-мм-гггг):</td>
                                            <td><? if(empty($dateOfBirth)) {print("не указано"."<p>");}
                                                else {print($_POST['day_birth']."-".$_POST['month_birth']."-".$_POST['year_birth']."<p>"); }?></td>
                                        </tr>
                                        <tr>
                                            <td>Эл. почта:</td>
                                            <td><? print($email."<p>"); ?></td>
                                        </tr>
                                                                                <tr>
                                            <td>Телефон:</td>
                                            <td><? if(empty($phone)) {print("не указано"."<p>");}
											        else{print($phone."<p>");} ?></td>
                                        </tr>
                                        <tr>
                                            <td>Логин:</td>
                                            <td><? print($login."<p>"); ?></td>
                                        </tr>

                                    </table>

                                    <input type="hidden" name="userSurname" value="<?echo $userSurname; ?>"/>
                                    <input type="hidden" name="userName" value="<?echo  $userName; ?>"/>
                                    <input type="hidden" name="userPatronicName" value="<?echo  $userPatronicName;?>"/>
                                    <input type="hidden" name="country" value="<?echo  $country;?>"/>
                                    <input type="hidden" name="city" value="<?echo  $city;?>"/>
                                    <input type="hidden" name="userPlaceWorking" value="<?echo  $userPlaceWorking;?>"/>
                                    <input type="hidden" name="status" value="<?echo  $status;?>"/>
                                    <input type="hidden" name="dateOfBirth" value="<?echo  $dateOfBirth;?>"/>
                                    <input type="hidden" name="email" value="<?echo  $email;?>"/>
                                    <input type="hidden" name="password" value="<?echo  $password;?>"/>
                                    <input type="hidden" name="login" value="<?echo  $login;?>"/>
                                    <input type="hidden" name="sex" value="<?echo  $sex;?>"/>
                                    <input type="hidden" name="address" value="<?echo  $address;?>"/>
                                    <input type="hidden" name="phone" value="<?echo  $phone;?>"/>
                                 <p> <input type='button' value='Назад' name='back' onclick='history.go(-1);'/>
                                        <input type="submit" name="save" value="Далее" /></p>


                                </form>



                            </td>
                        </tr>
                    </table></td>
            </tr>
            <tr>
                    <?php include("blocks/footer.php"); ?>
            </tr>
        </table>
    </body>

</html>

<? }

if(isset ($_POST['save'])) {
    if(isset ($_POST['userSurname'])) {$userSurname=$_POST['userSurname'];}
    if(isset ($_POST['userName'])) {$userName=$_POST['userName'];}
    if(isset ($_POST['userPatronicName'])) {$userPatronicName=$_POST['userPatronicName'];}
    if(isset ($_POST['country'])) {$country=$_POST['country'];}
    if(isset ($_POST['city'])) {$city=$_POST['city'];}
    if(isset ($_POST['userPlaceWorking'])) {$userPlaceWorking=$_POST['userPlaceWorking'];}
    if(isset ($_POST['status'])) {$status=$_POST['status'];}
    if(isset ($_POST['dateOfBirth'])) {$dateOfBirth=$_POST['dateOfBirth'];}
    if(isset ($_POST['email'])) {$email=$_POST['email'];}
    if(isset ($_POST['password'])) {$password=$_POST['password'];}
    if(isset ($_POST['login'])) {$login=$_POST['login'];}
    if(isset ($_POST['sex'])) {$sex=$_POST['sex'];}
	if(isset ($_POST['address'])) {$address=$_POST['address'];}
    if(isset ($_POST['phone'])) {$phone=$_POST['phone'];}

    if(empty($dateOfBirth)) {$dateOfBirth="0000-00-00";}
	if(empty($phone)) {$phone="-";}

    include("blocks/bd.php");

    //    $result2 = mysql_query("select current_user",$db);
    $result2 = mysql_query("INSERT INTO users (
                            `id`,
                            `login`,
                            `sex`,
                            `name`,
                            `surname`,
                            `patrname`,
                            `country`,
                            `city`,
							`address`,
							`phone`,
                            `place_working`,
                            `status`,
                            `date_birth`,
                            `email`,
                            `password`,
                            `date_enter`
                            )
                            VALUES (
                             NULL,
                            '$login',
                            '$sex',
                            '$userName',
                            '$userSurname',
                            '$userPatronicName',
                            '$country',
                            '$city',
							'$address',
							'$phone',
                            '$userPlaceWorking',
                            '$status',
                            '$dateOfBirth',
                            '$email',
                            '$password',
                            current_timestamp()
                            )",$db);




    if($result2) {
         $result5 = mysql_query("SELECT id,login,name,surname,password FROM users WHERE login = '$login'", $db);
       if($result5) {
         $myrow5=mysql_fetch_array($result5);
         $_SESSION['login'] = $myrow5['login'];
         $_SESSION['user_id'] = $myrow5['id'];
         $_SESSION['user_surname_name'] = $myrow5['surname']." ".$myrow5['name'];
	echo '
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Подтверждение регистрации</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>

    <body bgcolor=blue>

         <table width="850" border="0" align="center" bgcolor="#FFFFFF" class="main_border">';
                include("blocks/header.php"); 
	echo '
				            <tr>
             <td valign="top"><table width="100%" border="0" align="center">
                        <tr>
 
';	 	

echo '<td  valign="top">';
             
    
       echo   ("<p align='center'>$_SESSION[user_surname_name], Ваша регистрация прошла успешно!<p>&nbsp;
	   </p><br>На Ваш  email отправлено письмо с подтверждением Вашей регистрации</br>");
       echo  "<p align='center'>Ваш логин - ".$_SESSION['login']."</p>";
       echo  "<p align='center'>Ваш пароль - ".$myrow5['password']."</p><p>Можете перейти на главную страницу и начинать курс обучения.</p>";
        
       }else{echo "Запрос по пользователю не прошел, обратитесь к админу!".mysql_error();}
       

        $to=$email;
        $subject="Вы зарегистрировались на www.SustEdu.kz";
	  $subject.=" - mail from www.SustEdu.kz";

        $message='

Здравствуйте, '.$userName.' '.$userSurname.'.

Благодарим Вас за регистрацию на сайте курса обучения устойчивому развитию!
Ваши регистрационные данные:
  Логин: '.$login.' 
  Пароль: '.$password.'
Теперь Вы можете пройти обучающий курс и при успешном тестировании получить сертификат!
Для перехода на наш сай пройдите по ссылке http://www.sustdevedu.kz
С уважением,
  Служба поддержки сайта SustDevEdu
  ==================================
  Координаты для контактов:
  Тел. +7(727) 255 62 99;  255 75 45
  Факс: +7(727) 255 55 61
  050036, Республика Казахстан, г. Алматы,
  мкрн. Астана, д. 10а.
  Центр охраны здоровья и экопроектирования
  E-mail: chp@chp.kz
  http://www.chp.kz/
Представительство в Астане:
  +7(7172) 397487

==================================
Это письмо сгенерировано автоматически и не требует Вашего ответа.
';

$notif_for_admin='Здравствуйте, admin.
Уведомляем, что '.$userName.' '.$userSurname.'.
Зарегистировался(сь) на вашем сайте.


Регистрационные данные пользователя:
  Логин: '.$login.' 
  Пароль: '.$password.'

Для просмотра его данных пройдите по ссылке http://www.sustdevedu.kz/admin/view_user.php#'.$_SESSION['user_id'].'';
$subject_for_admin = 'Новый  пользователь ('.$_SESSION[user_surname_name].') зарегистрировался на вашем сайте';
$to_admin = 'sanzhar73@mail.ru';

/* $headers = "Content-type: text/html; charset=\"utf-8\" \r\n";
$headers .= "From: <admin@sustdevedu.com>\r\n";
$headers .="Subject: $subject";
$headers .= "Bcc: sanzhar73@mail.ru\r\n";

 */

//$mail_sent= mail($address,$subject,$message,"Content-type:text/plain; Charset=utf-8\r\n");

 //mail to user
 send_mime_mail('Сайт курса по устойчивому развитию',
               'admin@sustdevedu.com',
			     $_SESSION[user_surname_name],
                 $to,
                'UTF-8',  // кодировка, в которой находятся передаваемые строки
               'KOI8-R', // кодировка, в которой будет отправлено письмо
               $subject,
               $message); 

 
		   
	 //mail to admin about user registration
 send_mime_mail('Сайт курса по уст развитию',
               'admin@sustdevedu.com',
               'Админ www.SustDevEdu.kz',
               $to_admin,
               'UTF-8',  // кодировка, в которой находятся передаваемые строки
               'KOI8-R', // кодировка, в которой будет отправлено письмо
               $subject_for_admin,
               $notif_for_admin); 
	

 send_mime_mail('Сайт курса по уст развитию',
               'admin@sustdevedu.com',
               'Админ www.SustDevEdu.kz',
               'goncharova.2004@mail.ru',
               'UTF-8',  // кодировка, в которой находятся передаваемые строки
               'KOI8-R', // кодировка, в которой будет отправлено письмо
               $subject_for_admin,
               $notif_for_admin); 
		
	
	
	


        ?>
<p align="center"><input type="button" value="На главную страницу" name="buttonComplete" size="10" onclick="window.location.replace('index.php');"/></p>

<p>&nbsp;<p>&nbsp;<p>&nbsp;<p>&nbsp;<p>&nbsp;<p>&nbsp;
 </td>
                        </tr>
                    </table></td>
            </tr>
            <tr>
                    <?php include("blocks/footer.php"); ?>
            </tr>
        </table>
    </body>

</html>
    <?
    } else {echo "Регистрация не прошла, обратитесь к админу!".mysql_error();}
}

?>



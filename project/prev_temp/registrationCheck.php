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

    if(isset($sec_code)) {trim($sec_code);}else {$sec_code="";}
    if(isset($userSurname)) {trim($userSurname);}else {$userSurname="";}
    if(isset($userName)) {trim($userName);}else {$userName="";}
    if(isset($userPatronicName)) {trim($userPatronicName);}else {$userPatronicName="";}
    if(isset($country)) {trim($country);}else {$country="";}
    if(isset($city)) {trim($city);}else {$city="";}
    if(isset($userPlaceWorking)) {trim($userPlaceWorking);}else {$userPlaceWorking="";}
    if(isset($status)) {trim($status);}else {$status="";}
    if(isset($email)) {trim($email);}else {$email="";}
    if(isset($login)) {trim($login);}else {$login="";}

    if($code_number!=$sec_code) {

        exit("<p>Введенный код и код с картинки не совпадает, пожалуйста, введите заново.
<br><input type='button' value='Вернуться назад' name='back' onclick='javascript:history.go(-1);'/> ");
    }

    if(empty ($login) or empty ($userSurname) or empty($userName) or empty($country) or empty($city) or empty($userPlaceWorking) or empty($status) or empty($email)) {
        exit("<p>Вы ввели не всю информацию, вернитесь назад и заполните все поля.
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



    $userSurname =substr(htmlspecialchars(stripslashes($userSurname)),0,29);
    $userName = substr(htmlspecialchars(stripslashes($userName)),0,19);
    $userPatronicName = substr(htmlspecialchars(stripslashes($userPatronicName)),0,29);
    $country = substr(htmlspecialchars(stripslashes($country)),0,29);
    $city = substr(htmlspecialchars(stripslashes($city)),0,29);
    $userPlaceWorking = substr(htmlspecialchars(stripslashes($userPlaceWorking)),0,100);
    $status = substr(htmlspecialchars(stripslashes($status)),0,69);
    //  $dateOfBirth = substr(htmlspecialchars(stripslashes($dateOfBirth)),0,10);
    $email = substr(htmlspecialchars(stripslashes($email)),0,29);
    $login = substr(htmlspecialchars(stripslashes($login)),0,29);


    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Проверка данных</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>

    <body>

        <table width="690" border="1" align="center" bgcolor="#FFFFFF" class="main_border">
                <?php include("blocks/header.php"); ?>
            <tr>
                <td valign="top"><table width="100%" border="1">
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
                                    <p> <input type='button' value='Назад' name='back' onclick='javascript:self.back();'/>
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

    if(empty($dateOfBirth)) {$dateOfBirth="0000-00-00";}

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
        echo   ("$_SESSION[user_surname_name], Ваша регистрация прошла успешно!<br>");
        echo  "Ваш логин - ".$_SESSION['login']."<br>";
        echo  "Ваш пароль - ".$myrow5['password']."<br>";
        
       }else{echo "Запрос по пользователю не прошел, обратитесь к админу!".mysql_error();}
       

        $address=$email;
        $subject="Вы зарегистрировались на сайте www.SustEdu.kz";

        $message="Здравствуйте, $userName $userSurname!".
            "\n\nБлагодарим Вас за регистрацию на сайте курса обучения устойчивому развитию!".
            "\n\nВаши регистрационные данные:\nЛогин: $login \nПароль: $password".
            "\n\nТеперь Вы можете пройти обучающий курс и при успешном тестировании получить сертификат!".
            "\n\nДля перехода на наш сай пройдите по ссылке http://sustdevedu.kz".
            "\n\nС уважением,\nСлужба поддержки сайта SustDevEdu\n==================================".
            "\nКоординаты для контактов:".
            "\nТел.    +7(727) 255 62 99;  255 75 45".
            "\nФакс: +7(727) 255 55 61".
            "\n050036, Республика Казахстан, г. Алматы,".
            "\nмкрн. Астана, д. 10а.".
            "\nЦентр охраны здоровья и экопроектирования".
            "\nE-mail: chp@chp.kz".
            "\nhttp://www.chp.kz/".
            "\n\nПредставительство в Астане:".
            "\n+7(7172) 393487".
            "\n\n\n==================================".
            "\n\nЭто письмо сгенерировано автоматически и не требует Вашего ответа.";


        $mail_sent= mail($address,$subject,$message,"Content-type:text/plain; Charset=utf-8\r\n");

        //echo $mail_sent ? "Mail sent" : "Mail failed";








        ?>
<input type="button" value="На главную страницу" name="buttonComplete" size="10" onclick="window.location.replace('index.php');"/></p>
    <?
    } else {echo "Регистрация не прошла, обратитесь к админу!".mysql_error();}
}

?>



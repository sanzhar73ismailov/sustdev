
<td width="182" valign="top" class="left">
    <?php
//    session_destroy();

    $text = "
 <form name='form_registr' action='index.php' method='POST'>
    <table border='0'>
<tr><td><p>Логин: </td><td><input type='text' name='login' value='' size='17' /></td></tr>
<tr><td><p>Пароль:</td><td><input type='password' name='userPassword' value='' size='17' /></td></tr>
<tr><td><p><a href='registration.php'>Регистрация</a></td><td>&nbsp;</td></tr>
<tr><td><p><input type='submit' name='submit' value='Войти' /></td><td>&nbsp;</td></tr>
</table>
</form>";

    if (($_SESSION['login'])) {
        echo "<div class='loginMess'><br>Вы зашли как:</br>
		<br> <div class='nav_user'>$_SESSION[user_surname_name]</div></br>";
        ?>
        [ <a href='login.php?logout=1' onclick='return confirm("Выйти?")';>Выход</a> ]</div></br>

<?
        echo "<p>&nbsp;</p><div class='nav_title'>Обучение</div>";
        $result2=mysql_query("select * FROM  modules order by id",$db);

        if(!$result2) {
            echo "<p>Запрос в базу не прошел, напишите об этом админу (sanzhar73@mail.ru).<br><strong>Код ошибки:</strong></p>";
            exit(mysql_error());
        }
        if(mysql_num_rows($result2)>0) {

            $myrow_for_lessons=mysql_fetch_array($result2);
			echo "<div class='mod_block'>";
            do {
                printf("<p><a class='nav_link' href = 'view_modules.php?module=%s'>%s</a></p>",$myrow_for_lessons["id"],$myrow_for_lessons["title"]);
            }
            while ($myrow_for_lessons=mysql_fetch_array($result2));
echo "</div>";
        }
        else {
            echo "<p> Информация не может быть извлечена, в таблице нет записей</p>";
            exit();
        }
/*
        echo "<div class='nav_title'>Тестирование</div>";

        $result3=mysql_query("select * FROM  modules",$db);

        if(!$result2) {
            echo "<p>Запрос в базу не прошел, напишите об этом админу (sanzhar73@mail.ru).<br><strong>Код ошибки:</strong></p>";
            exit(mysql_error());
        }
        if(mysql_num_rows($result2)>0) {

            $myrow_for_testings=mysql_fetch_array($result3);

            do {
                printf("<p><a class='nav_link' href = 'view_test_modules.php?module=%s'>%s</a></p>",$myrow_for_testings["id"],$myrow_for_testings["title"]);
            }
            while ($myrow_for_testings=mysql_fetch_array($result3));

        }
        else {
            echo "<p> Информация не может быть извлечена, в таблице нет записей</p>";
            exit();
        }

*/

    }


    else {
        echo $text;

        if($_POST['submit']) {
            if(empty ($_POST['userPassword']) or empty ($_POST['login'])) {
                echo "<font color='red'>введите логин и пароль!</font>";

            }

            $result = mysql_query("SELECT id,login,name,surname,password FROM users WHERE login = '$_POST[login]'", $db);

            if(mysql_num_rows($result)>0) {
                $myrow=mysql_fetch_array($result);
            }
            else {
                echo "<p> Пользователь под таким логином не зарегестрирован!</p>";
                exit();
            }

            if($myrow['password']==$_POST['userPassword']) {
                $_SESSION['login'] = $myrow['login'];
                $_SESSION['user_id'] = $myrow['id'];
                $_SESSION['user_surname_name'] = $myrow['surname']." ".$myrow['name'];
                    echo "<html><head>
                        <meta http-equiv='Refresh' content='0; URL=index.php'>
                        </head></html>";
              exit();

            }
            else {
                echo "Проверьте логин и пароль, авторизация не прошла или зарегестрируйтесь!";
            }

        // echo iconv("UTF-8", "windows-1251", $text);
        }
    }

    ?>
    <div class="nav_title">
  <p class="стиль1">Организаторы курса</p>
    </div>
<table align="center" border="0" width="100">
        <tr>
            <td><a class="org_link" href="http://www.eco.gov.kz/" title="Нажмите для перехода на сайт Министерства охраны охраны окружающей среды Республики Казахстан"><img src="img/logo_moos.png" width="100" height="106" alt="логотип Министерства охраны охраны окружающей среды Республики Казахстан"/></a></td>
    </tr>
        <tr>
            <td><a href="http://www.chp.kz/" title="Нажмите для перехода на сайт Центра охраны здоровья и экопроектирования"><img src="img/chp_kz.jpg" width="100" height="50" alt="логотип ЦОЗиЭП"/>
                </a></td>
        </tr>
    </table>


</td>
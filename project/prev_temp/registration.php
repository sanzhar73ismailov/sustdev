  <?php include("blocks/bd.php");
  include("procedures/proc_for_test.php");
  $result=mysql_query("select title, meta_d,meta_k,text FROM  settings WHERE page='registration'",$db);

  if(!$result) {
      echo "<p>Запрос в базу не прошел, напишите об этом админу (admin@mail.ru).<br><strong>Код ошибки:</strong></p>";
      exit(mysql_error());
  }
  if(mysql_num_rows($result)>0) {
      $myrow=mysql_fetch_array($result);
  }
  else {
      echo "<p> Информация не может быть извлечена, в таблице нет записей</p>";
      exit();
  }
  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $myrow["title"]; ?></title>
        <link href="style.css" rel="stylesheet" type="text/css" />
        <meta name="description" content="<?php echo $myrow["meta_d"]; ?>" />
        <meta name="keywords" content="<?php echo $myrow["meta_k"]; ?>" />
        <script type="text/javascript" src="procedures/forRegistrationCheck.js"></script>
           


    </head>

    <body>
        <table width="690" border="1" align="center" bgcolor="#FFFFFF" class="main_border">
              <?php include("blocks/header.php"); ?>
            <tr>
                <td valign="top"><table width="100%" border="1">
                        <tr>
                            <?php include("blocks/lefttd.php"); ?>
                            <td align="left" valign="top"><?php echo $myrow["text"];  ?>

                                <form name="form_registr" action="registrationCheck.php" method="POST" onsubmit="return checkForm(this);">
                                    <table border="0" width="100%" cellspacing="1" cellpadding="1">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td >Фамилия</td>
                                                <td  align=right><b class="regZvesd">*</b>&nbsp;</td><td><input type="text" name="userSurname" value="" size="20" maxlength="30"/></td>
                                            </tr>
                                            <tr>
                                                <td>Имя</td>
                                                <td  align=right><b class="regZvesd">*</b>&nbsp;</td><td><input type="text" name="userName" value="" size="20"  maxlength="20"/></td>
                                            </tr>
                                            <tr>
                                                <td>Отчество</td>
                                                <td  align=right><b class="regZvesd">&nbsp;</b>&nbsp;</td><td><input type="text" name="userPatronicName" value="" size="20"   maxlength="30"/></td>
                                            </tr>
                                            <tr>
                                                <td>Ваш пол</td>
                                                <td  align=right><b class="regZvesd">*</b>&nbsp;</td>
                                                <td><span><input id="field_gender_1" value="1" type="radio" name="sex" onchange="sex.value=1;">
                                                            <label for="field_gender_0">Мужской &nbsp;&nbsp;</label>
                                                            <input id="field_gender_2" value="0" type="radio" name="sex"  onchange="sex.value=0;">
                                                                <label for="field_gender_1">Женский &nbsp;&nbsp;</label></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Страна проживания</td>
                                                                    <td  align=right><b class="regZvesd">*</b>&nbsp;</td><td><input type="text" name="country" value="Казахстан" size="20"   maxlength="30"/></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Город (область)</td>
                                                                    <td  align=right><b class="regZvesd">*</b>&nbsp;</td><td><input type="text" name="city" value="" size="20"    maxlength="30"/></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Место работы</td>
                                                                    <td  align=right><b class="regZvesd">*</b>&nbsp;</td><td><textarea name="userPlaceWorking" rows="3" cols="50">
                                                                        </textarea></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Должность</td>
                                                                    <td  align=right><b class="regZvesd">*</b>&nbsp;</td><td><input type="text" name="status" value="" size="50" maxlength="50"/></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>День рождения</td>
                                                                    <td align=right><b class="regZvesd">&nbsp;</b>&nbsp;</td><td>
                                                                        день<? echo $daysList;//$day_brth ?>
                                                                        месяц<? echo $monthsList;//$day_brth ?>
                                                                        год<? echo $yearsList;//$day_brth ?>
                                                                    </td>
                                                                    <!--td  align=right><b class="regZvesd">&nbsp;</b>&nbsp;</td><td><input type="text" name="dateOfBirth" value="" size="20"    maxlength="10" id="dateOfBirth"/> (дд-мм-гггг)</td-->
                                                                </tr>
                                                                <tr>
                                                                    <td>E-mail</td>
                                                                    <td  align=right><b class="regZvesd">*</b>&nbsp;</td><td><input type="text" name="email" value="" size="20"   maxlength="30" id="email" /></td>

                                                                </tr>
                                                                <tr>
                                                                    <td valign="top">Логин</td>
                                                                    <td  align=right valign="top"><b class="regZvesd">*</b>&nbsp;</td><td><input type="text" name="login" value="" size="20"  maxlength="20"/><br>
                                                                            <div class="registrationComment">Логин - это уникальное короткое имя, необходимое для входа на сайт. Комбинация логина и пароля являются пропуском к Вашему профилю.</div>
                                                                        </br></td>
                                                                </tr>
                                                                <tr>
                                                                    <td valign="top" >Пароль</td>
                                                                    <td  align="right"  valign="top"><b class="regZvesd">*</b>&nbsp;</td><td><input type="password" name="password" value="" size="20"   maxlength="30" id="password" /><br>
                                                                            <div class="registrationComment">в пароле нельзя использовать кириллицу. Длина пароля должна быть не менее четырёх символов. Не выбирайте слишком простой пароль, его могут легко подобрать и воспользоваться вашим аккаунтом.</div>
                                                                        </br></td>

                                                                </tr>
                                                                <tr>
                                                                    <td>Повторите пароль</td>
                                                                    <td  align="right"><b class="regZvesd">*</b>&nbsp;</td><td><input type="password" name="password2" value="" size="20"   maxlength="30" id="password2" /></td>

                                                                </tr>

                                                                </tbody>
                                                                </table>
                                                                <table>
                                                                    <tr><? $number = insertCodeImage(); ?>
                                                                        <td>Код:</td>
                                                                        <td><img src ="code.png" width="70" height="50" alt="Включите эту картинку для отображения кода безопасности" border="0" alt="" />
                                                                            <a href="javascript:window.location.reload();">обновить если не виден код</a></td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td>Введите код:</td>
                                                                        <td><input type="text" name="sec_code" id="sec_code" style="width:115px" /></td>
                                                                    </tr>
                                                                </table>
                                                                <div class="registrationComment">* Поля, помеченные звездочкой обязательны для заполнения.</div>



                                                                <p><input type="submit" name="submit" value="Далее" /></p>
                                                                <input type="hidden" name="code_number" value="<? echo $number;?>" />
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

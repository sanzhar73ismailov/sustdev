<?php


    $text = " <form name='form_registr' action='index.php' method='POST'>
    <p>имя:  <input type='text' name='login' value='' size='20' /></p>
    <p>пароль:  <input type='password' name='userPassword' value='' size='20' /></p>
<a href='registration.php'>Регистрация</a>
    <p>пароль:  <input type='submit' name='submit' value='Ввойти' /></p>
</form>";
 
    
    echo iconv("UTF-8", "windows-1251", $text);



?>

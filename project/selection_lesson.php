<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
// session_destroy();

        echo <<<TEXT


<form name="form_registr3" action="index.php" method="GET">
    <p>имя:  <input type="text" name="userName1" value="" size="20" /></p>
    <p>пароль:  <input type="password" name="userPassword" value="" size="20" /></p>

    <p>пароль:  <input type="submit" name="submit" value="Ввойти" /></p>




</form>


TEXT;




       echo "Please select the lesson:
<p><a href='test_rout.php?less=1'>Lesson 1</a>
<p><a href='test_rout.php?less=2'>Lesson 2</a>
<p><a href='test_rout.php?less=3'>Lesson 3</a>
<p><a href='test_rout.php?less=4'>Lesson 4</a>
<p><a href='test_rout.php?less=5'>Lesson 5</a>
<p><a href='test_rout.php?less=6'>Lesson 6</a>
<p><a href='test_rout.php?less=7'>Lesson 7</a>
<p><a href='test_rout.php?less=8'>Lesson 8</a>
<p><a href='test_rout.php?less=9'>Lesson 9</a>
<p><a href='test_rout.php?less=10'>Lesson 10</a>


";


        ?>
    </body>
</html>

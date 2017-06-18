<?session_start();

header('Content-Type: text/html; charset=utf-8');
if(isset ($_GET['logout'])){$logout=$_GET['logout'];}


if ($logout==1){
    $name_sur=$_SESSION['user_surname_name'];
    unset($_SESSION['login']);
     session_destroy();
exit("<h1>$name_sur!<h1>
<p> Cпасибо, что посетили наш сайт. До следующей встречи!</p>
<p><a href='index.php'>На главную страницу</a></p>
");}
else {echo "<script>window.open('index.php');</script>";}
?>



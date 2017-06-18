<?php include("blocks/bd.php");

if(isset ($_POST['author'])) {$author=$_POST['author'];}
if(isset ($_POST['text'])) {$text=$_POST['text'];}
if(isset ($_POST['pr'])) {$pr=$_POST['pr'];}
if(isset ($_POST['subcom'])) {$subcom=$_POST['subcom'];}
if(isset ($_POST['id'])) {$id=$_POST['id'];}

if(isset ($subcom)) {

    if(isset($author)) {trim($author);}else {$author="";}
    if(isset($text)) {trim($text);}else {$text="";}
    if(empty ($author) or empty($text)) {
        exit("<p>Вы ввели не всю информацию, вернитесь назад и заполните все поля.
<br><input type='button' value='Вернуться назад' name='back' onclick='javascript:self.back();'/> ");
    }

    $author = stripslashes($author);
    $text = stripslashes($text);
    $author = htmlspecialchars($author);
    $text = htmlspecialchars($text);

    $result = mysql_query("SELECT sum FROM comments_setting",$db);
    $myrow = mysql_fetch_array($result);

    if($pr == $myrow['sum']) {
        $result2 = mysql_query("INSERT INTO comments (post,author, text, date)
                    VALUES ('$id','$author','$text',current_date)",$db);

        $address="sanzhar73@mail.ru";
        $subject="проверочка";
        $result3 = mysql_query("SELECT title from data WHERE id='$id'", $db);
        $myrow3 = mysql_fetch_array($result3);
        $post_title = $myrow3["title"];
        $message="Появился комментарий к заметке - \"".$post_title.
        "\"\nКомментарий добавил(а): ".$author."\nТекст комментария: \"".$text.
        "\"\nСсылка на заметку: http://localhost/phpblog/view_post.php?id=".$id."";
        $mail_sent= mail($address,$subject,$message,"Content-type:text/plain; Charset=utf-8\r\n");

        //echo $mail_sent ? "Mail sent" : "Mail failed";

        echo "<html><head>
            <meta http-equiv='Refresh' content='0; URL=view_post.php?id=$id'>
            </head></html>";
        exit();


    }
    else {exit("<p>Вы ввели неверную сумму цифр с картинки на предыдущей странице.
<br><input type='button' value='Вернуться назад' name='back' onclick='javascript:self.back();'/> ");}
}
?>

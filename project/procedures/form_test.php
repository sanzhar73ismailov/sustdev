

<?
echo '<div class="test_form">'; 
                //GENERAL PART

//poluchenie nomera tekushego voprosa
$question_id_current = returnIdOfCurrentQuestion($_SESSION['howMuchPassed'],$_SESSION['lessonNumber']);
// 1. poluchaem tekushii vopros
$question =returnStringFromBDTable("question",$question_id_current);
// 2. Poluchaem nomer pravil otveta
$writeAnswer=returnStringFromBDTable("answer_id",$question_id_current);

$resultQuest=mysql_query("SELECT answer_id, text FROM answers WHERE test_id= $question_id_current", $db);



if(!$resultQuest) {exit("Такого ответов нет в БД, обратитесь к админу!");}
$myrowQuest= mysql_fetch_array($resultQuest);
echo "
<h2>$question</h2>

        <form action='test_rout.php' method='post' name='form_test'><p>Выберите правильный вариант:</p>
";

            do {
                printf("
               <p><label><input type='radio' name='RadioGroup1' value='%s'>
                    %s</label>",
                    $myrowQuest['answer_id'],$myrowQuest['text']);
            }
            while($myrowQuest= mysql_fetch_array($resultQuest));

echo <<<TEXT
            <input type='hidden' name='writeId' value=$writeAnswer />
            <p> <input name='action' type='submit' value='Далее'></p>
            <p><input name='' type='reset' value='Сброс'></p>


        </form>
TEXT;
echo '</div>'; 
?>
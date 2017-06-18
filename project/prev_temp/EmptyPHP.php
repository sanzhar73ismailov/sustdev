?>

<table width="800px" border="1" cellspacing="10" cellpadding="10">
    <thead>
        <tr>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>header.php</td>
        </tr>
        <tr>
            <td height="70px" valign="top">
                <?
               require 'test_obrabotka.php';
                ?>
            </td>

        </tr>
        <tr>
            <td valign="top">
                <?
                //GENERAL PART

//poluchenie nomera tekushego voprosa
$question_id_current = returnIdOfCurrentQuestion($howMuchPassed,$lessonNumber);
// 1. poluchaem tekushii vopros
$question =returnStringFromBDTable("question",$question_id_current);
// 2. Poluchaem nomer pravil otveta
$writeAnswer=returnStringFromBDTable("answer_id",$question_id_current);


$resultQuest=mysql_query("SELECT answer_id, text FROM answers WHERE test_id= $question_id_current", $db);



if(!$resultQuest) {exit("Такого ответов нет в БД, обратитесь к админу!");}
$myrowQuest= mysql_fetch_array($resultQuest);
?>


        <h2>The question: <? echo $question; ?> </h2>

        <form action='test_rout.php' method='post' name='form_test'><p>Choose variant</p>
            <?
            do {
                printf("
               <p><label><input type='radio' name='RadioGroup1' value='%s'>
                    %s</label>",
                    $myrowQuest['answer_id'],$myrowQuest['text']);
            }
            while($myrowQuest=mysql_fetch_array($resultQuest));
            ?>
            <input type='hidden' name='writeId' value='$writeAnswer' />
            <p> <input name='action' type='submit' value='GO'></p>
            <p><input name='' type='reset' value='Reset'></p>


        </form>
            </td>
            <td valign="top">
              <? while (list ($name, $value) = each($HTTP_POST_VARS)){
                  echo "$name = $value<br>\n";

                }
                   while (list ($name1, $value1) = each($GLOBALS)){
                  echo "$name1 = $value1<br>\n";

                }

                ?>
            </td>
        </tr>
        <tr>
            <td>

                </td>
        </tr>
    </tbody>
</table>






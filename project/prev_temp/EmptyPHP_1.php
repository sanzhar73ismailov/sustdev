<?php

  include("blocks/bd.php");
  include("procedures/proc_for_test.php");
function insertCodeImageTemp($path) {
    $img = imagecreatetruecolor(70, 50);

    $number_string  = mt_rand(500, 100000);


    $number_bg  = mt_rand(1, 5);
    $number_font  = mt_rand(1, 3);
    if($img) {

        $blueLight=imagecolorallocate($img, 108, 186,225);
        $blue=imagecolorallocate($img, 108, 186,225);
        $yellow=imagecolorallocate($img, 255, 250,0);
        $white = imagecolorallocate($img, 255, 255, 255);


        $blue_font=imagecolorallocate($img, 20, 28,172);
        $green_font=imagecolorallocate($img, 0, 255,0);
        $gray_font=imagecolorallocate($img, 128, 128,128);

        switch($number_bg) // переключающее выражение
        {
            case 1: // константное выражение 1
                $colour_bg=$blueLight; // блок операторов
                break;
            case 2: // константное выражение 2
                $colour_bg=$blue;
                break;
            case 3: // константное выражение 2
                $colour_bg=$yellow;
                break;
            case 4: // константное выражение 2
                $colour_bg=$white;
                break;
            default:
                $colour_bg=$blueLight;
        }
        switch($number_font) // переключающее выражение
        {
            case 1: // константное выражение 1
                $colour_font=$blue_font; // блок операторов
                break;
            case 2: // константное выражение 2
                $colour_font=$green_font; // блок операторов
                break;
            case 3: // константное выражение 2
                $colour_font=$gray_font; // блок операторов
                break;
            default:
                $colour_bg=$blue_font;
        }


        imagefill($img, 0, 0, $colour_bg);
        imagestring($img, 5, 10, 20, $number_string, $colour_font);

        $umageurl=($number_string+mt_rand(5, 10000000)).".png";
        $arrayValueName[]=$number_string;
        $arrayValueName[]=$umageurl;

        chdir($path);
        imagepng($img,$umageurl);
        chdir("..");
        chdir("..");
    }
    return $arrayValueName;
}


if($_POST['go']){

for($i=0;$i<2000;$i++){
$path = "img/pngs";
$arrayValueName=insertCodeImageTemp($path);
$pathAndFile = "img/pngs/".$arrayValueName[1];
//print("\$arrayValueName Val = ". $arrayValueName[0]."<br>");
//print("\$arrayValueName Name = ". $arrayValueName[1]."<br>");


$result=mysql_query("insert into pngs values (null,'$pathAndFile','$arrayValueName[0]')",$db);
if(!$result){echo mysql_error();}
$result2=mysql_query("select * from pngs order by id desc limit 1",$db);
$myrow=mysql_fetch_array($result2);
//echo"pressed";
//echo "<img src='$myrow[path]'>";
//if($myrow['value']==$arrayValueName[0]){echo "yes";}
}

}
else{echo "button not pressed";}



?>
<form action="<? echo $PHP_SELF; ?>" method="POST">
    <input type="submit" value="go" name="go" />
</form>
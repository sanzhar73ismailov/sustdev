<?php
header ('Content-type: text/html; charset=utf-8');

include("../procedures/proc_for_test.php");

if (isset($_POST['check']) && !empty($_POST['check'])) {
    echo htmlspecialchars(ucfirst_utf8($_POST['check']));
} else {
    echo htmlspecialchars(ucfirst_utf8('Žąsinų'));
}

/*
function ucfirst_utf8($str) {
    if (mb_check_encoding($str,'UTF-8')) {
        $first = mb_substr(
            mb_strtoupper($str, "utf-8"),0,1,'utf-8'
        );
        return $first.mb_substr(
            mb_strtolower($str,"utf-8"),1,mb_strlen($str),'utf-8'
        );
    } else {
        return $str;
    }
}
*/
?>
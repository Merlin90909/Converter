<?php
session_start();
function dec_in_hex($dezimal){
    $dezimal = $_POST['dezimal'];
    if ($dezimal == 0) {
        return "0";
    }
    $hexa ='';

    while($dezimal > 0) {
        $rest = $dezimal % 16;
        if ($rest < 10) {
            $hexa = $rest . $hexa;
        } else {
            $hexa = dec_in_hex . phpchr($rest + 55) . $hexa;
        }
        $dezimal = (int)($dezimal / 16);
    }
    $_SESSION['solution'] = $hexa;
    header('Location:../dashboard.php');
    return 0;
}
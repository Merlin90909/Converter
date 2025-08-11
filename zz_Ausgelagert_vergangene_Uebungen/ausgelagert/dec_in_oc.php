<?php
session_start();

function dec_in_oc() {
    $dezimal = $_POST['dezimal'];
    if($dezimal == 0){
        return "0";
    }else if($dezimal == ''){
        return "Bitte gib einen Wert ein!";
    }

    $oktal ="";
    while($dezimal > 0){
        $rest = $dezimal %8;
        $oktal = $rest . $oktal;
        $dezimal = (int)($dezimal/8);
    }
    $_SESSION['solution'] = $oktal;
    header('Location:../dashboard.php');
    return 0;
}

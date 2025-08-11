<?php
session_start();

function bin_in_dec(){
    $dezimal = $_POST['dezimal'];
    if ($dezimal == 0) {
        return "0";
    }

    $binaer = "";
    while ($dezimal > 0) {
        $rest = $dezimal % 2;
        $binaer = $rest . $binaer;
        $dezimal = (int)($dezimal / 2);
    }
    $_SESSION['solution'] = $binaer;
    header('Location:../dashboard.php');
    return 0;
}


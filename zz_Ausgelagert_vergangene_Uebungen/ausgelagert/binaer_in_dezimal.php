<?php
session_start();

function bin_in_dec($bin){
    $bin = $_POST['binaer'];
    $decimal = 0;
    $length = strlen($bin);
    for ($i = 0; $i < $length; $i++) {
        $decimal += (int)$bin[$i] * pow(2, $length - 1 - $i);
    }
    $_SESSION['solution']= $decimal;
    header('Location:../dashboard.php');
}



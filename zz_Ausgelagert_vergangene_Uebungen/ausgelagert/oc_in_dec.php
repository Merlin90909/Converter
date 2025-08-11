<?php
session_start();
$octal = $_POST['octal'];
$dezimal =0;

$length = strlen($octal);
for($i=0; $i<$length; $i++){
    $dezimal += (int)$octal[$i] * pow(8,$length-$i-1);
}
$_SESSION['solution'] = $dezimal;
header('Location:../dashboard.php');
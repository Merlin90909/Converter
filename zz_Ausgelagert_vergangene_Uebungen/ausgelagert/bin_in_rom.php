<?php
session_start();

$bin = $_POST['bin'];
$decimal = 0;
$length = strlen($bin);
for ($i = 0; $i < $length; $i++) {
    $decimal += (int)$bin[$i] * pow(2, $length - 1 - $i);
}

function decimalRoman($decimal)
{
    $roman = '';
    $rom_num = array(
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1
    );

    foreach ($rom_num as $rom => $int) {
        while ($decimal >= $int) {
            $roman .= $rom;
            $decimal -= $int;
        }
    }

    return $roman;
}

$roman = decimalRoman($decimal);

$_SESSION['solution'] = $roman;
header('Location:../dashboard.php');
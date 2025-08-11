<?php
session_start();
$decimal = $_POST['dec'];
$romanNum = array(
    'MMMMM' => 5000,
    'MMMM' => 4000,
    'M' => 1000,
    'IM' => 999,
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

$result = '';
while ($decimal > 0) {
    #der Reihe nach durch jede Stelle im Array durchgehen (römische Zahl und Dezimalzahl)
    foreach ($romanNum as $roman => $num) {
        #aktueller Wert $num passt noch in Dezimalzahl
        if ($decimal >= $num) {
            # $num von dezimaal abziehen
            $decimal -= $num;
            #Ergebnis in roman speichern, für neu foreach
            $result .= $roman;
        }
    }
}

$_SESSION['solution'] = $result;
header('Location:../dashboard.php');
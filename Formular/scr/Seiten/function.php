<?php

//require_once __DIR__ . '/boot.php';

//session_start();
$action = $_POST["from"];

#match
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $_SESSION['solution'] = match ($action) {
        'dec_in_bin' => dec_in_bin($_POST['number']),
        'bin_in_dec' => bin_in_dec(str_split($_POST['number'])),
        'dec_in_hex' => dec_in_hex($_POST['number']),
        'hex_in_dec' => hex_in_dec($_POST['number']),
        'dec_in_oc' => dec_in_oc($_POST['number']),
        'oc_in_dec' => oc_in_dec($_POST['number']),
        'dec_in_rom' => dec_in_rom($_POST['number']),
        'rom_in_dec' => rom_in_dec($_POST['number']),
        default => $_POST,
    };

    header('Location: /');
}

function dec_in_bin(string $dec)
{
    if ($dec == 0) {
        return "0";
    }elseif (!ctype_digit(strval($dec))) {
        return 'Überdenke nochmal deine Eingabe........';
    }

    $bin = "";
    while ($dec > 0) {
        $rest = $dec % 2;
        $bin = $rest . $bin;
        $dec = (int)($dec / 2);
    }

    return $bin;
}

function dec_in_oc(string $dec)
{
    if ($dec == 0) {
        return "0";
    } else {
        if ($dec == '') {
            return '';
        }elseif (!ctype_digit(strval($dec))) {
            return 'Überdenke nochmal deine Eingabe........';
        }
    }
    $oc = "";
    while ($dec > 0) {
        $rest = $dec % 8;
        $oc = $rest . $oc;
        $dec = (int)($dec / 8);
    }
    return $oc;
}

function dec_in_hex(string $dec): string
{
    if ($dec == 0) {
        return "0";
    } elseif (!ctype_digit(strval($dec))) {
        return 'Überdenke nochmal deine Eingabe........';
    }
    $hex = "";

    while ($dec > 0) {
        $rest = $dec % 16;
        if ($rest < 10) {
            $hex = $rest . $hex;
        } else {
            $hex = phpphpchr($rest + 55) . $hex;
        }
        $dec = (int)($dec / 16);
    }
    return $hex;
}

function dec_in_rom(string $dec)
{
    if ($dec == 0) {
        return "0";
    } elseif (!ctype_digit(strval($dec))) {
        return 'Überdenke nochmal deine Eingabe........';
    }

    $romNum = array(
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
    while ($dec > 0) {
        #der Reihe nach durch jede Stelle im Array durchgehen (römische Zahl und Dezimalzahl)
        foreach ($romNum as $roman => $num) {
            #aktueller Wert $num passt noch in Dezimalzahl
            if ($dec >= $num) {
                # $num von dezimaal abziehen
                $dec -= $num;
                #Ergebnis in roman speichern, für neu foreach
                $result .= $roman;
            }
        }
    }

    return $result;
}

function bin_in_dec(array $bin): int
{
    $dec = 0;
    $length = count($bin);
    for ($i = 0; $i < $length; $i++) {
        $dec += $bin[$i] * pow(2, $length - 1 - $i);
    }

    return $dec;
}

function oc_in_dec(string $oc): string
{
    if ($oc == 0) {
        return "0";
    } elseif (!ctype_digit(strval($oc))) {
        return 'Überdenke nochmal deine Eingabe........';
    }
    $dec = 0;

    $length = strlen($oc);
    for ($i = 0; $i < $length; $i++) {
        $dec += (int)$oc[$i] * pow(8, $length - $i - 1);
    }
    return $dec;
}

function hex_in_dec(int $hex): int
{
    $map = array_merge(
        array_combine(range('0', '9'), range(0, 9)),
        array_combine(range('A', 'F'), range(10, 15))
    );
    $dec = 0;
    #str_split = splittet string in array
    $digits = str_split($hex);
    foreach ($digits as $dig) {
        if (!isset($map[$dig])) {
            return 'ungültige Eingabe!';
        }
        $dec = $dec * 16 + $map[$dig];
    }
    return $dec;
}

function rom_in_dec(string $rom)
{
    $rom = strtoupper(trim($rom));
    $romMap = [
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
    ];
    $i = 0;
    $length = strlen($rom);
    $dec = 0;

    while ($i < $length) {
        // ist es eine zweistellige Zahl???
        if ($i + 1 < $length && isset($romMap[substr($rom, $i, 2)])) {
            $decc += $romMap[substr($rom, $i, 2)];
            $i += 2;
        } elseif (isset($romMap[$rom[$i]])) {
            $dec += $romMap[$rom[$i]];
            $i += 1;
        } else {
            return 'ungültige Eingabe!';
        }
    }
    return $dec;
}
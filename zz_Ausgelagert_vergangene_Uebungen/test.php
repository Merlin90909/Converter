<?php

#for($i=0; $i<=100; $i++){
#    if($i%2!==0){
#        echo "Diese Zahl ist ungerade $i <br>";
#    }else{
#     echo "Diese Zahl ist gerade $i <br>";
#    }
#}

#$firstName = 'Alexander';
#$reversedFirstName = '';
#
#for ($i = 1; $i <= strlen($firstName); $i++) {
#    $reversedFirstName .= substr($firstName, $i * -1, 1);
#}
#
#echo ucfirst(strtolower($reversedFirstName));

#$wort = 'alexander';
#for($i=0; $i<=strlen($wort); $i++){
#    if(strlen($wort) === 'a'||'e'||'i'||'o'||'u'){;
#        echo $i;
#    }
#}

#$buchstabe ='';
#$wort = 'Alexander Albrecht';
#$zaehler = 0;
#for ($i = 0; $i < strlen($wort); $i++) {
#    $buchstabe = substr($wort, $i, 1);
#    switch($buchstabe){
#        case 'a':
#        case 'e':
#        case 'i':
#        case 'o':
#        case 'u':
#        case 'A':
#        case 'E':
#        case 'I':
#        case 'O':
#        case 'U':
#        $zaehler++;
#    }
#}
#echo $zaehler;

function reverseString(string $string): string
{
    $reversedName = '';
    for ($i = 1; $i <= strlen($string); $i++) {
        $reversedName .= substr($string, $i * -1, 1);
    }

    $firstLetter = substr($reversedName, strlen($reversedName) - 1, 1);
    if ($firstLetter !== strtolower($firstLetter)) {
        $reversedName = ucfirst(strtolower($reversedName));
    }

    return $reversedName;
}

function reverseSentence(string $sentence): string
{
    $reversedSentence = '';
    $words = explode(' ', $sentence);

    foreach ($words as $word) {
        $reversedSentence .= reverseString($word) . ' test.php';
    }

    return $reversedSentence;
}

#$text = 'Das ist ein tolles Hello-World Programm!';
#echo reverseSentence($text);

#for($i=1; $i <=100; $i++){
#    if($i%3==0){
#        echo "FIZZ";
#    }else if($i%5 ==0){
#        echo "BUZZ";
#    }else if($i%3==0 && $i%5==0){
#        echo "FIZZ BUZZ";
#    }else{
#        echo $i;
#    }
#}


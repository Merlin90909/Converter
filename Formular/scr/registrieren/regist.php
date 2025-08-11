<?php

echo '<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Regestrierung</title>
</head>
<body>
<h1>Formular</h1>
<p>Dies ist ein Formular zur Übung:</p>
<h2>Angaben</h2>
<form action="form_regist.php" method="POST">

    <label for="fName">Vorname:</label><br>
    <input type="text" id="fName" name="fName"><br><br>

    <label for="lName">Nachname:</label><br>
    <input type="text" id="lName" name="lName"><br><br>

    <label for="email">E-Mail:</label><br>
    <input type="email" id="email" name="email"><br><br>

    <label for="psswrd">Password:</label><br>
    <input type="password" id="psswrd" name="psswrd"><br><br>

    <label for="psswrdConfirm">Password wiederholen:</label><br>
    <input type="password" id="psswrdConfirm" name="psswrdConfirm"><br><br>
    <button>Registrieren</button>
    <br>
    <br>
    <a href="/login">Einloggen
    </a>
</form>';


echo '</body></html>';
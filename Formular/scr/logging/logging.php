<?php

$email = isset($_POST['email']) ? $_POST['email'] : '';
echo '<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<h1>Login</h1>
<p>Dies ist ein Formular zur Übung:</p>
<h2>Angaben</h2>
<form action="form_logging" method="POST">
    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email"><br>
    <label for="passwort">Passwort:</label><br>
    <input type="text" id="passwort" name="passwort"><br>
    <input type="submit" value="Abschicken">
    <br>
        <a href="../registrieren/regist.php">Registrieren</a>

</form>';

if (isset($_SESSION['is_logdin']) && $_SESSION['is_logdin'] === true) {
    header('Location: /');
    exit;
}


require('userExist.php');
userExists($email);

echo '</body></html>';
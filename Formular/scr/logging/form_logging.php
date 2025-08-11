<?php

$email = isset($_POST['email']) ? $_POST['email'] : '';
$passwort = isset($_POST['passwort']) ? $_POST['passwort'] : '';
if (empty($email) || empty($passwort)) {
    header('Location: loggin?invalidInput');
    exit;
}

$email = isset($_POST['email']) ? $_POST['email'] : '';

$path = '../user.json';

$json = file_get_contents($path);
$data = json_decode($json, true);

if (is_array($data)) {
    $found = false;
    foreach ($data as $entry) {
        if (isset($entry['email']) && $entry['email'] === $email) {
            $found = true;
            break;
        }
    }
    if ($found) {
        $_SESSION['is_logdin'] = true;
        header('Location: /');
        exit;
    } else if(isset($_SESSION['is_logdin']) && $_SESSION['is_logdin'] == true) {
            header('Location: /');
        } else {
        header('Location: /login?login=false');
            exit;
        }
}


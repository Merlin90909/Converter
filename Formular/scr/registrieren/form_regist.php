<?php

$path = '../user.json';
$data = [];


if (empty($_POST['fName']) || empty($_POST['lName']) || empty($_POST['email']) || empty($_POST['psswrd'])) {
    header('Location: regist.php?invalidInput');
    exit;
}elseif ($_POST['psswrd'] !== $_POST['psswrdConfirm']) {
    header('Location: regist.php?invalidPsswrd');
    exit;
}else {
    header('Location: register ');
    $username = $_POST['fName'];
    $newUser = [
        'first_name' => $username,
        'last_name' => $_POST['lName'],
        'email' => $_POST['email'],
        'password' => $_POST['psswrd']
    ];

    $data = json_decode(file_get_contents($path), true);
    var_dump($data);
    $data[$username] = $newUser;
    $jsonData = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents($path, $jsonData);

    header('Location:register');
}
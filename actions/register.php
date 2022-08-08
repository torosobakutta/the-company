<?php

include '../classes/User.php';   # ../入れないと読み込めない 理由：フォルダーが違うため

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$password = password_hash($_POST['password'],PASSWORD_DEFAULT);

$user = new User;
$user->createUser($first_name, $last_name, $username, $password);
?>
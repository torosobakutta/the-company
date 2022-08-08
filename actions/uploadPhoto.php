<?php

include '../classes/User.php';

session_start(); #これ入れると下記が動く
$user_id = $_SESSION['user_id'];
$filename = $_FILES['photo']['name']; #actual filename 'dog.jpg'
$tmp_name = $_FILES['photo']['tmp_name']; #temporary destination of uploaded file
                                                // temporary folder of xamp

#$_file...associative array 

$user = new User;
$user->uploadPhoto($user_id, $filename,
$tmp_name); $_

?>
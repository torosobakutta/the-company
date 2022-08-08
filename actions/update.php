<?php

include '../classes/User.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$user_id = $_POST['user_id']; #edid-user.phpのrow 69とリンク

$user = new User;
$user->updateUser($first_name , $last_name , $username , $user_id);

#これらがedit-user.phpのformにパスされる

?>
<?php

include "../classes/User.php";

$f_name = $_POST['first_name'];
$l_name = $_POST['last_name'];
$username = $_POST['username'];
$uid = $_POST['user_id'];

$u = new User;
$u->editUser($uid, $f_name, $l_name, $username);

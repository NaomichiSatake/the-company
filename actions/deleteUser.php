<?php

include "../classes/User.php";

$uid = $_POST['user_id'];

$u = new User;

$u->deleteUser($uid);
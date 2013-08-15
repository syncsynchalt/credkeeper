<?php

require_once('session.php');
require_once('db.php');

$login_site = $_REQUEST['site'];
$login_user = $_REQUEST['user'];
$login_pass = $_REQUEST['pass'];

write_value($user . '/' . $login_site . '/user', $login_user);
write_value($user . '/' . $login_site . '/pass', $login_pass);

header('Location: admin.php');

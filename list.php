<?php
require_once('session.php');
require_once('db.php');
?>
<html>
<head>
<title>List of logins</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="login_methods.js"></script>
<script src="aes.js"></script>
<script src="list.js"></script>
</head>

<body>
<h3>Logged in as <?php echo $user ?></h3>
<div style="visibility: hidden" id="username"><?= $user ?></div>

<p>Log in to staging:
<button class=loginButton key=staging
        templ="split_login('https://staging.pax8.com/portal/jsp/login.jsp', 'USER', 'PASS', 'KEY')">Login</button>

<p>Log in to integration:
<button class=loginButton key=integration
        templ="pax8_login('https://integration.pax8.com', 'USER', 'PASS')">Login</button>

<div id="activation">
<form method=POST action=send_activation_email.php>
Activate logins for this browser<br>
<input type=hidden name=email value="<?= $user ?>">
<input type=submit value=Activate>
</form>
</div>

</body>

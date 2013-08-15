<?php require_once('session.php') ?>
<html>
<head>
<title>Store logins</title>
</head>

<body>
<h3>Logged in as <?php echo $user ?></h3>

<form method=POST action=store_data.php>
Store staging credentials:<br>
User: <input name=user type=text><br>
Pass: <input name=pass type=password><br>
<input name=site type=hidden value=staging>
<input type=submit value=Store>
</form>

<form method=POST action=store_data.php>
Store integration credentials:<br>
User: <input name=user type=text><br>
Pass: <input name=pass type=password><br>
<input name=site type=hidden value=integration>
<input type=submit value=Store>
</form>

</body>

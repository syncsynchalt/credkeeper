<?php

require_once('session.php');

$this_url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$activation_url = str_replace('send_activation_email.php', 'activation.php', $this_url);

$content = "
<html>
<body>
<a href='$activation_url'>Click this link to activate logins for your browser</a>
</body>
</html>
";

mail($user, 'Activation email', $content);

?>
<html>
<head>
<title>Activation email sent</title>
</head>
<body>
<h1>Activation email sent</h1>
<p>Go back to <a href="admin.php">main page</a>.
</body>
</html>

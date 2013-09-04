<?php
require_once('session.php');
require_once('db.php');
?>
<html>
<head>
<title>Split login window</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="aes.js"></script>
<script src="split.js"></script>
</head>

<body>

<div class="split-top" style="height: 10%">
<div style="display: none" id="username"><?= $user ?></div>
<div style="display: none" id="key"><?= $_REQUEST['key'] ?></div>
<div>
<span>copy/paste username: <input id='split-username' onClick='this.select()' readonly value='Computing...'></span>
<span>(this could be done via a flash button that automatically copies to clipboard)
<br>
<span>copy/paste password: <input id='split-password' onClick='this.select()' readonly value='Computing...'></span>
<span>(this could be done via a flash button that automatically copies to clipboard)
</div>
</div>

<div class="split-bottom">
<iframe src="<?= $_REQUEST['site'] ?>" height="85%" width="100%">
</div>

</body>
</html>

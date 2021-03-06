<?php

require_once('session.php');
require_once('db.php');

$key = read_value($user . '/key');
if (empty($key)) {
    $key = '';
    while (strlen($key) < 32) {
        $key .= dechex(rand(0, 15));
    }
    $key = 'pass-' . $key;
    write_value($user . '/key', $key);
}
?>

<html>
<head>
<title>Browser activated</title>
<script>
    localStorage['<?= $user ?>_encryption_key'] = '<?= $key ?>';
</script>
</head>

<body>
<p>Browser is activated.
<p><a href="admin.php">Back to site</a>
</body>
</html>

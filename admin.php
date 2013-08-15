<?php require_once('session.php') ?>
<html>
<head>
<title>Main page</title>
</head>

<?php
    if ($_SESSION['user'] == '') {
        $_SESSION['user'] = $_REQUEST['user'];
    }
    $user = $_SESSION['user'];
?>

<body>
<h3>Logged in as <?= $user ?></h3>
<p><a href="store.php">Store passwords</a>
<p><a href="list.php">Peform a login</a>
</body>

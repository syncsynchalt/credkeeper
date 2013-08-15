<?php

require_once('session.php');
require_once('db.php');
require_once('aes.php');

$key = read_value($user . '/key');

$data;
$data['staging/user']     = encrypt_data($user, 'staging/user', $key);
$data['staging/pass']     = encrypt_data($user, 'staging/pass', $key);
$data['integration/user'] = encrypt_data($user, 'integration/user', $key);
$data['integration/pass'] = encrypt_data($user, 'integration/pass', $key);

header('Content-Type: application/json');

echo json_encode($data);

function encrypt_data($user, $site, $key) {
    $val = read_value($user . '/' . $site);
    if (!$val) {
        return null;
    }
    return encrypt_string($val, $key);
}

function encrypt_string($data, $key) {
    return AesCtr::encrypt($data, $key, 256);
}

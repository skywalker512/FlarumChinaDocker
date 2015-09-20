<?php

preg_match('|([a-z0-9]+)://([^:]*)(:(.*))?@([A-Za-z0-9\.-]*)(:([0-9]*))?(/([0-9a-zA-Z_/\.-]*))|',
    $_ENV['DATABASE_URL'], $matches);

list(,,$username,,$password,$host,,,,$database) = $matches;

$data = http_build_query([
    'forumTitle' => 'Flarum Forum',

    'mysqlHost' => $host,
    'mysqlDatabase' => $database,
    'mysqlUsername' => $username,
    'mysqlPassword' => $password,
    'tablePrefix' => '',

    'adminUsername' => 'admin',
    'adminEmail' => 'admin@example.com',
    'adminPassword' => 'password',
    'adminPasswordConfirmation' => 'password'
]);

$ch = curl_init();

curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_URL, 'http://localhost/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/x-www-form-urlencoded'
]);

$result = curl_exec($ch);
curl_close($ch);

@file_put_contents('/var/www/html/install.log', $result);

if (strpos($result, 'DONE.') !== false) {
    unlink('/var/www/html/install.php');
    rename('/var/www/html/_config.php', '/var/www/html/config.php');
    header('Location: /');
} else {
    echo 'Failed to install - check install log file for details.';
}
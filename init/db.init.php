<?php
$host = '127.0.0.1'; //you can use localhost
$dbname = 'g19bcsy3b'; // database name
$user = 'root';
$password = '';
$port = 3306;

//mysql connect
$db = new mysqli($host, $user, $password, $dbname, $port);

if ($db->connect_error) {
    echo 'Connection failed.' . $db->connect_error;
    die();
}

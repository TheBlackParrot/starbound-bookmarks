<?php
// -- SQL --
// hostname to connect to
$sql['host'] = "localhost";
$sql['port'] = 3306;
// SQL credentials
$sql['user'] = "starbound_manager";
$sql['pass'] = "rRrDPJPw7pCKcmMqEK2NQWQg";
// database
$sql['db'] = "starbound";
// defines the SQL connection
$mysqli = new mysqli($sql['host'], $sql['user'], $sql['pass'], $sql['db'], $sql['port']);

$setting['root'] = "http://192.168.1.150/starbound";
?>
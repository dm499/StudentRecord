<?php

define('servername', 'localhost');
define("username", "root");
define("user_password", "");
define("db_name", "studentlist");

$handleConnection = mysqli_connect(servername, username, user_password, db_name)
or die("connection to the server is down" . mysqli_connect_error());

?>
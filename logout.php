<?php
require 'DB_conn.php';

session_destroy();
// Redirect to the login page:
header('Location: login.html');
?>

<?php

session_start();
//this file is used i=throughout our server


//connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'mentalhealth';
//connection to the database
$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (!$conn) {
	echo "There was an error connecting to the database";
	die("connection broken to the database");
}

<?php 

	session_start();

	$host = "localhost";
	$server = "root";
	$pass = "";
	$dbname = "garage";

	$dsn = 'mysql:host='.$host.';dbname='.$dbname;
	$con = new PDO($dsn, $server, $pass);
?>






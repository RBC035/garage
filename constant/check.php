<?php 

require_once 'connect.php';

if(!$_SESSION['user']) {
	header('location:./login.php');	
} 



?>
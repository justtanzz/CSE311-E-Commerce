<?php
	session_start();
	$db=mysqli_connect('localhost', 'root', '', 'ecommerce');
	if(!$db)
	{
		die('check your connection'.mysqli_error());
	}
?>